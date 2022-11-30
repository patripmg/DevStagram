<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {


        //Modificar el request
       $request->request->add(['username' => Str::slug($request->username)]);
        //Validación
       $this->validate($request,[
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required||unique:users|email|max:60',
            'password' => 'required|confirmed|min:6',
            //'password_confirmation' => 'required|max:30'
       ]);

       User::create([
            'name' => $request->name,
            //'username' =>Str::lower($request->username), // ponerlo todo en minuscula
            'username' => $request->username, // convertirlo en url
            'email' => $request->email,
            'password' => Hash::make($request->password),

       ]);

       //Autenticar un usuario

     /*   auth()->attempt([ //intentar autenticar al usuario
        'email' => $request->email,
        'password' => $request->password,
       ]); */

       //Otra forma de autenticar

       auth()->attempt($request->only('email', 'password'));

       return redirect()->route('posts.index');

    }




}
