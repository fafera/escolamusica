<div class="row">
    <div class="col-md-12">
        @if(!is_null($cobranca->pagamentos->first()))
            <h6 class="mb-3">Pagamentos recebidos:</h6>
            <div class="table-responsive">
                <table id="pagamentos-table" class="table table-striped table-bordered data-table">
                    <thead>
                        <tr>
                            <th scope="col" width="20%">Data</th>
                            <th scope="col">Valor</th>
                            <th scope="col" width="10%">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cobranca->pagamentos as $pagamento)
                            <tr>
                                <td>{{$pagamento->dataBR}}</td>
                                <td>{{$pagamento->valor}}</td>
                                <td style="text-align: center">
                                    <form id="form-delete-pagamento-{{$pagamento->id}}" action="{{route('pagamentos.destroy', $pagamento->id)}}" method="post">
                                        <input type="hidden" name="tipo" value="cobranca">
                                        <input type="hidden" name="id_referencia" value="{{$pagamento->id_referencia}}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" name="btn-delete-pagamento" class="delete-item"><i class="fa fa-trash"></i></a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @endif
        @if($cobranca->status != 'pago')
            <h6 class="mb-3">Adicionar pagamento:</h6>
            <form id="form-pagamento" method="POST" action="{{ route('pagamentos.store') }}">
                @csrf
                <input type="hidden" name="tipo" value="cobranca">
                <input type="hidden" name="id_referencia" value="{{$cobranca->id}}">
                <div class="row form-group">
                    <label class="col-lg-1 col-form-label form-control-label">Data:</label>
                    <div class="col-lg-11">
                        <input id="data" name="data" class="form-control" type="text" value="{{date('d/m/Y')}}">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-lg-1 col-form-label form-control-label">Valor:</label>
                    <div class="col-lg-11">
                        <input id="valor_pagamento" min="1" name="valor" class="value-field form-control" type="text" value="{{$cobranca->valorRestante}}">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-lg-1 col-form-label form-control-label"></label>
                    <div class="col-lg-11">
                        <button id="btn-submit-pagamento" class="btn btn-primary">
                            <i class="fa fa-check"></i> Confirmar pagamento
                        </button>
                    </div>
                </div>

            </form>
        @endif
    </div>
</div>