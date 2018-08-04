<?php

namespace navegadorcito\Http\Controllers;

use Illuminate\Http\Request;
use navegadorcito\EstadoMatricula;

class EstadoMatriculaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function estado()
    {
        $estados = EstadoMatricula::all();
        return view('estado')->with(["estados" => $estados]);;
    }
    public function crearEstadoMatricula(Request $request){
            $estado = new EstadoMatricula;
            $estado->estado = $request->estado;
            $estado->save();

            return redirect()->route('estado');
    }
    public function mostrarInfo_estado(Request $request){
        $estado_sel = $request->estado_sel;
        $estados = EstadoMatricula::all();
        $datos_estado = $estados->find($estado_sel);
        return redirect()->route('estado')->with($datos_estado);
    }
    public function eliminarEstado(Request $request){
        $estado_sel = $request->estado_sel;
        $estado = EstadoMatricula::all();
        $datos_estado = $estado->find($estado_sel);
        $datos_estado->delete();
        return redirect()->route('estado');
    }
    public function buscarEstado(Request $request){
            $esta_sel = $request->est_sel;
            $estados = EstadoMatricula::all();
            $estado_valor = $estados->find($esta_sel);
            return $estado_valor;
    }
}
