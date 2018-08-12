@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
      <div class="card-header"><h2>{{ 'Asignatura :'. $curso->sigla .'  '.$curso->nombre}}</h2></div>

      <div class="card-body">

        <table>
          <tr><td>{{'Descripción: '.$curso->descripcion}}</td></tr>
          <tr><td>{{'Profesor: '.$profesor->nombre.' '.$profesor->apellido_paterno}} </td></tr>
          <tr><td>{{'Cursada en: '.$matricula->agno .' / Semestre: '. $matricula->semestre}}</td>
          <tr><td>{{'Estado: '.$estado->estado}}</td> </tr>
          <tr><td>{{'Nota Final: '}} </td></tr>
        </table>
      </div>
    </div>
</div>
@endsection
