<?php

namespace navegadorcito\Http\Controllers;

use Illuminate\Http\Request;
use navegadorcito\Alumno;
use navegadorcito\Curso;

class AdminController extends Controller{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin(){
        $alumnos = Alumno::all();
        $cursos = Curso::all(); 
        return view('admin')->with(["alumnos" => $alumnos, "cursos" => $cursos]);
    }



}