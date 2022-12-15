<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function __invoke(){ //Cuando el controlador tiene un solo método

        //Obtener a quienes seguimos

       $ids =  auth()->user()->followings->pluck('id')->toArray(); //pluck para traer lo que necesitemos, en este caso el id

       $posts = Post::whereIn('user_id', $ids)->latest()->paginate(20);

        return view('home', ['posts' => $posts]);
    }
}
