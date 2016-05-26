<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupos';
    protected $fillable = ['aula','curso_id','horario_id'];

    public function horario(){
        return $this->belongsTo(Horario::class);
    }
    
    public function curso(){
        return $this->belongsTo(Curso::class);
    }

    public function estudiantes(){
        return $this->belongsToMany(Estudiante::class);
    }
}
