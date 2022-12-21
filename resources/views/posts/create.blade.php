@extends('layouts.app')

@section('tituloPagina')
Crea una nueva publicación
@endsection


@section('titulo')
   
    <p class="font-ubuntu  text-pink-600"> Crea una nueva publicación</p>
@endsection
@push('styles') 
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush
@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{route('imagenes.store')}}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>

        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form method="POST" action="{{route('posts.store')}}" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Titulo
                    </label>
    
                    <input 
                    type="text" 
                    name="titulo" 
                    id="titulo" 
                    placeholder="Titulo de la publicación" 
                    class="border p-3 w-full rounded-lg @error('titulo') border-red-500 @enderror"
                    value="{{old('titulo')}}"
                    />
                    @error('titulo')
                     <p class="bg-red-500 text-white rounded-lg my-2 text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="description" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripción
                    </label>
                    <textarea id="" cols="30" rows="10"
                    name="description" 
                    id="description" 
                    placeholder="Descripción de la publicación" 
                    class="border p-3 w-full rounded-lg @error('description') border-red-500 @enderror"
                    
                    >{{old('description')}}</textarea>

                    @error('description')
                     <p class="bg-red-500 text-white rounded-lg my-2 text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="hidden" name='imagen' value="{{ old('imagen')}}">
                    @error('imagen')
                    <p class="bg-red-500 text-white rounded-lg my-2 text-sm p-2 text-center">{{$message}}</p>
                   @enderror
                </div>

                <input type="submit" value="Crear publicación" class="bg-pink-600 hover:bg-pink-700 transition-colors cursor-pointer uppercase font-bold p-3 rounded-lg text-white w-full">

            </form>
        </div>
        
    </div>
@endsection