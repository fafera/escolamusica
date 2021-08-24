@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Adicionar aluno</strong>
            </div>
            <div class="card-body">
                <form id="form-add-aluno" method="POST" action="{{ route('alunos.store') }}">
                    @csrf
                    <div class="row form-group">
                        <label class="col-lg-1 col-form-label form-control-label">Nome</label>
                        <div class="col-lg-11">
                            <input type="text" name="nome" id="nome" placeholder="Fulano de Tal" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-lg-1 col-form-label form-control-label">Data de nascimento:</label>
                        <div class="col-lg-11">
                            <input type="text" name="dt_nascimento" id="dt_nascimento" class="form-control dt">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-lg-1 col-form-label form-control-label">Telefone:</label>
                        <div class="col-lg-11">
                            <input type="text" name="telefone" id="telefone" class="form-control telefone">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-lg-1 col-form-label form-control-label">CPF:</label>
                        <div class="col-lg-11">
                            <input type="text" name="cpf" id="cpf" class="form-control cpf">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-lg-1 col-form-label form-control-label">RG:</label>
                        <div class="col-lg-11">
                            <input type="text" maxlength="14" name="rg" id="rg" class="form-control rg">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-lg-1 col-form-label form-control-label">Endereço:</label>
                        <div class="col-lg-11">
                            <input type="text" name="endereco" id="endereco" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-lg-1 col-form-label form-control-label">Sexo:</label>
                        <div class="col col-lg-11">
                            <div class="form-check">
                                <div class="radio">
                                    <label for="masculino" class="form-check-label ">
                                        <input type="radio" id="masculino" name="sexo" value="m" class="form-check-input">Masculino
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="feminino" class="form-check-label ">
                                        <input type="radio" id="feminino" name="sexo" value="f" class="form-check-input">Feminino
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-lg-1 col-form-label form-control-label">E-mail:</label>
                        <div class="col-lg-11">
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-lg-1 col-form-label form-control-label"></label>
                        <div class="col-lg-11">
                            <button id="btn-add-aluno" class="btn btn-primary">
                                <i class="fa fa-dot-circle-o"></i> Adicionar
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
    <script src="{{asset('js/sections/aluno.js')}}"></script>
@endpush
