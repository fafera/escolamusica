@extends('layouts.app')
@section('content')
<h4 class="font-weight-bold m-0 mb-2">Mensalidade {{$mensalidade->mes}}/{{$mensalidade->ano}}</h4>
<div class="row">
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{$mensalidade->matricula->aluno->nome}} - {{$mensalidade->matricula->dia_da_semana}} - {{$mensalidade->matricula->horarioBR}}
                    @if($mensalidade->matricula->status == 'ativa')
                        <span class="badge badge-success">Ativa</span>
                    @else
                        <span class="badge badge-danger">Inativa</span>
                    @endif
                </h6>
            </div>
            <div class="card-body">
                @component('components.mensalidades.form-edit', ['mensalidade' => $mensalidade])

                @endcomponent
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pagamento</h6>
            </div>
            <div class="card-body">
                @component('components.pagamentos.mensalidade', ['mensalidade' => $mensalidade])

                @endcomponent
               </div>
        </div>

    </div>
</div>
@endsection
@push('scripts_src')
    <script src="{{asset('js/sections/mensalidade.js')}}"></script>
@endpush