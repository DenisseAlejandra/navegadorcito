<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')
    ->name('home');

Route::get('/admin', 'AdminController@admin')
    ->middleware('is_admin')
    ->name('admin');


Route::get('/perfilAlumno', 'PerfilAlumnoController@perfilAlumno')
    ->middleware('is_alumno')
    ->name('perfilAlumno');

Route::get('/asignaturaAlumno' , 'AsignaturaAlumnoController@asignaturaAlumno')
    ->middleware('is_alumno')
    ->name('asignaturaAlumno');

//Admin-Alumno
Route::get('/admin/alumno', 'AlumnoController@alumno')
    ->middleware('is_admin')
    ->name('alumno');

Route::post('/admin/editarAlumno', 'AlumnoController@editarInfo_alumno')
    ->name('editarInfo_alumno');

Route::post('/admin/mostrarAlumno', 'AlumnoController@mostrarInfo_alumno')
    ->name('mostrarInfo_alumno');

Route::post('/admin/crearAlumno', 'AlumnoController@crearAlumno')
    ->name('crear_alumno');

Route::post('/admin/eliminarAlumno', 'AlumnoController@eliminarAlumno')
    ->name('eliminar_alumno');

//FIN Admin-Alumno

Route::get('/admin/curso', 'CursoController@curso')
    ->middleware('is_admin')
    ->name('curso');

Route::post('/admin/curso', 'CursoController@mostrarInfo_curso')
    ->name('mostrarInfo_curso');

Route::post('/admin/crearCurso', 'CursoController@crearCurso')
    ->name('crear_curso');

Route::post('/admin/modificarCurso', 'CursoController@modificarCurso')
    ->name('modificar_curso');

Route::post('/admin/eliminarCurso', 'CursoController@eliminarCurso')
    ->name('eliminar_curso');

Route::get('/admin/instancia', 'InstanciaCursoController@instancia')
    ->middleware('is_admin')
    ->name('instancia');

Route::post('/admin/crearInstanciaCurso', 'InstanciaCursoController@crearInstanciaCurso')
    ->name('crear_instanciaCurso');

Route::post('/admin/eliminarInstancia', 'InstanciaCursoController@eliminarInstancia')
    ->name('eliminar_instancia');

Route::get('/admin/estado', 'EstadoMatriculaController@estado')
    ->middleware('is_admin')
    ->name('estado');

Route::post('/admin/estado', 'EstadoMatriculaController@mostrarInfo_estado')
    ->name('mostrarInfo_estado');

Route::post('/admin/eliminarEstado', 'EstadoMatriculaController@eliminarEstado')
    ->name('eliminar_estado');

Route::post('/admin/crearEstadoMatricula', 'estadoMatriculaController@crearEstadoMatricula')
    ->name('crear_estadoMatricula');

Route::get('/admin/matricula', 'matriculaController@matricula')
    ->middleware('is_admin')
    ->name('matricula');

Route::post('/crearMatricula', 'matriculaController@crearMatricula')
    ->name('crear_matricula');

Route::post('/modificarMatricula', 'matriculaController@modificarMatricula')
    ->name('modificar_matricula');

Route::post('/eliminarMatricula', 'matriculaController@eliminarMatricula')
    ->name('eliminar_matricula');

Route::get('/profesores', 'ProfesorController@admin')
    ->middleware('is_profesor')
    ->name('profesores');
	
Route::post('/admin/profesor', 'ProfesorController@mostrarInfo_profesor')
    ->name('mostrarInfo_profesor');
