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
                <form id="form-delete-salario" action="{{route('salarios.destroy', $salario->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button id="btn-delete" class="btn btn-danger col-lg-2 float-right mb-2 ml-2">Excluir folha</button>
                </form>
                
                <button id="btn-export" data-url="{{route('salarios.export', $salario->id)}}" class="btn btn-warning col-lg-2 float-right mb-2">Exportar folha</button>
                {{-- Gambiarra para ordernar lista do salário --}}
                @php 
                $salario->informesProfessor = $salario->informesProfessor->sortBy(function($informe) {
                    if(isset($informe->mensalidade->matricula)) {
                        return $informe->mensalidade->matricula->aluno->nome;
                    } else {
                        return $informe->aulaTeste->aluno->nome;
                    }
                }); @endphp
                @component('components.salarios.table-informes', ['salario' => $salario])
                @endcomponent
                
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts_src')
    <script src="{{asset('js/sections/salario.js')}}"></script>
@endpush