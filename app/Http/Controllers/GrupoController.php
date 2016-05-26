<?php

namespace App\Http\Controllers;

use App\Estudiante;
use App\Grupo;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Curso;

class GrupoController extends Controller
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
        $cantidad = DB::table('asistencias')
            ->join('estudiantes','asistencias.estudiante_id','=','estudiantes.id')
            ->join('estudiante_grupo', 'estudiantes.id', '=', 'estudiante_grupo.estudiante_id')
            ->join('grupos', 'estudiante_grupo.grupo_id', '=', 'grupos.id')
            ->join('cursos','grupos.curso_id','=','cursos.id')
            ->distinct()
            ->select(DB::raw('COUNT(estudiantes.id) as cantidad'))
            ->where('grupo_id',$id)
            ->where('asistencias.presencia','=',1)
            ->where('asistencias.curso_id',Request::get('curso_id'))
            ->get();
        //dd($cantidad);
        
        $curso = Curso::find(Request::get('curso_id'));
        //dd($curso);
        return view('curso.show',compact('curso','cantidad'));
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

    public function registrar_estudiante(){
        $data = Request::all();
        $estudiante = Estudiante::select('id')->where('codigo',$data[0])->first();

        if(!$estudiante){
            return response()->json(['mensaje'=>'Codigo invalido o estudiante no existe','id'=>1]);
        }

        DB::table('estudiante_grupo')->insert([
            'grupo_id'=>$data[1],
            'estudiante_id'=>$estudiante->id
        ]);

        return response()->json(['mensaje'=>'Estudiante registrado al curso, presione Enviar para matricular','id'=>4]);
    }
}
