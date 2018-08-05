<?php

namespace navegadorcito\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use navegadorcito\Profesor;
use navegadorcito\User;

class ProfesorController extends Controller{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function profesor(Profesor $profesor)
    {
        $profesores = Profesor::all();
            return view('profesor');
            //->with(["profesores" => $profesores , "profesorInfo" => $profesor]);
    }

    public function crearUsuarioProfesor(Request $request){
        $user = new User;
        $user->name = $request->nombre;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->type = "profesor";
        $user->save();
        return $user;
    }

    public function crearProfesor(Request $request){
         $user = $this->crearUsuarioProfesor($request);
         $profesor = new Profesor;
         $profesor->rut = $request->rut;
         $profesor->user()->associate($user);
         $profesor->nombres = $request->nombre;
         $profesor->apellido_materno = $request->apellido_materno;
         $profesor->apellido_paterno = $request->apellido_paterno;
         $profesor->save();
         return redirect()->route('profesor');
    }

    public function mostrarInfo_profesor(Request $request){
        $profesor_sel = $request->profesor_sel_edit;
        $profesores = Profesor::all();
        $datos_prof = $profesores->where('rut', $profesor_sel)->first();
        return redirect()->route('profesor')->with(["profesorInfo" =>$datos_prof]);
    }

    public function eliminarProfesor(Request $request){
      $user_sel = $request->profesor_sel_elim;
      $users = User::all();
      $datos_usuario = $users->find($user_sel);
      $datos_usuario->delete();
      return redirect()->route('profesor');
    }

    public function buscarProfesor(Request $request){
            $prof_selo = $request->alumno_sel;
            $profesores = Profesor::all();
            $datos_prof = $profesores->where('rut', $prof_selo)->first();
            return $datos_prof;
        }


}
