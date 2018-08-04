<?php

namespace navegadorcito;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    public function instanciaCurso()
    {
        return $this->hasMany('navegadorcito\InstanciaCurso', 'curso_id', 'id');
    }
}
