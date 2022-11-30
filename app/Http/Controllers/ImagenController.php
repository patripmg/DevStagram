<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request){

        //ESTO CARGA EL SUCCESS DE APP.JS
        $imagen = $request->file('file');

        $nombreImagen = Str::uuid() . "." . $imagen->extension(); //generar id unico para cada imagen porque todos tienen que tener un id unico si o si

        $imagenServidor = Image::make($imagen); // nos permite crear una imagen de intervetion-image para poder subirla

        $imagenServidor->fit(1000,1000); //cortar la imagen 1000x100 px

        $imagenPath = public_path('uploads') . '/' . $nombreImagen; //aqui es donde queremos colocar las img

        $imagenServidor->save($imagenPath); //guardar imagen
        
        return response()->json(['imagen' => $nombreImagen]); //json convierte el arreglo imagen en json, se comunica con la subida de img de dropozne
    }
}
