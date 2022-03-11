@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-4">
                        <h4 class="font-weight-bold m-0">Cobranças</h4>
                    </div>
                    {{-- <div class="col-sm-8">
                        <a href="{{route('mensalidades.create')}}" class="btn btn-primary col-sm-2 float-right">Adicionar Mensalidade</a>
                    </div> --}}
                </div>
            </div>
            <div class="card-body">
                {{-- <div class="row" id="mensalidades-filtros" data-url="{{route('mensalidades.filtrar')}}">
                    <div class="input-group col-lg-4 mb-3">
                        <input class="form-control" type="text" name="filtro_periodo" id="filtro_periodo" placeholder="Clique para filtrar por período">
                        <button id="limpar-filtros" class="ml-2 btn btn-primary btn-sm">Limpar filtros</button>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-lg-12" id="table-col">
                        <table id="cobrancas-table" class="table table-striped table-bordered">
                            <input type="hidden" id="route-add-cobranca" data-url="{{route('cobrancas.create')}}">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Valor</th>
                                    <th>Aluno</th>
                                    <th>Tipo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cobrancas as $cobranca)
                                <tr style="cursor: pointer;" class="cobranca-table-row" data-href="{{route('cobrancas.show', $cobranca->id)}}">
                                  <td>{{$cobranca->dataBR}}</td>
                                  <td>{{$cobranca->valorBRL}}</td>
                                  <td>{{$cobranca->aluno->nome}}</td>
                                  <td>{{$cobranca->tipoFormatado}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p> Total de cobrancas: <span id="total_cobrancas">{{count($cobrancas)}} </span></p>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts_src')
    <script src="{{asset('js/sections/cobranca.js')}}"></script>
@endpush
