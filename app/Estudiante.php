<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table ='estudiantes';
    protected $fillable = ['codigo','mombres','seccion'];

    public function grupos(){
        return $this->belongsToMany(Grupo::class);
    }

    public function asistencias(){
        return $this->hasMany(Asistencia::class);
    }

    public function matriculas(){
        return $this->hasMany(Matricula::class);
    }
}
