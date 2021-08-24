@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-4">
                        <h4 class="font-weight-bold m-0">Mensalidades</h4>
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
                        <table id="mensalidades-table" class="table table-striped table-bordered">
                            <input type="hidden" id="route-add-mensalidade" data-url="{{route('mensalidades.create')}}">
                            <thead>
                                <tr>
                                    <th>Vigência</th>
                                    <th>Valor</th>
                                    <th>Aluno</th>
                                    <th>Vencimento</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mensalidades as $mensalidade)
                                <tr style="cursor: pointer;" class="mensalidade-table-row" data-href="{{route('mensalidades.show', $mensalidade->id)}}">
                                  <td>{{$mensalidade->mes}}/{{$mensalidade->ano}}</td>
                                  <td>{{$mensalidade->valorFormatado}}</td>
                                  <td>{{$mensalidade->matricula->aluno->nome}}</td>
                                  <td>{{$mensalidade->vencimentoDataBR}}</td>
                                  <td>{{$mensalidade->statusFormatado}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p> Total de mensalidades: <span id="total_mensalidades">{{count($mensalidades)}} </span></p>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts_src')
    <script src="{{asset('js/sections/mensalidade.js')}}"></script>
@endpush
