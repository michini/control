var app = angular.module('app',[]);
app.controller('myCtrl',function ($scope,$http) {
    $scope.click = function (estudiante_id,presencia,curso_id) {

        $http({
            method:'POST',
            url:'http://localhost/proyectos/control/public/asistencia',
            data:[presencia,estudiante_id,curso_id]
        }).then(function(response){console.log(response.data)},
            function(response){console.log(response.statusText)});
    }
});
