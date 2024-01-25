@extends('layouts.app')

@section('titulo')
    Inicia Sesion en DevStagram
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
            <form action="{{route('login')}}" method="POST" novalidate>
                @csrf
                @if (session('mensaje'))
                <p class="text-sm text-white bg-red-600 w-full mt-2 p-1 rounded">* {{session('mensaje')}}</p>
                @endif
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
                    class="border p-2 w-full rounded-lg outline-none @error('password') border-red-500
                    @enderror"
                    >
                    @error('password')
                    <p class="text-sm text-white bg-red-600 w-full mt-2 p-1 rounded">* {{$message}}</p>
                @enderror
                </div>
                <div class="mb-5">
                    <input type="checkbox" name="remember" id="remember"> <label class="text-gray-500 text-sm">Mantener sesion</label>
                </div>
                <input 
                type="submit" 
                value="Iniciar Sesion"
                class="bg-blue-600 hover:bg-blue-700 transition text-white w-full p-2 rounded-lg"
                >
            </form>
        </div>
    </div>
@endsection