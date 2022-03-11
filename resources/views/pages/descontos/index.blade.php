@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-4">
                        <h4 class="font-weight-bold m-0">Descontos</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12" id="table-col">
                        <table id="descontos-table" class="table table-striped table-bordered">
                            <input type="hidden" id="route-add-desconto" value="{{route('descontos.create')}}">
                            <thead>
                                <tr>
                                    <th>Aluno</th>
                                    <th>Matrícula</th>
                                    <th>Motivo</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($descontos as $desconto)
                                <tr style="cursor: pointer;" class="descontos-table-row" data-href="{{route('descontos.show', $desconto->id)}}">
                                  <td>{{$desconto->matricula->aluno->nome}}</td>
                                  <td>{{$desconto->matricula->curso->titulo}} - {{$desconto->matricula->modalidade->duracaoBRTime}}</td>
                                  <td>{{$desconto->motivo}}</td>
                                  <td>{{$desconto->valorBR}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p> Total de descontos: <span id="total_descontos">{{count($descontos)}} </span></p>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts_src')
    <script src="{{asset('js/sections/desconto.js')}}"></script>
@endpush
