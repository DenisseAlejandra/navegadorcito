<?php

namespace navegadorcito\Http\Controllers;

use Illuminate\Http\Request;
use navegadorcito\Profesor;
use navegadorcito\InstanciaCurso;
use navegadorcito\Curso;
use navegadorcito\MatriculaInstanciaCurso;
use navegadorcito\EstadoMatricula;
use navegadorcito\Alumno;
use Auth;

class PerfilProfesorController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }

  public function perfilProfesor(){
    if (Auth::check()){
      $userId = Auth::getUser()->id;
      $infoProfesor = Profesor::where('user_id', $userId)->first();
      $instancias = $infoProfesor->instanciaCurso;
      $cursos = Curso::all();
      return view('perfilProfesor')
           ->with('infoProfesor',$infoProfesor)
           ->with('instancias',$instancias)
           ->with('cursos',$cursos);
    }

  }

  public function asignaturaProfesor($curso_id)
    {
      $matricula = MatriculaInstanciaCurso::where('instanciaCurso_id', $curso_id)->first();
      $instancia = InstanciaCurso::where('curso_id', $curso_id)->first();
      $curso = Curso::where('id', $curso_id)->first();
      $estado = EstadoMatricula::where('id', $matricula->estadoMatricula_id)->first();
      $alumnos = Alumno::where('rut', $matricula->alumno_id)->get();

      //dd($alumnos);
      return view('asignaturaProfesor')->with('matricula',$matricula)
                                    ->with('instancia',$instancia)
                                    ->with('estado',$estado)
                                    ->with('alumnos',$alumnos)
                                    ->with('curso',$curso);
    }



    public function fichaAlumno($rut)
  {
    $alumno = Alumno::where('rut',$rut)->first();
    $todas = $alumno->matriculaInstanciaCurso;
    $encursos = $todas->where('estadoMatricula_id', 1);
    $cursadas = $todas->where('estadoMatricula_id', '!=', 1);
    $cursos = Curso::all();
    $instancias = InstanciaCurso::all();
    //  dd($cursos);
    return view('fichaAlumno')
        ->with('encursos',$encursos)
        ->with('cursadas',$cursadas)
        ->with('cursos',$cursos)
        ->with('instancias',$instancias)
        ->with('alumno',$alumno);
  }


}
