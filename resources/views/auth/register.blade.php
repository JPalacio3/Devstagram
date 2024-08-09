@extends('layouts.app')

@section('titulo')
    Regístrate en Devstagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-8 md:items-center ">
        <div class="md:w-6/12  p-5">
            <img class="  rounded-xl shadow-lg" src="{{ asset('img/registrar.jpg') }}" alt="Imágen registro de usuario">
        </div>

        <div class="md:w-4/12 bg-white p-6   rounded-xl shadow-lg ">
            <form action="{{ route('register') }}" method="POST">
                @csrf <!--Medida de seguridad que implementa Laravel para evitar ataques de ciberseguridad -->

                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre:
                    </label>
                    <input type="text" id="name" name="name" placeholder="Tu Nombre" value="{{ old('name') }}"
                        class="border p-3 w-full   rounded-xl @error('name') border-red-500 bg-red-50 @enderror ">
                    @error('name')
                        <p class = "bg-red-500 text-white my-2   rounded-xl text-sm p-2 text-center font-bold">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username:
                    </label>
                    <input type="text" id="username" value="{{ old('username') }}" name="username"
                        placeholder="Escribe un nombre de usuario "
                        class="border p-3 w-full   rounded-xl @error('username') border-red-500 bg-red-50 @enderror ">
                    @error('username')
                        <p class = "bg-red-500 text-white my-2   rounded-xl text-sm p-2 text-center font-bold">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

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
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                        Repite tu Contraseña:
                    </label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Repite tu contraseña" class="border p-3 w-full   rounded-xl">
                </div>
                <input type="submit" value="Crear Cuenta"
                    class="
                bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white   rounded-xl" />
            </form>
        </div>
    </div>
@endsection
