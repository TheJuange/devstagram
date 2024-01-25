@extends('layouts.app')

@section('titulo')
    crea una nueva publicacion
@endsection
   
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form id="dropzone" 
            method="POST"
            enctype="multipart/form-data"
            action="{{route('imagenes.store')}}"
            class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
            @csrf
            </form>
        </div>
        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{route('post.store')}}" method="POST">
                @csrf
                <div class="mb-5 ">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Titulo
                    </label>
                    <input
                    id="titulo"
                    name="titulo" 
                    type="text"
                    placeholder="Titulo"
                    class="border p-2 w-full rounded-lg outline-none @error('titulo') border-red-500
                    @enderror"
                    value="{{old('titulo')}}">
                    @error('titulo')
                        <p class="text-sm text-white bg-red-600 w-full mt-2 p-1 rounded">* {{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5 ">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripcion
                    </label>
                    <textarea
                    id="descripcion"
                    name="descripcion"
                    type="text" 
                    placeholder="Descripcion"
                    class="border p-2 w-full rounded-lg outline-none @error('descripcion') border-red-500
                    @enderror">
                    {{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <p class="text-sm text-white bg-red-600 w-full mt-2 p-1 rounded">* {{$message}}</p>
                    @enderror
                    
                </div>
                
                <div class="mb-5">
                    <input 
                    name="imagen"
                    type="hidden"
                    value="{{old('imagen')}}"
                    >
                    @error('imagen')
                        <p class="text-sm text-white bg-red-600 w-full mt-2 p-1 rounded">* {{$message}}</p>
                    @enderror
                </div>

                <input 
                type="submit" 
                value="Postear"
                class="bg-blue-600 hover:bg-blue-700 transition text-white w-full p-2 rounded-lg"
                >
            </form>
        </div>
    </div>
@endsection