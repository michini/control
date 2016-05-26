@extends('layouts.app')
@section('titulo','Matricular estudiante')
@section('content')
<div class="container" ng-app="app" ng-controller="ctrl">
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					Matricular estudiante
				</div>
				<div class="panel-body">
					<form class="form-horizontal" ng-submit="submit()" name="matr">
						<div class="form-group" ng-class="{'has-error':msg.id == 1,'has-success':msg.id == 3,'has-warning':msg.id == 2}">
							<label class="control-label col-lg-4">Código del estudiante:</label>
							<div class="col-lg-5">
								<input type="text" class="form-control" id="estudiante_id" ng-model="estudiante_id" required>
								<span class="help-block">@{{msg.mensaje}}<button class="btn btn-link btn-xs" ng-show="msg.id == 1" ng-click="reg()" ng-model="registrar">Click aqui para registrar</button></span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-4 col-lg-offset-4">
								<button type="button" ng-click="submit()" class="btn btn-primary">Enviar</button>
							</div>
						</div>
					</form>
					<form class="form-horizontal" ng-show="registrar" ng-submit="reg_estudiante()">
						<div class="form-group">
							<label class="control-label col-lg-3">Código del estudiante:</label>
							<div class="col-lg-2">
								<input type="text" class="form-control" ng-model="estudiante_id" disabled>
							</div>
							<label class="control-label col-lg-3">Código del grupo:</label>
							<div class="col-lg-2">
								<input type="text" class="form-control" disabled ng-model="grupo_id">
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-4 col-lg-offset-4">
								<button type="button" ng-click="reg_estudiante()" class="btn btn-primary">Registrar</button>
							</div>
						</div>
					</form>
				</div>
				<div class="panel-footer">
					<a href="javascript:history.back(1)" class="btn btn-link"><i class="glyphicon glyphicon-arrow-left"></i> Volver al curso</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
<script type="text/javascript">
	angular.module('app', [])
	.controller('ctrl', function($scope,$http){
		$scope.registrar = false;
		$scope.grupo_id = {{$grupo_id}};
		$scope.ocultar = true;
		$scope.reg = function(){
			$scope.registrar = true;
		};
		$scope.submit = function(){
			$http({
				method:'GET',
				url:'http://localhost/proyectos/control/public/reg_mat/{{$grupo_id}}?estudiante_id='+$scope.estudiante_id
			}).then(function(response){
				$scope.msg = response.data;
			},function(response){
				console.log(response.data);
			});
		};
		$scope.reg_estudiante = function () {
			$scope.registrar = false;
			$http({
				method:'POST',
				url:'http://localhost/proyectos/control/public/reg_est',
				data:[$scope.estudiante_id,$scope.grupo_id]
			}).then(function(response){
				$scope.msg = response.data;
			},function(response){
				console.log(response.data);
			});
		};
	});
</script>
@endsection