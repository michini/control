@extends('layouts.app')
@section('titulo')
    Lista de estudiantes
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Lista de estudiantes del curso de {{$estudiantes->grupos}}</div>
                </div>
            </div>
        </div>
    </div>
@endsection