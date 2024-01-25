@extends('layouts.app')

@section('titulo')
    Editar perfil : {{auth()->user()->username}}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form class="mt-10 md:mt-0" action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-5 ">
                    <label id="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input
                    id="username"
                    name="username" 
                    type="text"
                    placeholder="Tu Username"
                    class="border p-2 w-full rounded-lg outline-none @error('username') border-red-500
                    @enderror"
                    value="{{auth()->user()->username}}"/>
                    @error('username')
                        <p class="text-sm text-white bg-red-600 w-full mt-2 p-1 rounded">* {{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5 ">
                    <label id="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                        Imagen perfil
                    </label>
                    <input
                    id="imagen"
                    name="imagen" 
                    type="file"
                    class="border p-2 w-full rounded-lg outline-none"
                    accept=".jpg, .jpeg, .png"
                    />
                    
                </div>

                <input 
                type="submit" 
                value="Guardar cambios"
                class="bg-blue-600 hover:bg-blue-700 transition text-white w-full p-2 rounded-lg"
                >
            </form>

        </div>

    </div>
@endsection