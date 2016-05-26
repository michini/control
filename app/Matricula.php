<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table = 'matriculas';
    protected $fillable = ['estudiante_id','estado_id','curso_id'];

    public function estado(){
        return $this->belongsTo(Estado::class);
    }

    public function estudiante(){
        return $this->belongsTo(Estudiante::class);
    }

    public function curso(){
        return $this->belongsTo(Curso::class);
    }
}
