@extends('layouts.app')
@section('titulo')
    Lista de estudiantes
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Lista de estudiantes del curso de {{$registro[0]->curso}}</div>
                    <div class="panel-body">
                        <form action="" method="get">
                            {!! csrf_field() !!}
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Detalle de inasistencias</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($registro as $reg)
                                    <tr>
                                        <td>{{$reg->codigo}}</td>
                                        <td>{{$reg->nombre_completo}}</td>
                                        <td><a href="{{route('inasistencias',['id'=>$reg->id,'curso'=>$reg->curso_id])}}">Detalles</a></td>
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