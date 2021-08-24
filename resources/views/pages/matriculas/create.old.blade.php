@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Dados da matrícula</strong>
            </div>
            <div class="card-body">
                <form name="form-matricula" id="form-add-matricula" method="POST" action="{{ route('matriculas.store') }}">
                    @csrf
                    @isset($aluno)
                    <div class="md-form row-form-group mb-3">
                        <label for="aluno" class="form-control-label">Aluno:</label>
                        <input type="hidden" name="id_aluno" value="{{$aluno->id}}">
                        <input type="text" name="aluno" id="aluno" value="{{$aluno->nome}}" disabled  class="form-control">
                    </div>
                    @else
                    <div class="md-form row-form-group mb-3">
                        <label for="aluno" class="form-control-label">Aluno:</label>
                        <select name="id_aluno" id="aluno" class="form-control">
                            <option value="">Selecione o aluno:</option>
                            @foreach($alunos as $aluno)
                                <option value="{{$aluno->id}}">{{$aluno->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    @endisset
                    <div class="md-form row-form-group mb-3">
                        <label for="curso" class="form-control-label">Curso:</label>
                        <select name="id_curso" id="curso" class="form-control">
                            <option value="">Selecione o curso:</option>
                            @foreach($cursos as $curso)
                                <option value="{{$curso->id}}">{{$curso->titulo}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md-form row-form-group mb-3">
                        <label for="modalidade" class="form-control-label">Modalidade:</label>
                        <select name="id_modalidade" id="modalidade" class="form-control">
                            <option value="">Selecione a duração:</option>
                            @foreach($modalidades as $modalidade)
                                <option value="{{$modalidade->id}}">{{$modalidade->duracao}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md-form row-form-group mb-3">
                        <label for="dia_da_semana" class="form-control-label">Dia da Semana:</label>
                        @component('components.form.weekdays')

                        @endcomponent
                    </div>
                    <div class="md-form row-form-group mb-3">
                        <label for="horario" class="form-control-label">Horário:</label>
                        <input type="text" name="horario" id="horario" class="form-control">
                    </div>
                    <div class="md-form row-form-group mb-3">
                        <label for="professor" class="form-control-label">Professor:</label>
                        <select name="id_professor" id="professor" class="form-control">
                            <option value="">Selecione o professor:</option>
                            @foreach($professores as $professor)
                                <option value="{{$professor->id}}">{{$professor->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md-form row-form-group mb-3">
                        <label for="porcentagem_professor" class="form-control-label">Porcentagem do professor:</label>
                        <input type="text" name="porcentagem_professor" id="porcentagem_professor" class="form-control">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Dados da mensalidade</strong>
            </div>
            <div class="card-body">
                <form id="form-add-mensalidade" method="POST" action="{{ route('mensalidades.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="md-form row-form-group mb-3">
                                <label for="mes" class="form-control-label">Mês:</label>
                                @component('components.form.months')

                                @endcomponent
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="md-form row-form-group mb-3">
                                <label for="ano" class="form-control-label">Ano:</label>
                                @component('components.form.years')

                                @endcomponent
                            </div>
                        </div>
                    </div>

                    <div class="md-form row-form-group mb-3">
                        <label for="qtd_aulas_previstas" class="form-control-label">Quantidade de aulas:</label>
                        <input type="text" name="qtd_aulas_previstas" id="qtd_aulas_previstas" class="form-control">
                    </div>
                    <div class="md-form row-form-group mb-3">
                        <label for="valor" class="form-control-label">Valor:</label>
                        <input type="text" name="valor" id="valor" class="form-control">
                    </div>
                    <div class="md-form row-form-group mb-3">
                        <label for="vencimento" class="form-control-label">Vencimento:</label>
                        <input type="date" name="vencimento" id="vencimento" class="form-control">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="md-form form-check mb-1">
                                <input readonly type="checkbox" id="check-matricula" class="form-check-input">
                                <label for="check-matricula" class="form-check-label">Incluir matrícula</label>
                            </div>
                            <div class="md-form row-form-group mb-3" id="matricula-div" style="display: none;">
                                <label for="matricula" class="form-control-label">Valor:</label>
                                <input disabled type="text" name="tx_matricula" id="matricula" value="90.00" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="md-form form-check mb-1">
                                <input readonly type="checkbox" id="check-desconto" class="form-check-input">
                                <label for="check-desconto" class="form-check-label">Possui desconto?</label>
                            </div>
                            <div class="md-form row-form-group mb-3" id="desconto-div" style="display: none;">
                                <label for="desconto" class="form-control-label">Motivo do desconto:</label>
                                <input disabled type="text" name="desconto" id="desconto" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-md-center">
    <div class="col-md-auto mt-3">
        <button style="width: 700px" id="btn-submit" class="btn btn-primary">Adicionar</button>
    </div>
</div>
@endsection
@push('scripts')
var dt = new Date(),
    month = dt.getMonth() +1;

$('#mes option:eq('+month+')').prop('selected', true);
$('#horario').mask('00h00');
$('body').on('change', '#modalidade', function(e) {
    event.preventDefault();
    jQuery.ajax({
        url: "{{ url('/modalidades/getvalor') }}",
        method: 'post',
        data: {
            id: $(this).val()
        },
        success: function(result){
            $('#valor').val(result);
        }
    });
});
$('body').on('click', '#check-desconto', function(e) {
    if($(this).prop('checked')) {
        $('#desconto-div').show();
        $('#desconto').prop('disabled', false);
    } else {
        $('#desconto-div').hide();
        $('#desconto').prop('disabled', true);
    }
});
$('body').on('click', '#check-matricula', function(e) {
    if($(this).prop('checked')) {
        $('#matricula-div').show();
        $('#matricula').prop('disabled', false);
    } else {
        $('#matricula-div').hide();
        $('#matricula').prop('disabled', true);
    }
});
$('body').on('change', '#dia_da_semana, #mes, #ano', function(e) {
    e.preventDefault();
    jQuery.ajax({
        url: "{{ url('/matriculas/getaulasprevistasmes') }}",
        method: 'post',
        data: {
            dia_da_semana: $('#dia_da_semana').val(),
            ano: $('#ano').val(),
            mes: $('#mes').val()
        },
        success: function(result){
            $('#qtd_aulas').val(result);
        }
    });
});
$('#btn-submit').on('click', function(e) {
    e.preventDefault();
    jQuery.ajax({
        url: "{{ route('matriculas.store') }}",
        method: 'post',
        data: $('#form-add-matricula').serialize(),
        success: function(result){
            $('#form-add-mensalidade').append('<input type="hidden" name="id_matricula" value="'+result['id']+'">');
            $('#form-add-mensalidade').submit();
            console.log(result['id']);
        }
    });

});

@endpush