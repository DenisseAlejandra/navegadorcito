@extends('layouts.app')

@section('content')

@csrf

	<div class="col-md-11 mx-auto p-4">
		<h2>Ficha Personal Alumno</h2>
		<div>RUT: {{$infoAlumno->rut}}</div>
		<div>Nombres: {{$infoAlumno->nombres}}</div>
		<div>Apellido Paterno: {{$infoAlumno->apellido_paterno}}</div>
		<div>Apellido Materno: {{$infoAlumno->apellido_materno}}</div>
	</div>


	<div class="col-md-11 mx-auto p-4">
		<h2>Asignaturas en Curso</h2>
		<h3>{{ date('Y')}}</h3>

		@if(sizeof($asignaturasActuales) > 0 )
			<ul>
				@foreach($asignaturasActuales as $actuales)
                    <li><a style="text-transform: uppercase;" href="{{ route('asignaturaAlumno')}}?asig={{$actuales->id}}" >{{$actuales->sigla}}: {{$actuales->nombre}}</li></a>

                @endforeach
			</ul>
		@else
			<h4>El alumno no posee asignaturas En Curso</h4>
		@endif





	</div>



	<div class="col-md-11 mx-auto p-4">
		<h2>Asignaturas Cursadas</h2>

		@if(sizeof($asignaturasCursadas) > 0)
			hay elemntos
		@else
			<h5>El alumno no posee asignaturas Cursadas</h5>
		@endif



	</div>




@endsection
