<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horarios';
    protected $fillable = ['dia','hora_inicio','hora_fin'];

    public function grupos(){
        return $this->hasMany(Grupo::class);
    }
}
