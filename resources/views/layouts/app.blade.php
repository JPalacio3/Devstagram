<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Devstagram - @yield('titulo')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

<header class="p-5 boder-b bg-white shadow">

    <div class="container mx-auto flex justify-between items-center">
    <h1 class="text-3xl font-black">
        DevStagram
    </h1>

    {{-- En caso de estar autenticado --}}
        @auth
        <nav class="flex gap-4 items-center">
            <a class="font-bold  text-gray-600 text-xl"
                href="{{route('login')}}">
                Hola:
                <span class="font-normal">
                    {{auth()->user()->username}}
                </span>
            </a>
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="font-bold uppercase text-gray-600 text-sm">
                        Cerrar Sesión
                </button>
            </form>
        </nav>
        @endauth

        {{-- En caso de NO estar aún autenticado --}}
        @guest
        <nav class="flex gap-2 items-center">
            <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('login')}}">Login</a>
            <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('register')}}">Crear Cuenta</a>
        </nav>
        @endguest
    </div>
</header>

<main class="container mx-auto mt-10" >
    <h2 class="font-black text-center text-3xl mb-20">
        @yield('titulo')
    </h2>
    @yield('contenido')
</main>

<footer class="text-center p-5 text-gray-500 font-bold uppercase mt-15">
    Devstagram - Todos los derechos reservados - {{now()->year}}
</footer>
</body>
</html>
