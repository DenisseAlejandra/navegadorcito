<?php

namespace navegadorcito\Http\Controllers;

use Illuminate\Http\Request;
use navegadorcito\InstanciaCurso;
use navegadorcito\Curso;
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
        return view('instancia')->with(["instancias" => $instancias, "cursos" => $cursos]);;
    }
    public function crearInstanciaCurso(Request $request){
        $controller = new CursoController;
        $curso = $controller->buscarCurso($request);
        $instancia = new InstanciaCurso;
        $instancia->agno = $request->agno;
        $instancia->semestre = $request->semestre;
        $instancia->curso()->associate($curso);
        $instancia->save();
        return redirect()->route('instancia');
   }
   public function mostrarInstancia(Request $request){
       $instancia = InstanciaCurso::all();
       return view('instancia')->with("instancias",$instancia);
   }
   public function eliminarInstancia(Request $request){
       $instancia_sel = $request->$instancia_sel;
       $instancias = Instancia::all();
       $datos_instancia = $instancias->find($instancia_sel);
       $datos_instancia->delete();
       return redirect()->route('instancia');
   }
   public function buscarInstancia(Request $request){
       $instancia_sel = $request->instancia_sel;
       $instancias = InstanciaCurso::all();
       $instancias_valor = $instancias->find($instancia_sel);
       return $instancias_valor;
       }
}
