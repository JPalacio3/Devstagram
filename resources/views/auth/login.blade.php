@extends('layouts.app')

@section('titulo')
Inicia Sesión en Devstagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-8 md:items-center">
        <div class="md:w-6/12  p-5">
            <img class="rounded-md" src="{{ asset('img/login.jpg')}}" alt="Imagen de login de usuarios">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-md">
            <form method="POST" action="{{route('login')}}">
                @csrf

                @if (session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center font-black">
                        {{ session('mensaje') }}
                    </p>
                @endif

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email:
                    </label>
                    <input
                    type="email"
                    id="email"
                    name="email"
                    autocomplete="email"
                    placeholder="Escribe tu email"
                    class="border p-3 w-full rounded-lg @error('email') border-red-500 bg-red-50 @enderror "
                    value="{{old('email')}}"
                    />
                    @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center font-black"
                    >{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Contraseña:
                    </label>
                    <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Escribe una contraseña"
                    autocomplete="password"
                    class="border p-3 w-full rounded-lg @error('password') border-red-500 bg-red-50 @enderror"
                    />
                    @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center font-black"
                    >{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" name="remember">
                        <label for="" class=" font-medium text-gray-500 text-sm">
                            Mantener mi sesión abierta
                        </label>
                </div>

                <input
                type="submit"
                value="Iniciar Sesión"
                class="bg-sky-600 hover:bg-sky-800 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                >
            </form>
        </div>
    </div>
@endsection
