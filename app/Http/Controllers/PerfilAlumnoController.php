<?php

namespace navegadorcito\Http\Controllers;

use Illuminate\Http\Request;
use navegadorcito\Alumno;
use navegadorcito\User;
use navegadorcito\Curso;
use navegadorcito\MatriculaInstanciaCurso;
use Auth;

class PerfilAlumnoController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function perfilAlumno(){
    	if (Auth::check()){
		    $userId = Auth::getUser()->id;

		    $infoAlumno = Alumno::where('user_id', $userId)->first();
		    $asignaturasActuales = $this->asignaturasActuales((String)$infoAlumno['rut']);
		    $asignaturasCursadas = $this->asignaturasCursadas((String)$infoAlumno['rut']);

		    return view('perfilAlumno')
            ->with([ "infoAlumno" => $infoAlumno, "asignaturasActuales" => $asignaturasActuales , "asignaturasCursadas" => $asignaturasCursadas]);
		  }

      return view('perfilAlumno');
    }

    public function asignaturasActuales(String $rut){
    	$todas = MatriculaInstanciaCurso::join('instancia_cursos','matricula_instancia_cursos.instanciaCurso_id' , '=', 'instancia_cursos.id')
          ->join('cursos', 'instancia_cursos.curso_id' , '=' , 'cursos.id')
          ->select('matricula_instancia_cursos.alumno_id','instancia_cursos.agno','instancia_cursos.semestre', 'matricula_instancia_cursos.estadoMatricula_id', 'cursos.sigla', 'cursos.nombre', 'cursos.id' )
          ->get();
    	$actuales = $todas->where('alumno_id' , $rut)->where('estadoMatricula_id' , 1);
    	return $actuales;
    }

    public function asignaturasCursadas(String $rut){
    	$todas = MatriculaInstanciaCurso::join('instancia_cursos','matricula_instancia_cursos.instanciaCurso_id' , '=', 'instancia_cursos.id')
          ->join('cursos', 'instancia_cursos.curso_id' , '=' , 'cursos.id')
          ->select('matricula_instancia_cursos.alumno_id','instancia_cursos.agno','instancia_cursos.semestre', 'matricula_instancia_cursos.estadoMatricula_id', 'cursos.sigla', 'cursos.nombre', 'cursos.id' )
          ->get();

    	$cursadas = $todas->where('alumno_id' , $rut)->where('estadoMatricula_id', '<>' , 1);
    	return $cursadas;
    }

}
