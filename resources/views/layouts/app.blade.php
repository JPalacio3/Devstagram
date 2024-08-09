<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/icon.svg" type="image/svg+xml">
    <title>Devstagram - @yield('titulo')</title>
    @stack('styles')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles


  </head>

  <body class="bg-gray-100">
    <header class="p-5 border-b bg-white shadow">
      <div class="container mx-auto flex justify-between items-center">
        <a href="{{ route('home') }}">
          <h1 class="text-3xl font-black hover:text-blue-950">Devstagram</h1>
        </a>

        @auth
          <nav class="md:flex gap-4 md:items-center block text-center">

            <a href="{{ route('posts.create') }}"
              class="flex items-center gap-4 border p-2 text-gray-600 rounded text-sm
              uppercase font-bold cursor-pointer hover:text-blue-950 my-5">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
              </svg>
              Crear</a>

            <a class="font-bold text-gray-500 hover:text-blue-950 text-sm"
              href="{{ route('posts.index', auth()->user()->username) }}">
              Hola: <span class="font-normal ">{{ auth()->user()->username }}</span>
            </a>

            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button
                class="font-bold uppercase text-gray-500 text-sm hover:text-blue-950 mt-5 md:mt-0">Cerrar
                Sesión</button>
            </form>
          </nav>

        @endauth

        @guest
          <nav class="flex gap-4 items-center">
            <a class="font-bold uppercase text-gray-600 text-sm hover:text-blue-950"
              href="{{ route('login') }}">Login
            </a>
            <a class="font-bold uppercase text-gray-600 text-sm hover:text-blue-950"
              href="{{ route('register') }}">Crear Cuenta</a>
          </nav>
        @endguest
      </div>
    </header>

    <main class="container mx-auto mt-10">
      <h2 class="font-black text-center text-3xl mb-10 uppercase ">@yield('titulo')</h2>
      @yield('contenido')
    </main>

    <footer class="text-center p-5 text-gray-500 font-bold uppercase mt-10">
      Devstagram - Todos Los Derechos Reservados - {{ now()->year }}
    </footer>

    @livewireScripts()
  </body>

</html>
