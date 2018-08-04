<?php

namespace navegadorcito\Http\Controllers;

use Illuminate\Http\Request;
use navegadorcito\Curso;

class CursoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function curso()
    {
        $cursos = Curso::all();
        return view('curso')->with(["cursos" => $cursos]);;
    }

    public function crearCurso(Request $request){
        $curso = new Curso;
        $curso->nombre = $request->nombre;
        $curso->sigla = $request->sigla;
        $curso->descripcion = $request->descripcion;
        $curso->save();

        return redirect()->route('curso');
    }

    public function buscarCurso(Request $request){
        $cur_sel = $request->curso_sel;
        $cursos = Curso::all();
        $curso_sigla = $cursos->find($cur_sel);
        return $curso_sigla;
    }

    public function mostrarInfo_curso(Request $request){
        $curso_sel = $request->sigla;
        $cursos = Curso::all();
        $datos_curso = $cursos->where('sigla',$curso_sel);
        return $datos_curso;
    }

    public function editarInfo_curso(Request $request){
        $siglaOriginal = $request->sigla_original;
        
        $updateArray = array('sigla' => (string) $request->sigla , 'nombre' => (string) $request->nombre, 'descripcion' => $request->descripcion);
        
        Curso::where('sigla', $siglaOriginal)->update($updateArray);
        
        return redirect()->route('curso');
    }

    public function eliminarCurso(Request $request){
        $curso_sel = $request->curso_sel;
        $cursos = Curso::all();
        $datos_curso = $cursos->find($curso_sel);
        $datos_curso->delete();
        return redirect()->route('curso');
    }


}
