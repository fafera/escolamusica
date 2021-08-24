@extends('layouts.app')
@section('content')
<h4 class="font-weight-bold m-0 mb-2">Cobrança - {{$cobranca->dataBR}}</h4>
<div class="row">
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{$cobranca->aluno->nome}} - {{$cobranca->tipoFormatado}}
                </h6>
            </div>
            <div class="card-body">
                @component('components.cobrancas.form-edit', ['cobranca' => $cobranca])

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
                @component('components.pagamentos.cobranca', ['cobranca' => $cobranca])

                @endcomponent
               </div>
        </div>

    </div>
</div>
@endsection
@push('scripts_src')
    <script src="{{asset('js/sections/cobranca.js')}}"></script>
@endpush