@extends('layouts.app')

@section('titulo')
  Página Principal
@endsection

@section('contenido')
  @if ($posts->count())
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 ">
      @foreach ($posts as $post)
        <div class="">
          <a
            href="{{ route('posts.show', [
                'post' => $post,
                'user' => $post->user,
            ]) }} ">

            <img class="rounded-xl hover:bg-opacity-60"
              src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post"
              {{ $post->titulo }}>

            <div class="flex md:justify-between md:align-center justify-around">
              <p class="font-bold text-gray-500 text-center  hover:text-gray-700">
                {{ $post->user->username }}
              </p>

              <p class="text-sm text-gray-600 font-bold">
                {{ $post->likes->count() }}
                <span class="font-normal"> @choice('Like|Likes', $post->likes->count()) </span>
              </p>
            </div>

            <div class="flex md:justify-between justify-around">
              <p class="text-sm text-gray-500 mb-2">
                {{ $post->created_at->diffForHumans() }}
              </p>

              <p class="text-sm text-gray-600 hover:text-gray-800">
                {{ $post->comentarios->count() }}
                <span class="font-normal"> @choice('Comentario|Comentarios', $post->comentarios->count()) </span>
              </p>
            </div>

            <p class="text-sm text-gray-600 hover:text-gray-800 text-center md:text-start">
              {{ $post->titulo }}
            </p>
          </a>
        </div>
      @endforeach
    </div>

    <div class="my-10"> {{ $posts->links('pagination::tailwind') }}
    </div>
  @else
    <p class="text-center text-gray-500">No hay publicaciones, sigue a alguien ahora para
      ver
      sus publicaciones</p>
  @endif
@endsection
