@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Adicionar professor</strong>
            </div>
            <div class="card-body">
                <form id="form-professores" method="POST" action="{{ route('professores.store') }}">
                    @csrf
                    <div class="row form-group">
                        <label class="col-lg-1 col-form-label form-control-label">Nome</label>
                        <div class="col-lg-11">
                            <input type="text" name="nome" id="nome" class="form-control">
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
@endsection
@push('scripts')
$('#dt_nascimento').mask('00/00/0000');
$('#cpf').mask('000.000.000-00');
$('#rg').mask('0000000000');
$('#telefone').mask('(00)0.0000-0000');

$('#btn-submit').on('click',function(event) {
    $('#form-alunos').submit();
});

@endpush