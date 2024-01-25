@extends('layouts.app')

@section('titulo')
    Registrate en DevStagram
@endsection

@section('contenido')
    <div class="md:flex items-center md:justify-around p-3">
        <div class="md:w-4/12">
            <img 
                src="{{asset('img/instagram.png')}}" 
                alt="logo de devstagram"
                class="hidden md:block p-3">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow">
            <form action="{{route('registro.index')}}" method="POST">
                @csrf
                <div class="mb-5 ">
                    <label id="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Name
                    </label>
                    <input
                    id="name"
                    name="name" 
                    type="text"
                    placeholder="Tu Nombre"
                    class="border p-2 w-full rounded-lg outline-none @error('name') border-red-500
                    @enderror"
                    value="{{old('name')}}">
                    @error('name')
                        <p class="text-sm text-white bg-red-600 w-full mt-2 p-1 rounded">* {{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5 ">
                    <label id="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input
                    id="username"
                    name="username" 
                    type="text"
                    placeholder="Tu Nombre de Usuario"
                    autocomplete="off"
                    class="border p-2 w-full rounded-lg outline-none @error('username') border-red-500
                    @enderror"
                    value="{{old('username')}}">
                    @error('username')
                    <p class="text-sm text-white bg-red-600 w-full mt-2 p-1 rounded">* {{$message}}</p>
                @enderror
                </div>
                <div class="mb-5 ">
                    <label id="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input
                    id="email"
                    name="email" 
                    type="email"
                    placeholder="Tu Correo Electronico"
                    class="border p-2 w-full rounded-lg outline-none @error('email') border-red-500
                    @enderror"
                    value="{{old('email')}}">
                    @error('email')
                    <p class="text-sm text-white bg-red-600 w-full mt-2 p-1 rounded">* {{$message}}</p>
                @enderror
                </div>
                <div class="mb-5 ">
                    <label id="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password
                    </label>
                    <input
                    id="password"
                    name="password" 
                    type="password"
                    placeholder="Tu Contraseña"
                    autocomplete="off"
                    class="border p-2 w-full rounded-lg outline-none @error('password') border-red-500
                    @enderror"
                    value="{{old('password')}}">
                    @error('password')
                    <p class="text-sm text-white bg-red-600 w-full mt-2 p-1 rounded">* {{$message}}</p>
                @enderror
                </div>
                <div class="mb-5 ">
                    <label id="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password Confirmation
                    </label>
                    <input
                    id="password_confirmation"
                    name="password_confirmation" 
                    type="password"
                    placeholder="Repite tu Contraseña"
                    class="border p-2 w-full rounded-lg outline-none @error('password_confirmation') border-red-500
                    @enderror"
                    value="{{old('password_confirmation')}}">
                    @error('password_confirmation')
                    <p class="text-sm text-white bg-red-600 w-full mt-2 p-1 rounded">* {{$message}}</p>
                @enderror
                </div>
                <input 
                type="submit" 
                value="Register"
                class="bg-blue-600 hover:bg-blue-700 transition text-white w-full p-2 rounded-lg"
                >
            </form>
        </div>
    </div>
@endsection