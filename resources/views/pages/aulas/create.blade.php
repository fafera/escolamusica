@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Adicionar aula extra</strong>
            </div>
            <div class="card-body">
                <form id="form-aula" method="POST" action="{{ route('aulas.store') }}">
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
                        <label class="col-lg-1 col-form-label form-control-label">Aluno:</label>
                        <div class="col-lg-11">
                            <select name="id_aluno" id="aluno" class="form-control">
                                <option value="">Selecione:</option>
                                @foreach($alunos as $aluno)
                                    <option value="{{$aluno->id}}">{{$aluno->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-lg-1 col-form-label form-control-label">Modalidade:</label>
                        <div class="col-lg-11">
                            <select name="id_modalidade" id="modalidade" class="form-control">
                                <option value="">Selecione:</option>
                                @foreach($modalidades as $modalidade)
                                    <option value="{{$modalidade->id}}">{{$modalidade->duracaoBRTime}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-lg-1 col-form-label form-control-label">Tipo:</label>
                        <div class="col-lg-11">
                            <select name="tipo" id="tipo" class="form-control">
                                <option value="">Selecione:</option>
                                <option value="teste">Aula teste</option>
                                <option value="reposicao">Recuperação</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-lg-1 col-form-label form-control-label">Data:</label>
                        <div class="col-lg-11">
                            <input type="text" id="data" name="data" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-lg-1 col-form-label form-control-label">Horário:</label>
                        <div class="col-lg-11">
                            <input type="text" id="horario" name="horario" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-lg-1 col-form-label form-control-label">Valor:</label>
                        <div class="col-lg-11">
                            <input type="text" id="valor" name="valor" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-lg-1 col-form-label form-control-label">Porcentagem professor:</label>
                        <div class="col-lg-11">
                            <input type="text" id="porcentagem_professor" name="porcentagem_professor" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-lg-1 form-control-label">Adicionar cobrança?</label>
                        <div class="col-lg-1">
                            <input type="checkbox" id="add_cobranca" name="add_cobranca" class="form-control-check">
                        </div>
                    </div>
                    {{-- <div class="row form-group">
                        <label class="col-lg-1 col-form-label form-control-label">Tipo da aula:</label>
                        <div class="col-lg-11">
                            <select name="tipo" id="tipo" class="form-control">
                                <option value="">Selecione:</option>
                                <option value="teste">Teste</option>
                                <option value="recuperacao">Recuperação</option>
                            </select>
                        </div>
                    </div>
                    <div id="row-mensalidades" class="row form-group" style="display: none;">
                        <input type="hidden" id="json_mensalidades_url" value="{{route('alunos.getMensalidadesJSON')}}">
                        <label class="col-lg-1 col-form-label form-control-label">Mensalidade:</label>
                        <div class="col-lg-11">
                            <select name="id_mensalidade" id="mensalidade" class="form-control">
                                
                            </select>
                        </div>
                    </div> --}}
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
@endsection
@push('scripts_src')
    <script src="{{asset('js/sections/aulas.js')}}"></script>
@endpush