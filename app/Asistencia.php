<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table = 'asistencias';
    protected $fillable = ['fecha','presencia','num_faltas','estudiante_id','curso_id'];
    
    public function estudiante(){
        return $this->belongsTo(Estudiante::class);
    }

    public function curso(){
    	return $this->belongsTo(Curso::class);
    }
}
