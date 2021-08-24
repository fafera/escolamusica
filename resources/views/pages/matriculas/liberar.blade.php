@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Dados da matrícula</strong>
            </div>
            <div class="card-body">
                <form id="form-liberar-matricula" method="POST" action="{{ route('matriculas.storeLiberar') }}">
                    @csrf
                    <div class="row form-group">
                        <label class="col-lg-1 col-form-label form-control-label">Professor:</label>
                        <div class="col-lg-11">
                            <select name="id_professor" id="professor" class="form-control">
                                <option value="">Selecione:</option>
                                @foreach($professores as $professor)
                                    <option value="{{$professor->id}}">{{$professor->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-lg-1 col-form-label form-control-label">Matrícula:</label>
                        <div class="col-lg-11">
                            <select name="id_matricula" id="matricula_liberada" class="form-control">
                                <option value="">Selecione:</option>
                                @foreach($matriculas as $matricula)
                                    <option value="{{$matricula->id}}">{{$matricula->aluno->nome}} - {{$matricula->modalidade->duracaoBRTime}} - {{$matricula->curso->titulo}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <label class="col-lg-1 col-form-label form-control-label"></label>
                        <div class="col-lg-11">
                            <button id="btn-add-professor" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Adicionar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Matrículas liberadas</strong>
            </div>
            <div class="card-body">
                <table id="matriculas-liberadas-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Aluno</th>
                            <th>Professor liberado</th>
                            <th>Modalidade</th>
                            <th>Curso</th>
                            <th>Ação</th>   
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($matriculasLiberadas as $matriculaLiberada)
                            <tr>
                                <td>{{$matriculaLiberada->matricula->aluno->nome}}</td>
                                <td>{{$matriculaLiberada->professor->nome}}</td>
                                <td>{{$matriculaLiberada->matricula->modalidade->duracaoBRTime}}</td>
                                <td>{{$matriculaLiberada->matricula->curso->titulo}}</td>
                                <td>
                                    <form id="form-delete-liberada" action="{{route('matriculas.destroyLiberada', $matriculaLiberada->id)}}"  method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button id="btn-delete-liberada" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                    </button>
                                    </form>
                                </td>
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
    <script src="{{asset('js/sections/matricula.js')}}"></script>
@endpush