<?php

namespace navegadorcito\Http\Controllers;

use Illuminate\Http\Request;
use navegadorcito\InstanciaCurso;
use navegadorcito\Curso;
use navegadorcito\Profesor;
use navegadorcito\Http\Controllers\CursoController;

class InstanciaCursoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function instancia()
    {
        $instancias = InstanciaCurso::all();
        $cursos = Curso::all();
        $profesores = Profesor::all();
        return view('instancia')->with(["instancias" => $instancias,
              "cursos" => $cursos, "profesores" => $profesores]);;
    }

    public function crearInstanciaCurso(Request $request){
        $cursoController = new CursoController;
        $curso = $cursoController->mostrarInfo_curso($request);
        $profesorController = new ProfesorController;
        $profesor = $profesorController->mostrarInfo_profesor($request);

        $instancia = new InstanciaCurso;
        $instancia->agno = $request->agno;
        $instancia->semestre = $request->semestre;
        $instancia->curso()->associate($curso);
        $instancia->profesor()->associate($profesor);
        $instancia->save();
        return redirect()->route('instancia');
   }

   public function eliminarInstancia(Request $request){
       $instancia_sel = $request->$instancia_sel;
       $instancias = Instancia::all();
       $datos_instancia = $instancias->find($instancia_sel);
       $datos_instancia->delete();
       return redirect()->route('instancia');
   }
   public function mostrarInfo_instancia(Request $request){
       $idInstancia = $request->idInstancia;
       $instancias = InstanciaCurso::all();
       $datos_instancia = $cursos->where('id', $idCurso)->first();
       return $datos_curso;
   }
}
