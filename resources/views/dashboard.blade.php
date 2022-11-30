@extends('layouts.app')

@section('titulo')
Perfil: {{$user->username}}
@endsection

@section('contenido')
<div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
        {{-- coger todo en un dispositivo prqueño --}}
        <div class="w-8/12 lg:w-6/12 px-5">
            <img src="{{ asset('img/usuario.svg')}}" alt="">
        </div>
        <div
            class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:items-start py-10 md:py-10 md:justify-center">
            <p class="text-gray-700 uppercase text-2xl">{{$user->username}}</p>

            <p class="text-gray-800 mb-3 text-sm font-bold mt-5">
                0
                <span class="font-normal">Seguidores</span>
            </p>
            <p class="text-gray-800 mb-3 text-sm font-bold">
                0
                <span class="font-normal">Siguiendo</span>
            </p>
            <p class="text-gray-800 mb-3 text-sm font-bold">
                0
                <span class="font-normal">Post</span>
            </p>
        </div>
    </div>
</div>


<section class="container mx-auto mt-10">
    <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
    
    @if ($posts->count())

    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($posts as $post)

        <div>
            <a href="{{route('posts.show', ['post' => $post, 'user' => $user])}}">
                <img src="{{ asset('uploads') . "/" . $post->imagen}}" alt="Imágen de la publicación {{$post->titulo}}">
            </a>

        </div>

        @endforeach
    </div>
    <div class="my-10">
        {{$posts->links()}}
    </div>

    @else
    <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay publicaciones</p>
    @endif
</section>
@endsection
