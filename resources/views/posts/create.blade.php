@extends('layouts.app')

@section('titulo')
    Crea una nueva Publicación
@endsection

@push('styles')
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">

            <form action="{{ route('imagenes.store') }}" id="dropzone" method="POST" enctype="multipart/form-data"
                class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center hover:bg-slate-100">
                @csrf
            </form>
        </div>

        <div class="md:w-1/2 p-10  bg-white   rounded-xl shadow-lg mt-10 md:mt-0">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf <!--Medida de seguridad que implementa Laravel para evitar ataques de ciberseguridad -->

                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Titulo:
                    </label>
                    <input type="text" id="titulo" name="titulo" placeholder="Título de la publicación"
                        value="{{ old('titulo') }}"
                        class="border p-3 w-full   rounded-xl @error('titulo') border-red-500 bg-red-50 @enderror ">

                    @error('titulo')
                        <p class = "bg-red-500 text-white my-2   rounded-xl text-sm p-2 text-center font-bold">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripción:
                    </label>

                    <textarea id="descripcion" name="descripcion" placeholder="Descripción de la publicación"
                        class="
                        border p-3 w-full   rounded-xl 
                        @error('descripcion') border-red-500 bg-red-50 
                        @enderror ">
                        {{ old('descripcion') }}
                    </textarea>

                    @error('descripcion')
                        <p class = "bg-red-500 text-white my-2   rounded-xl text-sm p-2 text-center font-bold">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="hidden" name="imagen" value="{{ old('imagen') }}">
                    @error('imagen')
                        <p class = "bg-red-500 text-white my-2   rounded-xl text-sm p-2 text-center font-bold">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <input type="submit" value="Crear Publicación"
                    class="
                bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer 
                uppercase font-bold w-full p-3 text-white   rounded-xl" />
            </form>
        </div>
    </div>
@endsection
