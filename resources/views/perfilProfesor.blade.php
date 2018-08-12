@extends('layouts.app')

@section('content')

@csrf

	<div class="col-md-11 mx-auto p-4">
		<h2>Ficha Personal Profesor</h2>
		<div>RUT: {{$infoProfesor->rut}}</div>
		<div>Nombres: {{$infoProfesor->nombre}}</div>
		<div>Apellido Paterno: {{$infoProfesor->apellido_paterno}}</div>
		<div>Apellido Materno: {{$infoProfesor->apellido_materno}}</div>
	</div>


	<div class="col-md-11 mx-auto p-4">
		<h2>Asignaturas en Curso</h2>
		<h3>{{ date('Y')}}</h3>

		@if(sizeof($asignaturasEnCurso) > 0 )
			<ul>
				@foreach($asignaturasEnCurso as $enCurso)
                    <li><a style="text-transform: uppercase;" href="{{ route('asignaturaProfesor')}}?asig={{$enCurso->id}}" >{{$enCurso->sigla}}: {{$enCurso->nombre}}</li></a>
        @endforeach
			</ul>
		@else
			<h4>El profesor no posee asignaturas en curso</h4>
		@endif





	</div>





@endsection
