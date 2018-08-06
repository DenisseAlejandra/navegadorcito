@extends('layouts.app')

@section('content')
<div class="card-body col-md-12">
    <div class="float-left col-md-4">
        <h2>Crear Curso</h2>
        <form id="form-cursos" method="POST" action="{{ route('crear_curso') }}#form-cursos" >
            @csrf
                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="sigla" type="text" class="form-control" name="sigla" required autofocus placeholder="Ingrese sigla del curso">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="nombre" type="text" class="form-control" name="nombre" placeholder="Ingrese nombre del curso" required>
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-12">
                        <input id="descripcion" type="text" class="form-control" name="descripcion" placeholder="descripcion " required>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-4 offset-md-3">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Crear Curso') }}
                        </button>
                    </div>
                </div>
            </form>
    </div>
    <!-- Sección editar curso -->
    <div class="col-md-4 float-left">
        <h2>Editar Curso</h2>

        <form  >
        @csrf
            <div class="form-group row col-md-12">
                <select class="form-control" id="edit_select" >
                <option disabled selected>Seleccione a un Curso</option>
                    @foreach($cursos as $curso)
                        <option value="{{$curso->id}}" >{{$curso->sigla}} {{$curso->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </form>
        <form method="POST" action="{{ route('editar_curso') }}">
        @csrf
                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="sigla_edit" type="text" class="form-control" name="sigla" required autofocus placeholder="Ingrese sigla">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="nombre_edit" type="text" class="form-control" name="nombre" placeholder="Ingrese nombre" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="descripcion_edit" type="text" class="form-control" name="descripcion" placeholder="Ingrese Descripcion" required>
                    </div>
                </div>

                <input type="text" id="id_curso" name="id_curso" style="opacity: 0; width: 0px;">
                <div class="form-group row col-md-12">
                    <button type="submit" class="btn btn-primary">Editar Curso</button>
                </div>
        </form>
    </div>

    <script>
        function searchInfoCursoAjax( idCurso){
            $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name=_token]').val(),
                    },
                    method :'POST',
                    url : '/admin/mostrarCurso',
                    data : {
                        'idCurso': idCurso
                    },
                    success : function(data){
                        $("#sigla_edit").val(data.sigla);
                        $("#nombre_edit").val(data.nombre);
                        $("#descripcion_edit").val(data.descripcion);
                        $("#id_curso").val(data.id);
                    },
                    error : function (data) {
                        console.log(data+'error');
                    }
                });
        }
        $(document).ready(function(){
            $('#edit_select').change( function(){
                idCurso = $(this).val();
                searchInfoCursoAjax(idCurso);
            });

        });
    </script>

    <!-- Eliminar Curso-->
    <div class="col-md-4 float-left">
        <h2>Eliminar Curso</h2>
        <form method="POST" action="{{ route('eliminar_curso') }}" >
        @csrf
            <div class="form-group row col-md-12">
                <select class="form-control" name="curso_sel" id="curso_sel" >
                  <option disabled selected>Seleccione a un Curso</option>
                    @foreach($cursos as $curso)
                        <option value="{{$curso->id}}" >Sigla: {{$curso->sigla}} Nombre: {{$curso->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-4 offset-md-3">
                    <button type="submit" class="btn btn-danger" id="InputSelectCurso" >
                        {{ __('Eliminar Curso') }}
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
