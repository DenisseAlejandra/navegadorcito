@extends('layouts.app')

@section('content')

@csrf

	<div class="col-md-11 mx-auto p-4">
		<div class="card-header">	<h2>Ficha Personal Profesor</h2></div>
		<div class="card-body">
			<div>RUT: {{$infoProfesor->rut}}</div>
			<div>Nombres: {{$infoProfesor->nombre}}</div>
			<div>Apellido Paterno: {{$infoProfesor->apellido_paterno}}</div>
			<div>Apellido Materno: {{$infoProfesor->apellido_materno}}</div>
		</div>
	</div>

	<div class="col-md-11 mx-auto p-4">
		<div class="card-header"><h2>Asignaturas en Curso</h2></div>
		<div class="card-body">
				<h3>{{ date('Y')}}</h3>
				@foreach($instancias as $instancia)
					<h4>{{ 'Semestre '.$instancia->semestre }}</h4>
					@foreach($cursos as $curso)
						@if($curso->id == $instancia->curso_id)
							<a style="text-transform: uppercase;" href="{{ route('asignaturaProfesor',[$curso->id] )}}" >
								{{$curso->sigla}}: {{$curso->nombre}}
							</a>
						@endif
					@endforeach
				@endforeach
		</div>
	</div>





	</div>





@endsection
