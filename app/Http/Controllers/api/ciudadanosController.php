<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\api\ciudadanoModel;
use Illuminate\Support\Facades\Validator;

class ciudadanosController extends Controller
{
    public function showAllCitizen(){
        //$ciudadanos = ciudadanoModel::all();
        $ciudadanos = CiudadanoModel::paginate(10); 

        if ($ciudadanos->isEmpty()) {
            return response()->json(['message' => 'No existe registro de ciudadanos'], 200);
        }
        return response()->json($ciudadanos, 200);
    }

    public function addCitizen(Request $request){
        $validator = Validator::make($request->all(),[
            'cedula' => 'required|numeric|digits:10|unique:info_usuarios,cedula',
            'name' => 'required|max:30',
            'edad' => 'required|integer|digits:3',
            'ciudad' => 'required|max:10',
            'nacimiento' => 'required|date',
            'estadocivil' => 'required|in:soltero,casado,divorciado,soltera,casada,divorciada'
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Datos de ciudadano ingresados erroneamente',
                'error' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $ciudadano = ciudadanoModel::create([
            'cedula' => $request->cedula,
            'name' => $request->name,
            'edad' => $request->edad,
            'ciudad' => $request->ciudad,
            'nacimiento' => $request->nacimiento,
            'estadocivil' => $request->estadocivil,
        ]);

        if (!$ciudadano) {
            $data = [
                'message' => 'Error al agregar ciudadano',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'ciudadano' => $ciudadano,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function showCitizenById($id){
        $ciudadano = ciudadanoModel::find($id);
        // $ciudadano = Ciudadano::where('cedula', $cedula)->first();
        if(!$ciudadano) {
            $data = [
                'message' => 'No encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'ciudadano' => $ciudadano,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function deleteCitizen($id){
        $ciudadano = ciudadanoModel::find($id);
        if(!$ciudadano){
            $data = [
                'message' => 'No encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

            $ciudadano->delete();

            $data = [
                'message' => 'Ciudadano eliminado',
                'status' => 200
            ];
            return response()->json($data, 200);
    }

    public function modifyCitizen(Request $request, $id){
        $ciudadano = ciudadanoModel::find($id);
        if(!$ciudadano){
            $data = [
                'message' => 'No encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $validator = Validator::make($request->all(),[
            'cedula' => 'required|numeric|digits:10|unique:info_usuarios,cedula', //validar para que si es la misma
            //cedula continuar y modificar
            'name' => 'required|max:30',
            'edad' => 'required|integer|digits:3',
            'ciudad' => 'required|max:10',
            'nacimiento' => 'required|date',
            'estadocivil' => 'required|in:soltero,casado,divorciado,soltera,casada,divorciada'
        ]);
        if ($validator->fails()){
            $data = [
                'message' => 'Error validando datos',
                'error' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $ciudadano->cedula = $request->cedula;
        $ciudadano->name = $request->name;
        $ciudadano->edad = $request->edad;
        $ciudadano->ciudad = $request->ciudad;
        $ciudadano->nacimiento = $request->nacimiento;
        $ciudadano->estadocivil = $request->estadocivil;

        $ciudadano->save();
        $data = [
            'message' => 'Datos de ciudadano actualizados satisfactoriamente',
            'ciudadano' => $ciudadano,
            'status' => 200    
        ];
        return response()->json($data, 200);
    }

    public function updateUserField(Request $request, $id){
        $ciudadano = ciudadanoModel::find($id);
        if(!$ciudadano){
            $data = [
                'message' => 'No encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        //return response()->json($request->all(),200);

        $validator = Validator::make($request->all(),[
            'cedula' => 'numeric|digits:10|unique:info_usuarios,cedula',
            'name' => 'max:30',
            'edad' => 'integer|digits:3',
            'ciudad' => 'max:10',
            'nacimiento' => 'date',
            'estadocivil' => 'in:soltero,casado,divorciado,soltera,casada,divorciada'
        ]);
        if ($validator->fails()){
            $data = [
                'message' => 'Error validando datos',
                'error' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if ($request->has('cedula')){
            $ciudadano->cedula = $request->cedula;
        }

        if ($request->has('name')){
            $ciudadano->name = $request->name;
        }

        if ($request->has('edad')){
            $ciudadano->edad = $request->edad;
        }

        if ($request->has('ciudad')){
            $ciudadano->ciudad = $request->ciudad;
        }

        if ($request->has('nacimiento')){
            $ciudadano->nacimiento = $request->nacimiento;
        }

        if ($request->has('estadocivil')){
            $ciudadano->estadocivil = $request->estadocivil;
        }

        $ciudadano->save();

        $data = [
            'message' => 'Datos de ciudadano actualizados satisfactoriamente',
            'ciudadano' => $ciudadano,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}

