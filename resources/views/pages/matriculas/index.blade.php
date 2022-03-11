@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-4">
                        <h4 class="font-weight-bold m-0">Matrículas</h4>
                    </div>
                    {{-- <div class="col-sm-8">
                        <a href="{{route('matriculas.create')}}" class="btn btn-primary col-sm-2 float-right">Adicionar Matrícula</a>
                    </div> --}}
                </div>
            </div>
            <div class="card-body">
                {{-- <div class="row" id="matriculas-filtros" data-url="{{route('matriculas.filtrar')}}">
                    <div class="input-group col-lg-4 mb-3">
                        <input class="form-control" type="text" name="filtro_periodo" id="filtro_periodo" placeholder="Clique para filtrar por período">
                        <button id="limpar-filtros" class="ml-2 btn btn-primary btn-sm">Limpar filtros</button>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-lg-12" id="table-col">
                        <table id="matriculas-table" class="table table-striped table-bordered">
                            <input type="hidden" id="route-add-matricula" value="{{route('matriculas.create')}}">
                            <thead>
                                <tr>
                                    <th>Aluno</th>
                                    <th>Curso</th>
                                    <th>Modalidade</th>
                                    <th>Professor</th>
                                    <th>Dia da Semana</th>
                                    <th>Horário</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($matriculas as $matricula)
                                <tr style="cursor: pointer;" class="matricula-table-row" data-href="{{route('matriculas.show', $matricula->id)}}">
                                  <td>{{$matricula->aluno->nome}}</td>
                                  <td>{{$matricula->curso->titulo}}</td>
                                  <td>{{$matricula->modalidade->duracao}}</td>
                                  <td>{{$matricula->professor->nome}}</td>
                                  <td>{{$matricula->dia_da_semana}}</td>
                                  <td>{{$matricula->horario}}</td>
                                  <td>{{$matricula->status}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p> Total de matrículas: <span id="total_matriculas">{{count($matriculas)}} </span></p>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts_src')
    <script src="{{asset('js/sections/matricula.js')}}"></script>
@endpush
