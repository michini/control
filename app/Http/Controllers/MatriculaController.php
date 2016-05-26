<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Matricula;

class MatriculaController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function matricular_estudiante(Request $request){
        $grupo_id = $request->get('grupo_id');
        return view('matricula.matricula',compact('grupo_id'));
    }

    public function reg_mat(Request $request, $id){
        $estudiante_id = $request->get('estudiante_id');

        //Consultamos si el estudiante pertenece al grupo
        $data = DB::table('estudiantes')
            ->join('estudiante_grupo','estudiantes.id','=','estudiante_grupo.estudiante_id')
            ->join('grupos','estudiante_grupo.grupo_id','=','grupos.id')
            ->select('*')
            ->where('estudiante_grupo.grupo_id',$id)
            ->where('estudiantes.codigo',$estudiante_id)
            ->get();

        if (!$data) {
            return response()->json(['mensaje'=>'El estudiante con codigo '.$estudiante_id.' no esta registrado en este curso','id'=>1]);
        }

        //Consultamos si el estudiante ya esta matriculado al curso
        $consulta = Matricula::select('id')->where('estudiante_id',$data[0]->estudiante_id)
            ->where('curso_id',$data[0]->curso_id)
            ->get();

        if ($consulta->count() == 1){
            return response()->json(['mensaje'=>'Estudiante ya matriculado al curso','id'=>2]);
        }else{
            $matricula = new Matricula();
            $matricula->estudiante_id = $data[0]->estudiante_id;
            $matricula->estado_id = 1;
            $matricula->curso_id = $data[0]->curso_id;
            $matricula->save();
            return response()->json(['mensaje'=>'Estudiante matriculado al curso satisfactoriamente','id'=>3]);
        }

    }
}
