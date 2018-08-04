@extends('layouts.app')

@section('content')

    <form action="{{ route('admin') }}">
    <!--volver-->
      <div class="col-md-4 float-right">
        <div class="col-md-4 offset-md-3">
            <button type="submit" class="btn btn-secondary" id="ir_admin" >
                {{ __('Ir a Administrador') }}
            </button>
        </div>
      </div>
    </form>

    <form action="{{ route('perfilAlumno') }}">
    <!--volver-->
      <div class="col-md-4 float-right">
        <div class="col-md-4 offset-md-3">
            <button type="submit" class="btn btn-secondary" id="ir_admin" >
                {{ __('Ir a Perfil Alumno') }}
            </button>
        </div>
      </div>
    </form>


@endsection
