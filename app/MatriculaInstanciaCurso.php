<?php

namespace navegadorcito;

use Illuminate\Database\Eloquent\Model;

class MatriculaInstanciaCurso extends Model
{
     public function alumno()
	{
	    return $this->belongsTo('navegadorcito\Alumno', 'alumno_id', 'rut');
	}
	 public function InstanciaCurso()
	{
	    return $this->belongsTo('navegadorcito\InstanciaCurso', 'instanciaCurso_id', 'id');
	}
	 public function estadoMatricula()
	{
	    return $this->belongsTo('navegadorcito\EstadoMatricula', 'estadoMatricula_id', 'id');
	}
}
