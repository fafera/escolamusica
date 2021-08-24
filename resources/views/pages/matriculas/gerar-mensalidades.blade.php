@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
      <strong class="card-title">Gerar mensalidades</strong>
      </div>
      <div class="card-body">
        @component('components.matriculas.form-gerar-mensalidades')
        @endcomponent
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts_src')
    {{-- <script src="{{asset('js/sections/salario.js')}}"></script> --}}
@endpush
