@extends('layouts.app')
@section('content')
<h4 class="font-weight-bold m-0 mb-2">Pagamento - {{$pagamento->dataBR}}</h4>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pagamento</h6>
            </div>
            <div class="card-body">
                @if($pagamento->tipo == 'cobranca')
                    @component('components.pagamentos.cobranca', ['cobranca' => $pagamento->cobranca])

                    @endcomponent
                @else
                    @component('components.pagamentos.mensalidade', ['mensalidade' => $pagamento->mensalidade])

                    @endcomponent
                @endif
               </div>
        </div>

    </div>
</div>
@endsection
@push('scripts_src')
    <script src="{{asset('js/sections/pagamento.js')}}"></script>
@endpush