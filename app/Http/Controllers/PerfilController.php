<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index (){
        return view('perfil.index');
    }

    public function store (Request $request){

        //Modificar el request
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'username' => ['required','unique:users,username,'.auth()->user()->id,'min:3','max:20', 'not_in:twitter,editar-perfil'],
        ]);

        if($request->imagen) {

                
                $imagen = $request->file('imagen');

                $nombreImagen = Str::uuid() . "." . $imagen->extension(); //generar id unico para cada imagen porque todos tienen que tener un id unico si o si

                $imagenServidor = Image::make($imagen); // nos permite crear una imagen de intervetion-image para poder subirla

                $imagenServidor->fit(1000,1000); //cortar la imagen 1000x100 px

                $imagenPath = public_path('perfiles') . '/' . $nombreImagen; //aqui es donde queremos colocar las img

                $imagenServidor->save($imagenPath); //guardar imagen
        } 

        //Guardar cambios

        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? '';
        $usuario->save();

        //Redireccionar
        return redirect()->route('posts.index', $usuario->username);
    }
}
