<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Validator;

class clienteController extends Controller
{
    public function index(){
        $clientes = Cliente::all();
        /*if($clientes->isEmpty()){
            $data = [
                'message' => 'No se encontraron clientes',
                'status' => 200
            ];
            return response()->json($data,404);
        }*/
        $data = [
            'clientes' => $clientes,
            'status' => 200
        ];
        return response() -> json($data, 200);

    }

    public function store(request $request){
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'telefono' => 'required',
            'email' => 'required|email'
        ]);

        if($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errores' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data,400);
        }
        $cliente = Cliente::create([
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'telefono' => $request->telefono,
            'email' => $request->email,
            
        ]);
        if(!$cliente){
            $data= [
                'message' => 'Error al crear cliente',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data= [
            'cliente' => $cliente,
            'status' => 201
        ];
        return response()->json($data, 201);


    }
}
