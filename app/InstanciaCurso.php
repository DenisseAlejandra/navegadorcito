<?php

namespace navegadorcito;

use Illuminate\Database\Eloquent\Model;

class InstanciaCurso extends Model
{
    public function curso()
	{
	    return $this->belongsTo('navegadorcito\Curso', 'curso_id', 'id');
	}

  public function profesor()
  {
    return $this->belongsTo('navegadorcito\Profesor', 'profesor_id', 'rut');
  }

	public function matriculaInstanciaCurso()
    {
        return $this->hasMany('navegadorcito\MatriculaInstanciaCurso', 'instanciaCurso_id', 'id');
    }
}
