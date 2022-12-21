@extends('layouts.app')

@section('titulo')
<h1 class="font-ubuntu font-bold text-3xl text-center  mb-10  text-pink-600">Editar perfil : <span class="uppercase">{{auth()->user()->username}}</span></h1>


@endsection

@section('contenido')
<div class="md:flex md:justify-center">
    <div class="md:w-1/2 bg-white shadow p-6">
        <form action="{{route('perfil.store')}}" class="mt-10 md:mt-0" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                    Nombre de usuario
                </label>

                <input 
                    type="text" 
                    name="username" 
                    id="username" 
                    placeholder="Tu nombre de usuario"
                    class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                    value="{{auth()->user()->username}}" 
                    />
                @error('username')
                <p class="bg-red-500 text-white rounded-lg my-2 text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                    Correo electrónico
                </label>

                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    placeholder="Tu nombre de usuario"
                    class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                    value="{{auth()->user()->email}}" 
                    />
                @error('email')
                <p class="bg-red-500 text-white rounded-lg my-2 text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                    Imagen perfil
                </label>

                <input
                     type="file" 
                     name="imagen" 
                     id="imagen" 
                     class="border p-3 w-full rounded-lg "
                     value=""
                     accept=".jpg, .jpeg, .png"
                    />
            </div>

{{--             <div class="mb-5">
                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                   Tu contraseña actual
                </label>
                <input 
                type="password" 
                name="password" 
                id="password" 
                placeholder="Tu contraseña" 
                class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"
                />
                @error('password')
                <p class="bg-red-500 text-white rounded-lg my-2 text-sm p-2 text-center">{{$message}}</p>
               @enderror
            </div>

            <div class="mb-5">
                <label for="new_password" class="mb-2 block uppercase text-gray-500 font-bold">
                   Nueva contraseña
                </label>
                <input 
                type="password" 
                name="new_password" 
                id="new_password" 
                placeholder="Nueva contraseña" 
                class="border p-3 w-full rounded-lg @error('new_password') border-red-500 @enderror"
                />
                @error('new_password')
                <p class="bg-red-500 text-white rounded-lg my-2 text-sm p-2 text-center">{{$message}}</p>
               @enderror
            </div>

            @if (session('mensaje'))
                <p>{{session('mensaje')}}</p>
            @endif --}}



            <input 
                type="submit" 
                value="Guardar cambios"
                class="bg-pink-600 hover:bg-pink-700 transition-colors cursor-pointer uppercase font-bold p-3 rounded-lg text-white w-full"
            />
        </form>
    </div>
</div>
@endsection
