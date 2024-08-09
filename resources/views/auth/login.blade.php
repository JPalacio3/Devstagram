@extends('layouts.app')

@section('titulo')
    Inicia Sesión en Devstagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-8 md:items-center ">
        <div class="md:w-6/12  p-5">
            <img class="  rounded-xl shadow-lg" src="{{ asset('img/login.jpg') }}" alt="Imágen Login de usuario">
        </div>

        <div class="md:w-4/12 bg-white p-6   rounded-xl shadow-lg ">
            <form action="{{ route('login') }}" method="POST">

                @csrf <!--Medida de seguridad que implementa Laravel para evitar ataques de ciberseguridad -->
                @if (session('mensaje'))
                    <p
                        class = "
                    bg-red-500 text-white my-2   rounded-xl text-sm p-2 text-center font-bold">
                        {{ session('mensaje') }}
                    </p>
                @endif

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email:
                    </label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        placeholder="Correo electrónico"
                        class="border p-3 w-full   rounded-xl @error('email') border-red-500 bg-red-50 @enderror">
                    @error('email')
                        <p class = "bg-red-500 text-white my-2   rounded-xl text-sm p-2 text-center font-bold">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Contraseña:
                    </label>
                    <input type="password" id="password" name="password" placeholder="Escribe una contraseña"
                        class="border p-3 w-full   rounded-xl @error('password') border-red-500 bg-red-50 @enderror">
                    @error('password')
                        <p class = "bg-red-500 text-white my-2   rounded-xl text-sm p-2 text-center font-bold">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" name="remember">
                    <label for="" class="text-gray-500 text-sm"> Mantener mi sesión abierta

                    </label>
                </div>

                <input type="submit" value="Iniciar Sesión"
                    class="
                bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white   rounded-xl">
            </form>
        </div>
    </div>
@endsection
