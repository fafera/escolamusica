@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-4">
                        <h4 class="font-weight-bold m-0">Pagamentos realizados</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="pagamentos-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Valor</th>
                            <th>Tipo</th>
                            <th>Aluno</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pagamentos as $pagamento)
                        <tr style="cursor: pointer;" class="pagamento-table-row" data-href="{{route('pagamentos.show', $pagamento->id)}}">
                            <td>{{$pagamento->dataBR}}</td>
                            <td>{{$pagamento->valorBR}}</td>
                            @if($pagamento->tipo == 'cobranca')
                                <td>{{$pagamento->cobranca->tipo}}</td>
                            @else
                                <td>{{$pagamento->tipo}}</td>
                            @endif
                            <td>{{$pagamento->aluno}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts_src')
    <script src="{{asset('js/sections/pagamento.js')}}"></script>
@endpush
