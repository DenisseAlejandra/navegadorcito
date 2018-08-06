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

    public function eliminarCurso(Request $request){
        $curso_sel = $request->curso_sel;
        $cursos = Curso::all();
        $datos_curso = $cursos->find($curso_sel);
        $datos_curso->delete();
        return redirect()->route('curso');
    }

    public function mostrarInfo_curso(Request $request){
        $idCurso = $request->idCurso;
        $cursos = Curso::all();
        $datos_curso = $cursos->where('id', $idCurso)->first();
        return $datos_curso;
    }
    public function editarCurso(Request $request){
        $idCurso = $request->id_curso;
        $updateCurso = array('sigla' => (string) $request->sigla, 'nombre' => (string) $request->nombre, 'descripcion' => $request->descripcion);
        Curso::where('id', $idCurso)->update($updateCurso);
        return redirect()->route('curso');
    }

}
