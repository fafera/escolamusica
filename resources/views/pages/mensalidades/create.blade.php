@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
      <strong class="card-title">Adicionar mensalidade</strong>
      </div>
      <div class="card-body">
        @component('components.mensalidades.form-add', ['matriculas' => $matriculas])
        @endcomponent
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts_src')
    <script src="{{asset('js/sections/mensalidade.js')}}"></script>
@endpush
