<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('styles') {{-- solo pasa ursarlo en las vistas que elijas --}} 

    <title>DevStagram - @yield('tituloPagina')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')

    @livewireStyles
</head>

<body class="bg-gray-100">
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-3xl text-pink-600 font-ubuntu font-bold">
                DevStagram
            </a>


            @auth
                <nav class="flex gap-2 items-center">
                    <a href="{{route('posts.create')}}" class=" flex items-center gap-2 bg-white border p-2 text-gray-600 text-sm uppercase cursor-pointer font-bol">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                          </svg>
                          

                        Crear
                    </a>
                    <a class="font-bold flex items-end   text-gray-600 text-sm" href="{{route('posts.index', auth()->user()->username)}}">
                        HOLA:  <span class="font-normal uppercase">{{auth()->user()->username}}  </span> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                          </svg>
                          
                    </a>
                    <form method="POST" action="{{route('logout')}}">
                        @csrf
                          <button type="submit" class="font-bold uppercase text-pink-600 text-sm" href="{{ route('logout') }}">Cerrar sesión
                          </button>
                    </form>
                  
                </nav>
            @endauth

            @guest
                <nav class="flex gap-2 items-center">
                    <a class="font-bold uppercase text-pink-600 text-sm" href="{{ route('login') }}">Login</a>
                    <a class="font-bold uppercase text-pink-600 text-sm" href="{{ route('register') }}">Crear cuenta</a>
                </nav>
            @endguest

        </div>
    </header>

    <main class="container mx-auto mt-10">
        <h2 class="font-black  text-center text-3xl mb-10">
            @yield('titulo')
        </h2>
        @yield('contenido')
    </main>

    <footer class="text-center p-5 text-pink-500 font-bold uppercase mt-10">
        DevStagram - Todos los derechos reservados
        {{now()->year}}
    </footer>
    @vite('resources/js/app.js')

    @livewireScripts
</body>

</html>
