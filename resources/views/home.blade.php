@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Lista de cursos</div>

                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nombre del curso</th>
                                <th>Profesor</th>
                                <th>Aula</th>
                                <th>Horario</th>
                                <th>Enlace</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($cursos as $curso)
                            <tr>
                                <td>{{$curso->nombre}}</td>
                                @if(Auth::user()->name == $curso->docente)
                                <td class="success">{{$curso->docente}}</td>
                                @else
                                    <td>{{$curso->docente}}</td>
                                @endif
                                <td>{{$curso->grupo['aula']}}</td>
                                <td>{{"De: ".date('H:i A',strtotime($curso->grupo['horario']['hora_inicio'])) . " a " . date('H:i A',strtotime($curso->grupo['horario']['hora_fin']))}}</td>
                                <td><a href="{{route('grupo.show',[$curso->grupo['id'],'curso_id'=>$curso->id])}}" class="btn btn-primary btn-xs">Pasar lista</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
