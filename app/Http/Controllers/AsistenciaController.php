<?php

namespace App\Http\Controllers;

use App\Asistencia;
use Illuminate\Http\Request;

use App\Http\Requests;

class AsistenciaController extends Controller
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
        return "hola";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd("gol");
        $data = $request->all();

        $asistencia = new Asistencia();
        $asistencia->fecha = date('Y-m-d');
        $asistencia->presencia = $data[0];
        $asistencia->estudiante_id = $data[1];
        $asistencia->curso_id = $data[2];
        $asistencia->save();

        return response()->json(['mensaje'=>'registro creado']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function inasistencias(Request $request){
        
        $query = Asistencia::where('estudiante_id',$request->get('id'))->where('curso_id',$request->get('curso'))->where('presencia',1)->get();
        //dd($query);

        return view('grupo.inasistentes',compact('query'));
    }
}
