<?php

namespace navegadorcito;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{

     public function user()
    {
       return $this->belongsTo('navegadorcito\User', 'user_id' , 'id');
    }

    public function instanciaCurso()
    {
        return $this->hasMany('navegadorcito\InstanciaCurso', 'profesor_id', 'rut');
    }
}
