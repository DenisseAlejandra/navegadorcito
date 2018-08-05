@extends('layouts.app')

@section('content')

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
