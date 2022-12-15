@extends('layouts.app')

@section('titulo')
Perfil: {{$user->username}}
@endsection

@section('contenido')
<div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
        {{-- coger todo en un dispositivo prqueño --}}
        <div class="w-8/12 lg:w-6/12 px-5">
            <img class=" rounded-3xl"
                src="{{ $user->imagen ? asset('perfiles') . '/' . $user->imagen : asset('img/usuario.svg') }}" alt="">
        </div>
        <div
            class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:items-start py-10 md:py-10 md:justify-center">

            <div class="flex items-center gap-2">
                <p class="text-gray-700 uppercase text-2xl">{{$user->username}}</p>
                @auth
                @if ($user->id === auth()->user()->id)

                <a href="{{route('perfil.index')}}" class="text-grey-500 hover:text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                    </svg>

                </a>

                @endif
                @endauth
            </div>


            <p class="text-gray-800 mb-3 text-sm font-bold mt-5">
                {{$user->followers->count()}}
                <span class="font-normal">@choice('Seguidor|Seguidores', $user->followers->count())</span>
            </p>

            <p class="text-gray-800 mb-3 text-sm font-bold">
                {{$user->followings->count()}}
                <span class="font-normal">Siguiendo</span>
            </p>

            <p class="text-gray-800 mb-3 text-sm font-bold">
                {{$user->posts->count()}}
                <span class="font-normal">@choice('Publicación|Publicaciones', $user->posts->count())</span>
            </p>

            @auth
                @if ($user->id !== auth()->user()->id)
                    @if (!$user->siguiendo(auth()->user()))
                        

                        <form action="{{ route('users.follow', $user) }}" method="POST">
                            @csrf
                            <input type="submit" value="Seguir"
                                class="bg-blue-600 text-white rounded-lg uppercase px-3 py-1 text-xs font-bold cursor-pointer">
                        </form>
                        
                        @else
                        
                        <form action=" {{route('users.unfollow', $user)}}" method="POST">
                            @method('DELETE')
                            @csrf

                            <input type="submit" value="Dejar de seguir"
                                class="bg-red-600 text-white rounded-lg uppercase px-3 py-1 text-xs font-bold cursor-pointer">
                        </form>
                    @endif
                @endif
            @endauth

        </div>
    </div>
</div>


<section class="container mx-auto mt-10">
    <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
    <x-listar-post :posts="$posts" />
</section>
@endsection
