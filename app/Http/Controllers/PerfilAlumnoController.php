<?php

namespace navegadorcito\Http\Controllers;

use Illuminate\Http\Request;
use navegadorcito\Alumno;
use navegadorcito\User;

class PerfilAlumnoController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function perfilAlumno(){
        
        return view('perfilAlumno');    
    }

}
