@extends('layouts.app')
@section('content')
<h4 class="font-weight-bold m-0 mb-2">Salários</h4>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{$salario->mes}}/{{$salario->ano}} - {{$salario->professor->nome}}
                </h6>
            </div>
            <div class="card-body">
                @component('components.salarios.table-informes', ['informes' => $salario->informesProfessor])
                @endcomponent
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts_src')
    <script src="{{asset('js/sections/mensalidade.js')}}"></script>
@endpush