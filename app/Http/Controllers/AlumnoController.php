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


    public function editarInfo_alumno(Request $request){
        $rutOriginal = $request->rut_original;

        $alumnocon= new AlumnoController;
        $alumno = $alumnocon->buscarAlumno($rutOriginal);
        $id= $alumno->user_id;
        $updateArray = array('rut' => (string) $request->rut , 'nombres' => (string) $request->nombre, 'apellido_paterno' => $request->apellido_paterno, 'apellido_materno'=> $request->apellido_materno);
        $updateUser= array('name' =>(string) $request->nombre);
        Alumno::where('rut', $rutOriginal)->update($updateArray);
        User::where('id' , $id)->update($updateUser);
        return redirect()->route('alumno');

    }

    public function buscarAlumno(String $rut){
        //$alum_sel = $request->alumn_sel;

        $alumnos = Alumno::all();
        $datos_alu = $alumnos->where('rut', $rut)->first();
        return $datos_alu;
    }

    public function eliminarAlumno(Request $request){
        $idUser = $request->delete_select;
        Alumno::where('user_id', $idUser)->delete();
        User::where('id', $idUser)->delete();
        return redirect()->route('alumno');

    }

}
