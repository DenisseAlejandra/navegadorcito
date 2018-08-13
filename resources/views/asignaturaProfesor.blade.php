@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
      <div class="card-header"><h2>{{ 'Asignatura: '. $curso->sigla .'  '.$curso->nombre}}</h2></div>

      <div class="card-body">

        <table>
          <tr><td>{{'Descripción: '.$curso->descripcion}}</td></tr>
          <tr><td>{{'Dictada en: '.$instancia->agno .' / Semestre: '. $instancia->semestre}}</td>
          <tr><td>{{'Estado: '.$estado->estado}}</td> </tr>
        </table>
      </div>

      <div class="card-header"><h2>{{ 'Alumnos Matriculados'}}</h2></div>

      <div class="card-body">

        <table class="table table-dark">
          <thead>
              <th>Rut</th>
              <th>Nombres</th>
              <th>Apellido Paterno</th>
              <th>Apellido materno</th>
              <th>Ficha</th>
          </thead>
          <tbody>
            	@foreach($alumnos as $alumno)
                <tr>
                  <td>{{$alumno->rut}}</td>
                  <td>{{$alumno->nombres}}</td>
                  <td>{{$alumno->apellido_paterno}}</td>
                  <td>{{$alumno->apellido_materno}}</td>
                  <td><a style="text-transform: uppercase;" href="{{ route('fichaAlumno',[$alumno->rut] )}}" >
      							{{'Ver Ficha'}}
      						</a></td>
                </tr>

              @endforeach
          </tbody>

        </table>
      </div>
    </div>

    </div>

    <!--volver-->
      <form action="{{ route('perfilAlumno') }}">
      <div class="col-md-11 float-left">
        <div class="col-md-4 offset-md-3 float-right">
            <button type="submit" class="btn btn-secondary float-right" id="ir_alumno" >
                {{ __('Volver al Alumno') }}
            </button>
        </div>
      </div>
    </form>
</div>
@endsection
