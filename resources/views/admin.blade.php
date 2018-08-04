@extends('layouts.app')

@section('content')

<div class="card-body col-md-12">
    <!--Mantenedor Alumno -->
    <div class="float-left col-md-4">
      <h2>Mantenedor Alumno</h2>
      <div class="form-group row mb-0">
          <div class="col-md-4 offset-md-3">
              <button type="submit" class="btn btn-primary" value="enviar" onclick="location.href = '{{ route('alumno') }}'"/>
                  {{ __('Alumno') }}
              </button>

          </div>
      </div>
    </div>
    <!--Mantenedor Curso -->
    <div class="float-left col-md-4">
      <h2>Mantenedor Curso</h2>
      <div class="form-group row mb-0">
          <div class="col-md-4 offset-md-3">
              <button type="submit" class="btn btn-primary" value="enviar" onclick="location.href = '{{ route('curso') }}'"/>
                  {{ __('Curso') }}
              </button>

          </div>
      </div>
    </div>
    <!--Mantenedor Estado Matricula -->
    <div class="float-left col-md-4">
      <h2>Mantenedor Estado Matricula</h2>
      <div class="form-group row mb-0">
          <div class="col-md-4 offset-md-3">
              <button type="submit" class="btn btn-primary" value="enviar" onclick="location.href = '{{ route('estado') }}'"/>
                  {{ __('Estado Matricula') }}
              </button>

          </div>
      </div>
    </div>
</div>

  <div class="card-body col-md-12">
    <!--Mantenedor Instancia Curso -->
    <div class="float-left col-md-4">
      <h2>Mantenedor Instancia Curso</h2>
      <div class="form-group row mb-0">
          <div class="col-md-4 offset-md-3">
              <button type="submit" class="btn btn-primary" value="enviar" onclick="location.href = '{{ route('instancia') }}'"/>
                  {{ __('Instancia Curso') }}
              </button>

          </div>
      </div>
    </div>
    <!--Mantenedor Matricula Instancia Curso -->
    <div class="float-left col-md-4">
      <h2>Mantenedor Matricula Instancia Curso</h2>
      <div class="form-group row mb-0">
          <div class="col-md-4 offset-md-3">
              <button type="submit" class="btn btn-primary" value="enviar" onclick="location.href = '{{ route('matricula') }}'"/>
                  {{ __('Matricula Instancia Curso') }}
              </button>

          </div>
      </div>
    </div>
</div>


@endsection
