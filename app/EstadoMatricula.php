<?php

namespace navegadorcito;

use Illuminate\Database\Eloquent\Model;

class EstadoMatricula extends Model
{
    public function matriculaInstanciaCurso()
    {
        return $this->hasMany('navegadorcito\MatriculaInstanciaCurso', 'estadoMatricula_id', 'id');
    }
}
