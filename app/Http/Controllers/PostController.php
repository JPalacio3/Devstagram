<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function __construct()
    {
        /* Esta función se usa para asegurar que el usuario se encuentre autenticado
        y le sea permitido interarctuar con las funciones siguientes
        */
        $this->middleware('auth')->except(['show', 'index']);
    }

    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->latest()->paginate(20);

        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required | min:3 | max:255',
            'descripcion' => 'required | min:3',
            'imagen' => 'required'
        ]);

        // Realizar el almacenamiento de la publicación sin tener las relaciones en los modelos:
        // Post::create([
        //     'titulo' => $request->titulo,
        //     'descripcion' => $request->descripcion,
        //     'imagen' => $request->imagen,
        //     'user_id' => auth()->user()->id
        // ]);

        // Una vez creada las relaciones en la BD en los modelos, se puede realizar el guardado en la
        // Base de datos de la siguiente manera:
        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('posts.index', auth()->user()->username);
    }

    public function show(User $user, Post $post)
    {
        return view('posts.show', [
            'user' => $user,
            'post' => $post
        ]);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        // Eliminar la imagen

        $imagen_path = public_path('uploads/' . $post->imagen);
        if (File::exists($imagen_path)) {

            unlink($imagen_path);
        }

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
