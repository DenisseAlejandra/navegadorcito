@extends('layouts.app')

@section('content')
<div class="card-body col-md-12">

    <!-- Formulario agregar profesor -->
<!--    <div class="float-left col-md-4">
        <h2>Crear Profesor</h2>
        <form method="POST" action="{{ route('crear_profesor') }}" >
            @csrf
                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="rut" type="text" class="form-control" name="rut" required autofocus placeholder="Ingrese rut">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="nombre" type="text" class="form-control" name="nombre" placeholder="Ingrese nombre" required>
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-12">
                        <input id="materno" type="text" class="form-control" name="apellido_materno" placeholder="Apellido Materno" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="paterno" type="text" class="form-control" name="apellido_paterno" placeholder="Apellido Paterno" required>
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-md-12">
                        <input id="email" type="text" class="form-control" name="email" placeholder="Ingrese email" required>
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Ingrese contraseña" required>
                    </div>
                </div>

                <div class="form-group row col-md-12">
                        <button type="submit" class="btn btn-primary">Crear Profesor</button>
                </div>
        </form>
    </div>  -->
    <!-- Fin formulario agregar profesor -->
    <!-- Sección editar alumno -->
    <div class="col-md-4 float-left">
        <h2>Editar Profesor</h2>

        <form method="POST" action="{{ route('mostrarInfo_profesor') }}" >
        @csrf
            <div class="form-group row col-md-12">
                <select class="form-control" id="edit_select" >
                <option disabled selected>Seleccione a un Profesor</option>
                    @foreach($profesores as $profesor)
                        <option value="{{$profesor->rut}}" >{{$profesor->nombre}} {{$profesor->apellido_paterno}}</option>
                    @endforeach
                </select>
            </div>
        </form>

        <form method="POST" action="{{ route('editar_profesor') }}">
        @csrf
                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="rut_edit" type="text" class="form-control" name="rut" required autofocus placeholder="Ingrese rut">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="nombre_edit" type="text" class="form-control" name="nombre" placeholder="Ingrese nombre" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="materno_edit" type="text" class="form-control" name="apellido_materno" placeholder="Apellido Materno" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="paterno_edit" type="text" class="form-control" name="apellido_paterno" placeholder="Apellido Paterno" required>
                    </div>
                </div>
                <input type="text" id="rut_original" name="rut_original" style="opacity: 0; width: 0px;">
                <div class="form-group row col-md-12">
                    <button type="submit" class="btn btn-primary">Editar Profesor</button>
                </div>
        </form>
    </div>


    <script>
        function searchInfoProfesorAjax( rutProfesor){
            $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name=_token]').val(),
                    },
                    method :'POST',
                    url : '/admin/mostrarProfesor',
                    data : {
                        'rutProfesor': rutProfesor
                    },
                    success : function(data){
                        $("#rut_edit").val(data.rut);
                        $("#nombre_edit").val(data.nombre);
                        $("#paterno_edit").val(data.apellido_paterno);
                        $("#materno_edit").val(data.apellido_materno);
                        $("#rut_original").val(data.rut);
                    },
                    error : function (data) {
                        console.log(data+'error');
                    }
                });
        }
        $(document).ready(function(){
            $('#edit_select').change( function(){
                rutProfesor = $(this).val();
                searchInfoProfesorAjax(rutProfesor);
            });
        });
    </script>


      <!-- Fin sección editar alumno -->
    <!-- Formulario eliminar profesor -->
<!--    <div class="col-md-4 float-left">
        <h2>Eliminar Profesor</h2>
        <form method="POST" action="{{ route('eliminar_profesor') }}">
        @csrf
            <div class="form-group row col-md-12">
                <select class="form-control" name="delete_select">
                <option disabled selected>Seleccione a un Profesor</option>
                    @foreach($profesores as $profesor)
                        <option value="{{$profesor->user_id}}" >{{$profesor->nombre}} {{$profesor->apellido_paterno}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group row col-md-12">
                <button type="submit" class="btn btn-primary">Eliminar Profesor</button>
            </div>
        </form>
    </div> -->

    <!-- Fin formulario eliminar profesor -->


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
