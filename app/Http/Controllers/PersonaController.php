<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;

class PersonaController extends Controller
{


    public function getPersonbyCedula($cedula)
    {

        $persona = Persona::where('cedula', $cedula)->first();

        if (!$persona) {
            return response()->json(['message' => 'La persona no existe'], 404);
        }
        return response()->json($persona);
    }

    public function addPerson(Request $request)
    {
        $person = new Persona();
        $person->cedula = $request->input('numdoc');
        $person->nombre = $request->input('nombres');
        $person->apellidos = $request->input('apellidos');
        $person->email = $request->input('email');
        $person->direccion = $request->input('dir');
        $person->telefono = $request->input('tel');
        $person->fecha_nac = $request->input('fecha');
        $person->tipo_doc = $request->input('tdoc');
        $person->contraseña = Hash::make($request->input('pass'));
        $person->save();

        return response()->json(['Mensaje' => 'Usuario Creado'], 201);
    }

    //how to create login in laravel 9.0 ?  

    public function login(Request $request)
    {
        $cedula = intval($request->cedula);
        $password = $request->password;
        $credentials = [
            'cedula' => $cedula,
            'password' => $password
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('Token')->plainTextToken;
            return response([
                "token" => $token,
                "valor" => true
            ], Response::HTTP_OK);
        } else {
            return response(["message" => "Credenciales inválidas"], Response::HTTP_UNAUTHORIZED);
        }
    }
    public function logout(Request $request)
    {   
        if (Auth::check()) {
            return response()->json([
                'error' => 'Unauthenticated',
            ], 401);
        }
        $user = $request->user();
        if (!$user->hasValidAccessToken()) {
            return response()->json([
                'error' => 'Token not found',
            ], 404);
        }
        $user->token()->revoke();

        return response()->json([
            'valor' => true
        ]);
    }
}
