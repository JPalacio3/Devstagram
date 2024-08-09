@extends('layouts.app')

@section('titulo')
    Editar Perfil : {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">

        <div class="bg-white shadow p-6 md:w-1/2">

            <form action="{{ route('perfil.store') }}" method="POST" class="mt-10 md:mt-0" enctype="multipart/form-data">
                @csrf <!--Medida de seguridad que implementa Laravel para evitar ataques de ciberseguridad -->

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre de Usuario:
                    </label>
                    <input type="text" id="username" name="username" placeholder="Tu Nombre de Usuario"
                        value="{{ auth()->user()->username }}"
                        class="border p-3 w-full   rounded-xl @error('username') border-red-500 bg-red-50 @enderror ">
                    @error('username')
                        <p class = "bg-red-500 text-white my-2   rounded-xl text-sm p-2 text-center font-bold">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                        Foto de Perfil:
                    </label>
                    <input type="file" id="imagen" name="imagen" value="" accept=".jpg, .jpeg, .png, .webp"
                        class="border p-3 w-full rounded-xl ">
                </div>

                <div class="mb-5 text-center flex justify-center">
                    <img id="preview-imagen"
                        src="{{ auth()->user()->imagen ? asset('perfiles') . '/' . auth()->user()->imagen : asset('img/usuario.svg') }}"
                        class="mt-4 w-32 h-32 rounded-full" alt="Preview-image">
                </div>

                <input type="submit" value="Guardar Cambios"
                    class="
                bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white   rounded-xl" />
            </form>
        </div>
    </div>

    <script>
        document.getElementById('imagen').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('preview-imagen').setAttribute('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
