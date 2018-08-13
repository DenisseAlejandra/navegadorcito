@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
      <div class="card-header"><h2>{{ 'Ficha Personal Alumno'}}</h2></div>

      <div class="card-body">

        <table>
          <tr><td>{{'Rut: '.$alumno->rut}}</td></tr>
          <tr><td>{{'Nombres: '.$alumno->nombres}} </td></tr>
          <tr><td>{{'Apellido Paterno: '.$alumno->apellido_paterno}}</td>
          <tr><td>{{'Apellido Materno: '.$alumno->apellido_materno}}</td> </tr>
        </table>
      </div>

      <div class="card-header"><h2>Asignaturas En Curso</h2></div>
  		<div class="card-body">
  			@if(sizeof($encursos) > 0)
  					@foreach($encursos as $encurso)
              @foreach($instancias as $instancia)
                  @if($instancia->id == $encurso->instanciaCurso_id)
                      <h3>{{ 'Año: '.$instancia->agno}}</h3>
                      <h4>{{ '   Semestre: '.$instancia->semestre}}</h4>

                      @foreach($cursos as $curso)
                        @if($curso->id == $encurso->instanciaCurso_id)
                          {{'* '. $curso->sigla.' - '.$curso->nombre }}
                        @endif
                      @endforeach
                  @endif
              @endforeach
  					@endforeach
  			@else
  				<h5>El alumno no posee asignaturas En curso</h5>
  			@endif
  	</div>


  		<div class="card-header"><h2>Asignaturas Cursadas</h2></div>
  		<div class="card-body">
  			@if(sizeof($cursadas) > 0)
            @foreach($cursadas as $cursada)
              @foreach($instancias as $instancia)
                  @if($instancia->id == $cursada->instanciaCurso_id)
                  <h3>{{ 'Año: '.$instancia->agno}}</h3>
                  <h4>{{ '   Semestre: '.$instancia->semestre}}</h4>
                      @foreach($cursos as $curso)
                        @if($curso->id == $cursada->instanciaCurso_id)
                          {{'* '. $curso->sigla.' - '.$curso->nombre }}
                        @endif
                      @endforeach
                  @endif
              @endforeach
            @endforeach
  			@else
  				<h5>El alumno no posee asignaturas Cursadas</h5>
  			@endif
  	</div>



    </div>

    <!--volver-->
      <form action="{{ route('perfilProfesor') }}">
      <div class="col-md-11 float-left">
        <div class="col-md-4 offset-md-3 float-right">
            <button type="submit" class="btn btn-secondary float-right" id="ir_profesor" >
                {{ __('Volver al Profesor') }}
            </button>
        </div>
      </div>
    </form>
</div>
@endsection
