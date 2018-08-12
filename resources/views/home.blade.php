@extends('layouts.app')

@section('content')

    <form action="{{ route('admin') }}">
    <!--volver-->
      <div class="col-md-4 float-right">
        <div class="col-md-4 offset-md-3 float-left">
            <button type="submit" class="btn btn-secondary" id="ir_admin" >
                {{ __('Ir a Administrador') }}
            </button>
        </div>
      </div>
    </form>

    <form action="{{ route('perfilAlumno') }}">
    <!--alumno-->
      <div class="col-md-4 float-right">
        <div class="col-md-4 offset-md-3 float-right">
            <button type="submit" class="btn btn-secondary float-right" id="ir_alumno" >
                {{ __('Ir a Perfil Alumno') }}
            </button>
        </div>
      </div>
    </form>

    <form action="{{ route('perfilProfesor') }}">
    <!--profesor-->
      <div class="col-md-4 float-right">
        <div class="col-md-4 offset-md-3 float-right">
            <button type="submit" class="btn btn-secondary float-right" id="ir_profesor" >
                {{ __('Ir a Perfil Profesor') }}
            </button>
        </div>
      </div>
    </form>
@endsection
