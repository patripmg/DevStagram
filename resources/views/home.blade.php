@extends('layouts.app')

@section('tituloPagina')
Publicaciones
@endsection

@section('titulo')
<h1 class="font-ubuntu font-bold text-3xl text-center uppercase mb-10  text-pink-600">Publicaciones</span></h1>


@endsection
@section('contenido')

<x-listar-post :posts="$posts"/>



@endsection
