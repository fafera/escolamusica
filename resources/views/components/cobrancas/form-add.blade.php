<form name="form-cobranca" id="form-add-cobranca" method="POST" action="{{ route('cobrancas.store') }}">
    @method('POST')
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="md-form row-form-group mb-3">
                <label for="aluno" class="form-control-label">Aluno:</label>
                <select name="id_aluno" id="aluno" class="form-control" data-verify="{{route('alunos.verifyMatricula')}}">
                    <option value="">Selecione o aluno:</option>
                    @foreach($alunos as $aluno)
                        <option value="{{$aluno->id}}">{{$aluno->nome}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row" id="matriculas-row" style="display: none;">
        <div class="col-lg-12">
            <div class="md-form row-form-group mb-3">
                <label for="matricula" class="form-control-label">Matrícula:</label>
                <select name="id_matricula" id="matricula" class="form-control">

                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="md-form row-form-group mb-3">
                <label for="data" class="form-control-label">Data:</label>
                <input type="text" name="data" id="data" class="form-control">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="md-form row-form-group mb-3">
                <label for="tipo" class="form-control-label">Tipo:</label>
                <select name="tipo" id="tipo" class="form-control">
                    <option value=""></option>
                    <option value="matricula">Taxa de matrícula</option>
                    <option value="aula">Aula</option>
                    <option value="multa">Multa</option>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="md-form row-form-group mb-3">
                <label for="valor" class="form-control-label">Valor:</label>
                <input type="text" name="valor" id="valor" class="form-control value-field">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="md-form row-form-group mb-3">
                <button id="btn-add-cobranca" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Adicionar
                </button>
            </div>
        </div>
    </div>
</form>
