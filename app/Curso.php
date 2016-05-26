<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';
    protected $fillable = ['nombre','docente'];

    public function grupo(){
        return $this->hasOne(Grupo::class);
    }

    public function asistencias(){
    	return $this->hasMany(Asistencia::class);
    }

    public function matriculas(){
        return $this->hasMany(Matricula::class);
    }
}
