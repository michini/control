<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
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
    
    public function registro($id)
    {

        $registro = DB::table('asistencias')
            ->join('estudiantes','asistencias.estudiante_id','=','estudiantes.id')
            ->join('estudiante_grupo', 'estudiantes.id', '=', 'estudiante_grupo.estudiante_id')
            ->join('grupos', 'estudiante_grupo.grupo_id', '=', 'grupos.id')
            ->join('cursos','grupos.curso_id','=','cursos.id')
            ->distinct()
            ->select('estudiantes.*','cursos.nombre as curso','cursos.docente as docente','grupos.aula as aula','cursos.id as curso_id')
            ->where('grupo_id',$id)
            ->where('asistencias.presencia','=',1)
            ->where('asistencias.curso_id',Request::get('curso_id'))
            ->get();
        //$registro = DB::select('select distinct estudiantes.id from estudiantes INNER JOIN asistencias on asistencias.estudiante_id = estudiantes.id');
        //dd($registro);

        return view('grupo.show',compact('registro'));
    }
    
}

