@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
      <strong class="card-title">Adicionar modalidade</strong>
      </div>
      <div class="card-body">
        @component('components.modalidades.form-add')
        @endcomponent
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts_src')
    <script src="{{asset('js/sections/modalidade.js')}}"></script>
@endpush
