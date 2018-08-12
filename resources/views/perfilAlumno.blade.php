@extends('layouts.app')

@section('content')

@csrf

	<div class="col-md-11 mx-auto p-4">
		<div class="card-header"><h2>Ficha Personal Alumno</h2></div>
		<div class="card-body">
				<div>RUT: {{$infoAlumno->rut}}</div>
				<div>Nombres: {{$infoAlumno->nombres}}</div>
				<div>Apellido Paterno: {{$infoAlumno->apellido_paterno}}</div>
				<div>Apellido Materno: {{$infoAlumno->apellido_materno}}</div>
		</div>
	</div>


	<div class="col-md-11 mx-auto p-4">
		<div class="card-header"><h2>Asignaturas en Curso</h2></div>
		<div class="card-body">
			<h3>{{ date('Y')}}</h3>

			@if(sizeof($asignaturasActuales) > 0 )
				<ul>
					@foreach($asignaturasActuales as $actuales
							<li>
								<a style="text-transform: uppercase;" href="{{ route('asignaturaAlumno',[$actuales->id] )}}" >
									{{$actuales->sigla}}: {{$actuales->nombre}}
								</a>
							</li>
	        @endforeach
				</ul>
			@else
				<h4>El alumno no posee asignaturas En Curso</h4>
			@endif
		</div>
	</div>


	<div class="col-md-11 mx-auto p-4">
			<div class="card-header"><h2>Asignaturas Cursadas</h2></div>
			<div class="card-body">
				@if(sizeof($asignaturasCursadas) > 0)
					hay elemntos
				@else
					<h5>El alumno no posee asignaturas Cursadas</h5>
				@endif
		</div>
	</div>




@endsection
