@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
      <div class="card-header"><h2>{{ 'Asignatura :'. $curso->sigla .'  '.$curso->nombre}}</h2></div>

      <div class="card-body">

        <table>
          <tr><td>{{'Descripción: '.$curso->descripcion}}</td></tr>
          <tr><td>{{'Profesor: '.$profesor->nombre.' '.$profesor->apellido_paterno}} </td></tr>
          <tr><td>{{'Cursada en: '.$instancia->agno .' / Semestre: '. $instancia->semestre}}</td>
          <tr><td>{{'Estado: '.$estado->estado}}</td> </tr>
          <tr><td>{{'Nota Final: (aun no disponible)'}} </td></tr>
        </table>
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
