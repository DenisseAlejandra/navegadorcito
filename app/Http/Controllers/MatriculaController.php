<?php

namespace navegadorcito\Http\Controllers;

use Illuminate\Http\Request;
use navegadorcito\InstanciaCurso;
use navegadorcito\Curso;
use navegadorcito\Alumno;
use navegadorcito\EstadoMatricula;
use navegadorcito\MatriculaInstanciaCurso;

class MatriculaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Matricula()
    {
        $instancias = InstanciaCurso::all();
        $cursos = Curso::all();
        $alumnos = Alumno::all();
        $estados = EstadoMatricula::all();
        $matriculas = MatriculaInstanciaCurso::all();
        return view('Matricula')->with(["instancias" => $instancias, "cursos" => $cursos,
                "alumnos"=>$alumnos, "estados"=>$estados, "matriculas" =>$matriculas]);
    }

    public function crearMatricula(Request $request){
        $matricula = new MatriculaInstanciaCurso;

        $instanciacon = new InstanciaCursoController;
        $instancia = $instanciacon->mostrarInfo_instancia($request);
        $matricula->instanciaCurso()->associate($instancia);

        $alumnocon= new AlumnoController;
        $alumno = $alumnocon->mostrarInfo_alumno($request);
        $matricula->alumno()->associate($alumno->rut);

        $estadocon = new EstadoMatriculaController;
        $estado = $estadocon->mostrarInfo_estado($request);
        $matricula->estadoMatricula()->associate($estado);

        $matricula->save();
        return redirect()->route('matricula');
    }
      public function modificarMatricula(Request $request){


      }
      public function eliminarMatricula(Request $request){
          $matricula_sel = $request->matricula_sel;
          $matriculas = MatriculaInstanciaCurso::all();
          $datos_matricula = $matriculas->find($matricula_sel);
          $datos_matricula->delete();
          return redirect()->route('matricula');
      }
}
