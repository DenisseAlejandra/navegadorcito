<?php

namespace navegadorcito\Http\Controllers;

use Illuminate\Http\Request;
use navegadorcito\Curso;
use navegadorcito\InstanciaCurso;
use navegadorcito\EstadoMatricula;
use navegadorcito\MatriculaInstanciaCurso;
use navegadorcito\Profesor;

class AsignaturaAlumnoController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function asignaturaAlumno(){
      $user = Auth::user();
      $alumno = Alumno::where('id_user', $user->id )->first();
      $cursos = $alumno->matriculaInstanciaCurso;

      return view('asignaturaAlumno')
            ->with('alumno',$alumno)
            ->with('cursos',$cursos);
    }

    public function instanciaCurso($curso_id)
      {
        $matricula = MatriculaInstanciaCurso::where('instanciaCurso_id', $curso_id)->first();
        $instancia = InstanciaCurso::where('curso_id', $curso_id)->first();
        $curso = Curso::where('id', $curso_id)->first();
        $estado = EstadoMatricula::where('id', $matricula->estadoMatricula_id)->first();
        $profesor = Profesor::where('rut', $instancia->profesor_id)->first();

        return view('asignaturaAlumno')->with('matricula',$matricula)
                                      ->with('instancia',$instancia)
                                      ->with('estado',$estado)
                                      ->with('profesor',$profesor)
                                      ->with('curso',$curso);
      }



}
