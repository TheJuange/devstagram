@extends('layouts.app')

@section('titulo')
    {{$post->titulo}}
@endsection

@section('contenido')
    <div class="md:flex container mx-auto">
        <div class="md:w-1/2">
            <img src="{{asset('uploads') . '/' . $post->imagen}}" alt="Imagen del post {{$post->titulo}}">
            <div class="p-3 flex items-center gap-4">
                @auth

                <livewire:like-post :post="$post"/>
                
                @endauth
                  
               
            </div>
            <div class="">
                <p class="font-bold">{{$post->user->username}}</p>
                <p class="text-sm text-gray-500 ">{{ $post->created_at->diffForHumans() }}</p>
                <p>{{$post->descripcion}}</p>
            </div>
            @auth
                @if($post->user_id === auth()->user()->id)
                    <form action="{{route('post.destroy', $post)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <input
                        type = "submit"
                        value = "Eliminar publicacion"
                        class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer"
                        />
                    </form>
                @endif

            @endauth
        </div>
        <div class="md:w-1/2 p-5">
           
            <div class="shadow bg-white p-5 mb-5">
                @auth
                <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario</p>
                @if (session('mensaje'))
                <p class="text-sm text-center text-white bg-green-600 w-full mt-2 p-1 rounded">{{session('mensaje')}}</p>
                @endif
                <form action="{{route('comentario.store',['post'=>$post, 'user'=>$user])}}" method="post">
                    @csrf
                    <div class="mb-5 ">
                        <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">
                            comentario
                        </label>
                        <input 
                            type="text" 
                            name="comentario"
                            id="comentario" 
                            placeholder="Agrega un comentario"
                            class="border p-3 w-full rounded-lg outline-none @error('comentario') border-red-500
                            @enderror"
                            />
                        @error('comentario')
                            <p class="text-sm text-white bg-red-600 w-full mt-2 p-1 rounded">* {{$message}}</p>
                        @enderror
                        
                    </div>

                    <input 
                type="submit" 
                value="Comentar"
                class="bg-blue-600 hover:bg-blue-700 transition text-white w-full p-2 rounded-lg"
                >
                </form>
                @endauth
                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                    @if($post->comentarios->count())
                        @foreach($post->comentarios as $comentario)
                            <div class="p-5 border-gray-300 border-b">
                                <a class="cursor-default text-lg font-bold" href="{{route('post.index',$comentario->user)}}"> {{$comentario->user->username}}</a>
                                <p class="text-gray-600">{{$comentario->comentario}}</p>
                                <p class="text-gray-500 text-sm">{{$comentario->created_at->diffForHumans()}}</p>
                            </div>
                        @endforeach
                    @else
                     <p class="p-10 text-center">No hay comentario</p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
@endsection