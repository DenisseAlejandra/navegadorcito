@extends('layouts.app')

@section('content')


<div class="card-body col-md-12">
    <div class="float-left col-md-4">
      <h2>Crear Instancia de Curso</h2>
      <form id="form-instanciaCurso" method="POST" action="{{ route('crear_instanciaCurso') }}#form-instanciaCurso" >
          @csrf
              <div class="form-group row">
                  <select class="form-control" name="curso_sel" id="curso_sel">
                      @foreach($cursos as $curso)
                          <option value="{{$curso->id}}" >{{$curso->nombre}}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group row">
                  <div class="col-md-12">
                      <input id="agno" type="text" class="form-control" name="agno" placeholder="Ingrese año" required>
                  </div>
              </div>

              <div class="form-group row">
                  <div class="col-md-12">
                      <input id="semestre" type="text" class="form-control" name="semestre" placeholder="Ingrese semestre" required>
                  </div>
              </div>

              <div class="form-group row mb-0">
                  <div class="col-md-4 offset-md-3">
                      <button type="submit" class="btn btn-primary">
                          {{ __('Crear Instancia Curso') }}
                      </button>
                  </div>
              </div>
          </form>
        </div>
          <!--Editar Instancia de Curso-->
        <div class="col-md-4 float-left">
              <h2>Editar Instancia de Curso</h2>
            <form method="POST" action="{{ route('mostrarInfo_curso') }}" >
            @csrf
                <div class="form-group row col-md-12">
                    <select class="form-control" name="curso_sel" id="curso_sel" onchange="enviarForm()" >
                        @foreach($cursos as $curso)
                            <option value="{{$curso->id}}" >Sigla: {{$curso->sigla}} Nombre: {{$curso->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-4 offset-md-3">
                        <button type="submit" class="btn btn-primary" id="InputSelectInstancia" >
                            {{ __('Editar Instancia') }}
                        </button>
                    </div>
                </div>
            </form>
          </div>


        <!-- Eliminar Instancia de Curso-->
        <div class="col-md-4 float-left">
            <h2>Eliminar Instancia de Curso</h2>
            <form method="POST" action="{{ route('eliminar_instancia') }}" >
            @csrf
                <div class="form-group row col-md-12">
                    <select class="form-control" name="instancia_sel" id="instancia_sel" >
                          @foreach($instancias as $instancia)
                              <option value="{{$instancia->id}}" >{{$instancia->agno}} {{$instancia->semestre}} {{$instancia->curso_id}}</option>
                          @endforeach
                    </select>
                </div>
                <div class="form-group row mb-0">
                        <div class="col-md-4 offset-md-3">
                            <button type="submit" class="btn btn-danger" id="InputSelectInstancia" >
                                {{ __('Eliminar Instancia') }}
                            </button>
                        </div>
                    </div>
            </form>
        </div>
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
