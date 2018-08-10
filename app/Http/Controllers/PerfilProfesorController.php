<?php

namespace navegadorcito\Http\Controllers;

use Illuminate\Http\Request;

class PerfilProfesorController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }

  public function perfilProfesor(){
    if (Auth::check()){
      $userId = Auth::getUser()->id;
      $infoProfesor = Profesor::where('user_id', $userId)->first();
      $asignaturasEnCurso = $this->asignaturasActuales((String)$infoAlumno['rut']);
    //  $asignaturasCursadas = $this->asignaturasCursadas((String)$infoAlumno['rut']);

      return view('perfilProfesor')->with([ "infoProfesor" => $infoProfesor, "asignaturasEnCurso" => $asignaturasEnCurso , "asignaturasDictadas" => $asignaturasDictadas]);
     }
  }

  public function asignaturasEnCurso(String $rut){
    $todes = InstanciaCurso::join('profesors','instancia_cursos.profesorId','=','profesors.rut')
                           ->join('cursos', 'instancia_cursos.curso_id' , '=' , 'cursos.id')
                           ->join('matricula_instancia_cursos','instancia_curso.id','=','matricula_instancia_cursos.instanciaCurso_id')
                           ->select('profesors.rut','instancia_cursos.agno','instancia_cursos.semestre','cursos.sigla','cursos.nombre','cursos.id')
                           ->get();

    $actuales = $todes->where('profesor_id', $rut);

    return $actuales;
  }
}
