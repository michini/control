@extends('layouts.app')
@section('titulo')
Curso
@endsection
@section('content')
<div class="container" ng-app="app" ng-controller="myCtrl">
     <div class="row">
         <div class="col-lg-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     Lista de estudiantes del curso de {{ucfirst($curso->nombre)}};
                 </div>
                 <div class="panel-body">
                     <form class="form-horizontal">
                         <div class="form-group">
                             <label for="" class="control-label col-lg-2">Curso:</label>
                             <div class="col-lg-3">
                                 <input type="text" class="form-control" disabled value="{{ucfirst($curso->nombre)}}">
                             </div>
                             <label for="" class="control-label col-lg-2">Profesor:</label>
                             <div class="col-lg-3">
                                 <input type="text" class="form-control" disabled value="{{ucfirst($curso->docente)}}">
                             </div>
                             @if(Auth::user()->username == "efloresa" || Auth::user()->username == "rvargas" || Auth::user()->username == "lgonzales")
                             <a href="{{route('matricular',['grupo_id'=>$curso->grupo->id])}}" class="btn btn-primary">Matricular estudiante</a>
                             @endif
                         </div>
                         <div class="form-group">
                             <label for="" class="control-label col-lg-2">Aula:</label>
                             <div class="col-lg-3">
                                 <input type="text" class="form-control" disabled value="{{ucfirst($curso->grupo->aula)}}">
                             </div>
                             <label for="" class="control-label col-lg-2">Horario:</label>
                             <div class="col-lg-3">
                                 <input type="text" class="form-control" disabled value="{{"De: ".date('H:i A',strtotime($curso->grupo->horario->hora_inicio)) . " a " . date('H:i A',strtotime($curso->grupo->horario->hora_fin))}}">
                             </div>
                             @if(Auth::user()->username == "efloresa" || Auth::user()->username == "rvargas" || Auth::user()->username == "lgonzales")
                             <a href="{{route('registro',[$curso->grupo['id'],'curso_id'=>$curso->id])}}" class="btn btn-primary" ng-show="{{$cantidad[0]->cantidad}} > 0">Registro de inasistencia</a>
                             @endif
                         </div>
                     </form>
                     <form name="asis">
                         
                         <table class="table table-hover">
                             <thead>
                             <tr>
                                 <th>Código</th>
                                 <th>Nombre</th>
                                 <th>Estado</th>
                                 <th>Asistencia</th>
                             </tr>
                             </thead>
                             <tbody>
                             @foreach($curso->grupo->estudiantes as $estudiante)
                                 @foreach($estudiante->matriculas as $matricula)
                                     @if($curso->id == $matricula->curso_id)
                                        @if($matricula->estado->nombre == "Matriculado")
                                         <tr>
                                             <td>{{$estudiante->codigo}}</td>
                                             <td>{{$estudiante->nombre_completo}}</td>
                                                <td>{{$matricula->estado->nombre}}</td>
                                             <td>
                                                 <input id="asistio{{$estudiante->codigo}}" type="radio" name="asistencia{{$estudiante->codigo}}" onclick="$(this).attr('disabled',true) && $('#falto{{$estudiante->codigo}}').attr('disabled',true)" value="0" ng-click="click({{$estudiante->id}},0,{{$curso->id}})" ng-disabled="asis.asistencia{{$estudiante->codigo}}.$dirty" ng-model="asistencia{{$estudiante->codigo}}"> <label for="asistio{{$estudiante->codigo}}">Asistio</label>

                                                 <input id="falto{{$estudiante->codigo}}" type="radio" name="asistencia{{$estudiante->codigo}}" value="1" ng-click="click({{$estudiante->id}},1,{{$curso->id}})" ng-disabled="asis.asistencia{{$estudiante->codigo}}.$dirty" ng-model="asistencia{{$estudiante->codigo}}"> <label for="falto{{$estudiante->codigo}}">Falto</label>
                                             </td>
                                         </tr>
                                        @endif
                                     @endif
                                 @endforeach
                             @endforeach
                             </tbody>
                         </table>

                             <div class="col-lg-2 col-lg-offset-4">
                                 <a href="{{route('inicio')}}" class="btn btn-success center pull-right">Guardar</a>
                             </div>


                     </form>
                 </div>
             </div>
         </div>
     </div>
</div>
@endsection
@section('js')
    <script src="{{asset('js/app.js')}}"></script>
    
@endsection