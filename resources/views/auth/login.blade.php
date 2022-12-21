@extends('layouts.app')

@section('tituloPagina')
Inicia sesión en devStagram
@endsection

@section('titulo')
<h1 class="font-ubuntu font-bold text-3xl text-center  mb-10  text-pink-600">Inicia sesión en devStagram</h1>

@endsection

@section('contenido')
<div class="md:flex md:justify-center md:gap-10 md:items-center">
    <div class="md:w-6/12 p-5">
        <img src="{{asset('img/login.jpg')}}" alt="Imagen de inicio de sesion">
    </div>

    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
        <form novalidate method="POST" action="{{route('login')}}">
            @csrf
             @if (session('mensaje'))
             <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{session('mensaje')}}</p> 
             @endif


            <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                   Correo electrónico
                </label>

                <input 
                type="email" 
                name="email" 
                id="email" 
                placeholder="Tu correo electrónico" 
                class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                value="{{old('email')}}"
                />
                @error('email')
                <p class="bg-red-500 text-white rounded-lg my-2 text-sm p-2 text-center">{{$message}}</p>
               @enderror
            </div>

            <div class="mb-5">
                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                   Contraseña
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
                <input type="checkbox" name="remember" id="" class="bg-pink-700"> <label for="" class=" text-gray-500 text-sm">Recordar usuario</label> 
            </div>

            <input type="submit" value="Iniciar sesión" class="bg-pink-600 hover:bg-pink-700 transition-colors cursor-pointer uppercase font-bold p-3 rounded-lg text-white w-full">
        </form>
    </div>
</div>

@endsection
