@extends('layouts.app')
@section('titulo')
    Detalles inasistencia
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Detalles de inasistencias al curso de <b>{{ucfirst($query[0]->curso->nombre)}}</b><br> del alumno {{strtoupper($query[0]->estudiante->nombre_completo)}}
                    </div>
                    <div class="panel-body">
                        <form action="" method="post">
                            {!! csrf_field() !!}
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">Fecha</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($query as $data)
                                    <tr>
                                        <td class="text-center">{{date('d-m-Y',strtotime($data->fecha))}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection