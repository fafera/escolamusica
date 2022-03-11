@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
      <strong class="card-title">Exportar relatórios de aulas</strong>
      </div>
      <div class="card-body">
        @component('components.aulas.form-exportar')
        @endcomponent
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts_src')
    <script src="{{asset('js/sections/aulas.js')}}"></script>
@endpush
