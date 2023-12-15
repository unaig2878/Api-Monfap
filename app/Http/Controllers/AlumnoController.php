<?php

namespace App\Http\Controllers;
use App\Models\Alumno;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{
    public function index()
    {
        try {
            $alumnos = Alumno::all();

            return response()->json([
                'success' => true,
                'message' => 'Alumnos cargados correctamente',
                'data' => $alumnos
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success'=> false,
                'message'=> "Error al cargar los alumnos. {$e->getMessage()}",
                'data' => []
            ]);
        }
    }

    public function store(Request $request)
    {
        $params = $request->validate([
            "nombre" => "required|string|max:32",
            "telefono" => "nullable|string|max:16",
            "edad" => "nullable|integer",
            "password" => "required|string|max:64",
            "email" => "required|email|unique:alumnos|max:64",
            "sexo" => "required|string",
        ]);

        try {
            DB::table("alumnos")->insert($params);

            return response()->json([
                'success' => true,
                'message' => 'Alumno creado correctamente',
                'data' => $params
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Error en la creación del alumno. {$e->getMessage()}",
                'data' => $params
            ]);
        }
    }

    public function show(string $id)
    {
        try {
            $alumno = DB::table("alumnos")->whereId($id)->first();
            return response()->json([
                'success' => true,
                'message' => "Alumno con id $id cargado correctamente",
                'data' => $alumno
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Error al cargar el alumno con id $id. {$e->getMessage()}",
                'data'=> []
            ]);
        }
    }

    public function update(Request $request, string $id)
    {
        $params = $request->validate([
            "nombre" => "string|max:32",
            "telefono" => "nullable|string|max:16",
            "edad" => "nullable|integer",
            "password" => "string|max:64",
            "email" => "email|max:64|unique:alumnos,email," . $id,
            "sexo" => "string",
        ]);

        try {
            DB::table('alumnos')->where('id', $id)->update($params);
            return response()->json([
                'success' => true,
                'message' => 'Alumno actualizado correctamente',
                'data' => $params
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Error al actualizar el alumno con id $id. {$e->getMessage()}",
                'data' => $params
            ]);
        }
    }

    public function destroy(string $id)
    {
        try {
            $alumno = DB::table("alumnos")->whereId($id)->first();
            DB::table("alumnos")->where('id', $id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'Alumno eliminado correctamente',
                'data' => $alumno
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success'=> false,
                'message' => "Error al eliminar el alumno con id $id. {$e->getMessage()}",
                "data"=> []
            ]);
        }
    }
}
