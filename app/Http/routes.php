<?php

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/inicio', 'HomeController@index')->name('inicio');
Route::group(['middleware'=>'auth'],function(){
    Route::resource('asistencia','AsistenciaController');
    Route::resource('curso','CursoController');
    Route::resource('estudiante','EstudianteController');
    Route::resource('grupo','GrupoController');
    Route::resource('matricula','MatriculaController');
    Route::get('registro/{id}',['uses'=>'CursoController@registro'])->name('registro');
    Route::get('inasistencias',['uses'=>'AsistenciaController@inasistencias'])->name('inasistencias');
    Route::get('matricular',['uses'=>'MatriculaController@matricular_estudiante'])->name('matricular');
    Route::get('reg_mat/{id}',['uses'=>'MatriculaController@reg_mat'])->name('reg_mat');
    Route::post('reg_est',['uses'=>'GrupoController@registrar_estudiante'])->name('reg_est');
});

Route::get('data',function(){
	//insertar estudiantes del curso de estadistica II
	for ($i=1; $i <=697 ; $i++) {
		DB::table('estudiante_grupo')->insert([
			'grupo_id'=>18,
			'estudiante_id'=>$i
		]);
	}

	//Insertar estudiantes del curso de geologia general
    /*for ($i = 107; $i <= 291 ;$i++){
        DB::table('estudiante_grupo')->insert([
            'grupo_id'=>13,
            'estudiante_id'=>$i
        ]);
    }*/

    //Insertar estudiantes del curso de MECANICA VECTORIAL
    /*for ($i = 872; $i <= 996 ;$i++){
        DB::table('estudiante_grupo')->where([
            'grupo_id'=>20
        ])->delete();
    }
    for ($i = 1024; $i <= 1332 ;$i++){
        DB::table('estudiante_grupo')->insert([
            'grupo_id'=>20,
            'estudiante_id'=>$i
        ]);
    }*/

    //Insertar estudiantes del curso de FISICA arzapalo
    /*for ($i = 617; $i <= 772 ;$i++){
        DB::table('estudiante_grupo')->insert([
            'grupo_id'=>16,
            'estudiante_id'=>$i
        ]);
    }*/

    //eliminar registros
    /*for ($i = 617; $i <= 772 ;$i++){
        DB::table('estudiante_grupo')->where([
            'grupo_id'=>19
        ])->delete();
    }*/

    //Insertar matematica i
    /*for ($i = 999; $i <= 1040 ;$i++){
        DB::table('estudiante_grupo')->insert([
            'grupo_id'=>21,
            'estudiante_id'=>$i
        ]);
    }*/
	return "listo";
});