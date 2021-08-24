@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Dados da matrícula</strong>
            </div>
            <div class="card-body">
                <form name="form-matricula" id="form-edit-matricula" method="POST" action="{{ route('matriculas.update', $matricula->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="md-form row-form-group mb-3">
                        <label for="aluno" class="form-control-label">Aluno:</label>
                        <select name="id_aluno" id="aluno" class="form-control" readonly="true">
                            <option value="{{$matricula->aluno->id}}">{{$matricula->aluno->nome}}</option>
                        </select>
                    </div>
                    <div class="md-form row-form-group mb-3">
                        <label for="curso" class="form-control-label">Curso:</label>
                        <select name="id_curso" id="curso" class="form-control">
                            <option value="">Selecione o curso:</option>
                            @foreach($cursos as $curso)
                                <option @if($curso->id == $matricula->curso->id) {{'selected'}} @endif value="{{$curso->id}}">{{$curso->titulo}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md-form row-form-group mb-3">
                        <label for="modalidade" class="form-control-label">Modalidade:</label>
                        <select name="id_modalidade" id="modalidade" class="form-control">
                            <option value="">Selecione a duração:</option>
                            @foreach($modalidades as $modalidade)
                                <option @if($modalidade->id == $matricula->modalidade->id) {{'selected'}} @endif value="{{$modalidade->id}}">{{$modalidade->duracao}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md-form row-form-group mb-3">
                        <label for="dia_da_semana" class="form-control-label">Dia da Semana:</label>
                        @component('components.matriculas.weekdays-edit', ['diaDaSemana' => $matricula->diaDaSemanaNumero])

                        @endcomponent
                    </div>
                    <div class="md-form row-form-group mb-3">
                        <label for="horario" class="form-control-label">Horário:</label>
                        <input type="text" name="horario" id="horario" class="form-control" value="{{$matricula->horario}}">
                    </div>
                    <div class="md-form row-form-group mb-3">
                        <label for="professor" class="form-control-label">Professor:</label>
                        <select name="id_professor" id="professor" class="form-control">
                            <option value="">Selecione o professor:</option>
                            @foreach($professores as $professor)
                                <option @if($professor->id == $matricula->professor->id) {{'selected'}} @endif value="{{$professor->id}}">{{$professor->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Mensalidades</strong>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                  <table id="mensalidades-table" class="table table-condensed table-bordered">
                    <thead>
                      <tr>
                        <th>Data</th>
                        <th>Valor</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($matricula->mensalidades as $mensalidade)
                            <tr class="mensalidade-table-row" data-href="{{route('mensalidades.show', $mensalidade->id)}}">
                                <td>{{$mensalidade->mes}}/{{$mensalidade->ano}}</td>
                                <td>{{$mensalidade->valor}}</td>
                                <td>{{$mensalidade->status}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-8">
        <button id="btn-edit-matricula" class="btn btn-primary"><i class="fa fa-dot-circle-o"></i> Salvar alterações</button>
    </div>
    <div class="col-lg-4">
        <form id="form-delete-matricula" action="{{route('matriculas.destroy', $matricula->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button id="btn-delete-matricula" class="btn btn-danger float-right">
                <i class="fa fa-trash"></i> Excluir matrícula
            </button>
        </form>
    </div>
</div>
@endsection
@push('scripts_src')
  <script src="{{asset('js/sections/matricula.js')}}"></script>
@endpush
