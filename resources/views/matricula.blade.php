@extends('layouts.app')

@section('content')
<div class="card-body col-md-12">
    <div class="float-left col-md-4">
        <h2>Crear Matricula</h2>
        <form id="form-matricula" method="POST" action="{{ route('crear_matricula') }}#form-matricula" >
          @csrf
              <div class="form-group row">
                  <select class="form-control" name="alumno_sel" id="alumno_sel">
                      <option  disabled hidden selected>Selecciona un alumno</option>
                      @foreach($alumnos as $alumno)
                          <option value="{{$alumno->rut}}" >{{$alumno->nombres}} {{$alumno->apellido_paterno}} {{$alumno->apellido_materno}}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group row">
                  <select class="form-control" name="curso_sel" id="curso_sel" onchange="mostrarInstancia({{$instancias}})">
                      <option  disabled hidden selected>Selecciona un curso</option>
                      @foreach($cursos as $curso)
                          <option value="{{$curso->id}}" >{{$curso->sigla}} &nbsp;&nbsp;{{$curso->nombre}}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group row">
                  <select class="form-control" name="instancia_sel" id="instancia_sel">
                      <option  disabled hidden selected>Selecciona una instancia</option>
                  </select>
              </div>

              <div class="form-group row">
                  <select class="form-control" name="est_sel" id="est_sel">
                      <option  disabled hidden selected>Selecciona un estado</option>
                      @foreach($estados as $estado)
                          <option value="{{$estado->id}}" >{{$estado->estado}}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group row mb-0">
                  <div class="col-md-4 offset-md-3">
                      <button type="submit" class="btn btn-primary">
                          {{ __('Crear Matricula') }}
                      </button>
                  </div>
              </div>
        </form>
      </div>
      <div class="col-md-4 float-left">
            <h2>Editar Matricula</h2>
            <form id="form-editar-matricula" method="POST" action="{{ route('modificar_matricula') }}#form-editar-matricula" >
              @csrf
                  <div class="form-group row">
                      <select class="form-control" name="alumn_sel" id="alumn_sel">
                          <option  disabled hidden selected>Selecciona una matricula</option>
                          @foreach($matriculas as $matricula)
                              <option value="{{$matricula->id}}" >{{$matricula->agno}} {{$matricula->semestre}} {{$matricula->alumno_id}}</option>
                          @endforeach
                      </select>
                  </div>

                  <div class="form-group row mb-0">
                      <div class="col-md-4 offset-md-3">
                          <button type="submit" class="btn btn-primary">
                              {{ __('Modificar Matricula') }}
                          </button>
                      </div>
                  </div>
            </form>
        </div>
  </div>

  <div class="col-md-4 float-left">
          <h2>Eliminar Matricula</h2>
          <form id="form-eliminar-matricula" method="POST" action="{{ route('eliminar_matricula') }}#form-eliminar-matricula" >
            @csrf
                <div class="form-group row">
                    <select class="form-control" name="matricula_sel" id="matricula_sel">
                        <option  disabled hidden selected>Selecciona una matricula</option>
                        @foreach($matriculas as $matricula)
                            @foreach($alumnos as $alumno)
                                @foreach($estados as $estado)
                                    @foreach($instancias as $instancia)
                                        @if(($alumno->rut == $matricula->alumno_id) and ($instancia->id == $matricula->instanciaCurso_id) and ($estado->id == $matricula->estadoMatricula_id))
                                          <option value="{{$matricula->id}}" >Año:{{$instancia->agno}} &nbsp;Semestre:{{$instancia->semestre}} &nbsp;Alumno:{{$alumno->nombres}}&nbsp;Estado:{{$estado->estado}}</option>
                                        @endif
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endforeach
                    </select>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-4 offset-md-3">
                        <button type="submit" class="btn btn-danger">
                            {{ __('Eliminar Matricula') }}
                        </button>
                    </div>
                </div>
          </form>
      </div>


<script>
    function mostrarInstancia(instancias){
      var selectCurso	=	document.getElementById("curso_sel");
      var selectInstancia	=	document.getElementById("instancia_sel");
      var cursoSel = selectCurso.options[selectCurso.selectedIndex].value;
      selectInstancia.options.length=0;
      for(var instancia of instancias){
        if(instancia.curso_id == cursoSel){
            var opcion = document.createElement("option");
            var textoCelda = document.createTextNode("año:"+instancia.agno+" semestre:"+instancia.semestre);
            opcion.setAttribute("value",instancia.id);
            opcion.appendChild(textoCelda);
            selectInstancia.appendChild(opcion);
        }
      }
    }
</script>



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
