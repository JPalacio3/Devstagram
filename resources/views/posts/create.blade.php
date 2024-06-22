@extends('layouts.app')

@section('titulo')
    Crea una Nueva Publicación
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center">

        <div class="md:w-1/2 px-10">

            <form
                id="dropzone"
                action="{{route('imagenes.store')}}"
                method="POST"
                enctype="multipart/form-data"
                class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>
            <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-md mt-10 md:mt-0">
            <form action="{{route('register.store')}}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                            Título:
                        </label>
                        <input
                        type="text"
                        id="titulo"
                        name="titulo"
                        autocomplete="titulo"
                        placeholder="titulo de la publicación"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 bg-red-50 @enderror "
                        value="{{old('titulo')}}"
                        />
                        @error('titulo')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center font-black"
                        >{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="descripcion" class="mb-2 block text-gray-500 font-bold">
                            Descripción:
                        </label>
                        <textarea
                            id="descripcion"
                            name="descripcion"
                            autocomplete="descripcion"
                            placeholder="Descripción de la publicación"
                            class="border p-3 w-full rounded-lg @error('name') border-red-500 bg-red-50 @enderror "
                        >
                        {{old('descripcion')}}
                        </textarea>
                            @error('descripcion')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center font-black"
                            >{{ $message }}</p>
                            @enderror
                    </div>

                <input
                type="submit"
                value="Publicar"
                class="bg-sky-600 hover:bg-sky-800 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                >
            </form>
        </div>
    </div>







@endsection
