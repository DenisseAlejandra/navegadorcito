@extends('layouts.app')

@section('content')
<!-- Crear Estado Matricula  -->
<div class="card-body col-md-12">
    <div class="float-left col-md-4">
        <h2>Crear Estado de Matricula</h2>
        <form id="form-estadoMatricula" method="POST" action="{{ route('crear_estadoMatricula') }}#form-estadoMatricula" >
            @csrf

                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="estado" type="text" class="form-control" name="estado" placeholder="Ingrese nombre del estado" required>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-4 offset-md-3">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Crear Estado Matricula') }}
                        </button>
                    </div>
                </div>
            </form>
    </div>
    <!-- Editar estado matricula-->
    <div class="col-md-4 float-left">
        <h2>Editar Estado de Matricula</h2>
        <form method="POST" action="{{ route('mostrarInfo_estado') }}" >
        @csrf
            <div class="form-group row col-md-12">
                <select class="form-control" name="estado_sel" id="estado_sel" onchange="enviarForm()" >
                    @foreach($estados as $estado)
                        <option value="{{$estado->id}}" >{{$estado->estado}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group row mb-0">
                    <div class="col-md-4 offset-md-3">
                        <button type="submit" class="btn btn-primary" id="InputSelectEstado" >
                            {{ __('Crear Curso') }}
                        </button>
                    </div>
                </div>
        </form>

    </div>
    <!-- Eliminar estado matricula-->
    <div class="col-md-4 float-left">
        <h2>Eliminar Estado de Matricula</h2>
        <form method="POST" action="{{ route('eliminar_estado') }}" >
        @csrf
            <div class="form-group row col-md-12">
                <select class="form-control" name="estado_sel" id="estado_sel" >
                    @foreach($estados as $estado)
                        <option value="{{$estado->id}}" >{{$estado->estado}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group row mb-0">
                    <div class="col-md-4 offset-md-3">
                        <button type="submit" class="btn btn-danger" id="InputSelectEstado" >
                            {{ __('Eliminar Estado') }}
                        </button>
                    </div>
                </div>
        </form>
    </div>

    <!--volver-->
      <form action="{{ route('admin') }}">
      <div class="col-md-4 float-right">
        <div class="col-md-4 offset-md-3">
            <button type="submit" class="btn btn-secondary" id="ir_admin" >
                {{ __('Volver') }}
            </button>
        </div>
      </div>
    </form>

@endsection
