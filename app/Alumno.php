<?php

namespace navegadorcito;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    
     public function user()
    {
       return $this->belongsTo('navegadorcito\User', 'user_id' , 'id');
    }

    public function matriculaInstanciaCurso()
    {
        return $this->hasMany('navegadorcito\MatriculaInstanciaCurso', 'alumno_id', 'rut');
    }
}
