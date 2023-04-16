<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacion;
use Illuminate\Routing\Controller;

class PublishController extends Controller
{
    public function getAllPublish()
    {

        $publish = Publicacion::where('estado_publicacion', 'true')
        ->orderBy('id_publicacion')
        ->get();
        return response()->json($publish);
    }
    public function getPublishbyId($id)
    {

        $publish = Publicacion::where('id_publicacion', $id)->first();

        if (!$publish) {
            return response()->json(['message' => 'La publicacion no existe'], 404);
        }

        return response()->json($publish);
    }
    public function updatePublish(Request $request)
    {
        $publish = Publicacion::findOrFail($request->input('id'));

        $publish->update($request->only([
            'titulo',
            'descripcion',
        ]));

        return response()->json([
            'message' => 'Publicación actualizada correctamente',
            'publish' => $publish
        ], 200);
    }

    public function deletePublish($id)
    {

        $publish = Publicacion::findOrFail($id);
        $publish->estado_publicacion = 'false';
        $publish->save();
        return response()->json($publish, 201);
    }
    public function addPublish(Request $request)
    {
        $publish = new Publicacion();
        $publish->titulo = $request->input('titulo');
        $publish->autor = $request->input('autor');
        $publish->descripcion = $request->input('descripcion');
        $publish->estado_publicacion = $request->input('estado');
        $publish->save();

        return response()->json(['Mensaje' => 'Publicacion Creada'], 201);
    }
}
