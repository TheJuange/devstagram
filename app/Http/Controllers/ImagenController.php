<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Intervention\Image\Laravel\Facades\Image;


class ImagenController extends Controller
{
    public function store(Request $request){
        if(!is_dir(public_path('uploads'))){
            mkdir('uploads');
        }
        $imagen = $request->file('file');
        $nombreImagen = Str::uuid() . "." . $imagen->extension();
        $imagenServidor = Image::read($imagen)->resize(1000,1000);
        $imagenPath = public_path('uploads') . '/' . $nombreImagen;
        $imagenServidor->save($imagenPath);

        return response()->json(['imagen'=>$nombreImagen]);
       
    }
}
