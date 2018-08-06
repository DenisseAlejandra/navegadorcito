<?php

namespace navegadorcito\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use navegadorcito\Profesor;
use navegadorcito\User;

class ProfesorController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function profesor()
  {
      $profesores = Profesor::all();
      return view('profesor')->with("profesores", $profesores);
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
         $profesor->nombre = $request->nombre;
         $profesor->apellido_materno = $request->apellido_materno;
         $profesor->apellido_paterno = $request->apellido_paterno;
         $profesor->save();
         return redirect()->route('profesor');
    }

    public function eliminarProfesor(Request $request){
      $user_sel = $request->delete_select;
      $users = User::all();
      $datos_usuario = $users->find($user_sel);
      $datos_usuario->delete();
      return redirect()->route('profesor');
    }

    public function mostrarInfo_profesor(Request $request){
        $rutProfesor = $request->rutProfesor;
        $profesores = Profesor::all();
        $datos_prof = $profesores->where('rut', $rutProfesor)->first();

        return $datos_prof;
    }

    public function buscarId(Request $request){
      $rut = $request->rut_original;
      $profesores = Profesor::all();
      $prof = $profesores->where('rut', $rut)->first();
      return $prof;
    }

    public function editarProfesor(Request $request){
        $rutOriginal = $request->rut_original;
        $updateProfesor = array('rut' => (string) $request->rut, 'nombre' => (string) $request->nombre, 'apellido_paterno' => $request->apellido_paterno, 'apellido_materno'=> $request->apellido_materno);
        Profesor::where('rut', $rutOriginal)->update($updateProfesor);

        $updateUser = array('name' => (string) $request->nombre);
        $prof = $this->buscarId($request);
        User::where('id', $prof->user_id)->update($updateUser);
        return redirect()->route('profesor');
    }

}
