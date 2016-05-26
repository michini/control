<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';

    protected $fillable = ['nombre'];

    public function matriculas(){
        return $this->hasMany(Matricula::class);
    }
}
