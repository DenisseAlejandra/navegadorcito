@extends('layouts.app')

@section('content')
<div class="card-body col-md-12">

    <!-- Formulario agregar alumno -->
    <div class="float-left col-md-4">
        <h2>Crear Profesor</h2>
        <form method="POST" action="{{ route('crear_profesor') }}" >
            @csrf
                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="rut" type="text" class="form-control" name="rut" required autofocus placeholder="Ingrese rut">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="nombre" type="text" class="form-control" name="nombre" placeholder="Ingrese nombre" required>
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-12">
                        <input id="materno" type="text" class="form-control" name="apellido_materno" placeholder="Apellido Materno" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="paterno" type="text" class="form-control" name="apellido_paterno" placeholder="Apellido Paterno" required>
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-md-12">
                        <input id="email" type="text" class="form-control" name="email" placeholder="Ingrese email" required>
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Ingrese contraseña" required>
                    </div>
                </div>

                <div class="form-group row col-md-12">
                        <button type="submit" class="btn btn-primary">Crear Profesor</button>
                </div>
        </form>
    </div>
    <!-- Fin formulario agregar alumno -->



</div>


<!--volver-->
  <form action="{{ route('admin') }}">
  <div class="col-md-11 float-left">
    <div class="col-md-4 offset-md-3 float-right">
        <button type="submit" class="btn btn-secondary float-right" id="ir_admin" >
            {{ __('Volver al Menú') }}
        </button>
    </div>
  </div>
</form>



@endsection
