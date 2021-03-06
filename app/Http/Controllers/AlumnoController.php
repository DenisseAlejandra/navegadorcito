<?php

namespace navegadorcito\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use navegadorcito\Alumno;
use navegadorcito\User;

class AlumnoController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function alumno(){
        $alumnos = Alumno::all();
        return view('alumno')->with("alumnos", $alumnos);
    }


    public function crearUsuarioAlumno(Request $request){
        $user = new User;
        $user->name = $request->nombre;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->type = "alumno";
        $user->save();
        return $user;

    }

    public function crearAlumno(Request $request){
         $user = $this->crearUsuarioAlumno($request);
         $alumno = new Alumno;
         $alumno->rut = $request->rut;
         $alumno->user()->associate($user);
         $alumno->nombres = $request->nombre;
         $alumno->apellido_materno = $request->apellido_materno;
         $alumno->apellido_paterno = $request->apellido_paterno;
         $alumno->save();
         return redirect()->route('alumno');
    }

    public function mostrarInfo_alumno(Request $request){
        $rutAlumno = $request->rutAlumno;
        $alumnos = Alumno::all();
        $datos_alu = $alumnos->where('rut', $rutAlumno)->first();
        return $datos_alu;
    }

    public function buscarAlumno(Request $request){
        $alum_sel = $request->rut_original;
        $alumnos = Alumno::all();
        $alum_valor = $alumnos->where('rut', $alum_sel)->first();
        return $alum_valor;
    }

    public function editarInfo_alumno(Request $request){
        $rutOriginal = $request->rut_original;
        $updateArray = array('rut' => (string) $request->rut , 'nombres' => (string) $request->nombre, 'apellido_paterno' => $request->apellido_paterno, 'apellido_materno'=> $request->apellido_materno);
        Alumno::where('rut', $rutOriginal)->update($updateArray);

        $updateUser = array('name' => (string) $request->nombre);
        $alum = $this->buscarAlumno($request);

        User::where('id', $alum->user_id)->update($updateUser);
        return redirect()->route('alumno');
    }

    public function eliminarAlumno(Request $request){
        $idUser = $request->delete_select;
        Alumno::where('user_id', $idUser)->delete();
        User::where('id', $idUser)->delete();
        return redirect()->route('alumno');

    }


}
