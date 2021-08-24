@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-4">
                        <h4 class="font-weight-bold m-0">Salários</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{-- <div class="row" id="salarios-filtros" data-url="{{route('mensalidades.filtrar')}}">
                    <div class="input-group col-lg-4 mb-3">
                        <input class="form-control" type="text" name="filtro_periodo" id="filtro_periodo" placeholder="Clique para filtrar por período">
                        <button id="limpar-filtros" class="ml-2 btn btn-primary btn-sm">Limpar filtros</button>
                    </div>
                </div> --}}
                <table id="salarios-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Mês</th>
                            <th>Ano</th>
                            <th>Professor</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($salarios as $salario)
                        <tr style="cursor: pointer;" class="salario-table-row" data-href="{{route('salarios.show', $salario->id)}}">
                            <td>{{$salario->mesExtenso}}</td>
                            <td>{{$salario->ano}}</td>
                            <td>{{$salario->professor->nome}}</td>
                            <td>{{$salario->valorBRL}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <p> Total de salários: <span id="total_salarios">{{count($salarios)}} </span></p>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts_src')
    <script src="{{asset('js/sections/salario.js')}}"></script>
@endpush
