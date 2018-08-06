@extends('layouts.app')

@section('content')
<!-- Crear Estado Matricula  -->
<div class="card-body col-md-12">
    <div class="float-left col-md-4">
        <h2>Crear Estado de Matricula</h2>
        <form id="form-estadoMatricula" method="POST" action="{{ route('crear_estadoMatricula') }}#form-estadoMatricula" >
            @csrf

                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="estado" type="text" class="form-control" name="estado" required autofocus placeholder="Ingrese nombre del estado">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-4 offset-md-3">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Crear Estado Matricula') }}
                        </button>
                    </div>
                </div>
            </form>
    </div>
    <!-- Editar estado matricula-->
    <div class="col-md-4 float-left">
        <h2>Editar Estado</h2>

        <form method="POST" action="{{ route('mostrarInfo_estado') }}" >
        @csrf
            <div class="form-group row col-md-12">
                <select class="form-control" id="edit_select" >
                <option disabled selected>Seleccione un Estado</option>
                    @foreach($estados as $estado)
                        <option value="{{$estado->id}}" >{{$estado->estado}}</option>
                    @endforeach
                </select>
            </div>
        </form>
        <form method="POST" action="{{ route('editar_estado') }}">
        @csrf
                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="estado_edit" type="text" class="form-control" name="estado" required autofocus placeholder="Ingrese nombre estado">
                    </div>
                </div>

                <input type="text" id="id_estado" name="id_estado" style="opacity: 0; width: 0px;">
                <div class="form-group row col-md-12">
                    <button type="submit" class="btn btn-primary">Editar Estado</button>
                </div>
        </form>
    </div>

    <script>
        function searchInfoEstadoAjax( idEstado){
            $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name=_token]').val(),
                    },
                    method :'POST',
                    url : '/admin/mostrarEstado',
                    data : {
                        'idEstado': idEstado
                    },
                    success : function(data){
                        $("#estado_edit").val(data.estado);
                        $("#id_estado").val(data.id);
                    },
                    error : function (data) {
                        console.log(data+'error');
                    }
                });
        }
        $(document).ready(function(){
            $('#edit_select').change( function(){
                idEstado = $(this).val();
                searchInfoEstadoAjax(idEstado);
            });
        });
    </script>



    <!-- Eliminar estado matricula-->
    <div class="col-md-4 float-left">
        <h2>Eliminar Estado de Matricula</h2>
        <form method="POST" action="{{ route('eliminar_estado') }}" >
        @csrf
            <div class="form-group row col-md-12">
                <select class="form-control" name="estado_sel" id="estado_sel" >
                    <option disabled selected>Seleccione un Estado</option>
                    @foreach($estados as $estado)
                        <option value="{{$estado->id}}" >{{$estado->estado}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group row mb-0">
                    <div class="col-md-4 offset-md-3">
                        <button type="submit" class="btn btn-danger" id="InputSelectEstado" >
                            {{ __('Eliminar Estado') }}
                        </button>
                    </div>
                </div>
        </form>
    </div>

    <!--volver-->
      <form action="{{ route('admin') }}">
      <div class="col-md-11 float-left">
        <br>
        <div class="col-md-4 offset-md-3 float-right">
            <button type="submit" class="btn btn-secondary float-right" id="ir_admin" >
                {{ __('Volver al Menú') }}
            </button>
        </div>
      </div>
    </form>

@endsection
