<form name="form-mensalidade" id="form-add-mensalidade" method="POST" action="{{ route('mensalidades.store') }}">
    @method('POST')
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="md-form row-form-group mb-3">
                <label for="matricula" class="form-control-label">Matrícula:</label>
                <select name="id_matricula" id="matricula" class="form-control">
                    <option value="">Selecione a matrícula:</option>
                    @foreach($matriculas as $matricula)
                        <option value="{{$matricula->id}}">{{$matricula->aluno->nome}} - {{$matricula->curso->titulo}} - {{$matricula->modalidade->duracaoBRTime}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="md-form row-form-group mb-3">
                <label for="aluno" class="form-control-label">Mês:</label>
                <input type="text" name="mes" class="form-control">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="md-form row-form-group mb-3">
                <label for="aluno" class="form-control-label">Ano:</label>
                <input type="text" name="ano" class="form-control">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="md-form row-form-group mb-3">
                <label for="aluno" class="form-control-label">Quantidade de aulas:</label>
                <input type="text" name="qtd_aulas_previstas" class="form-control">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="md-form row-form-group mb-3">
                <label for="aluno" class="form-control-label">Vencimento:</label>
                <input type="text" id="vencimento" name="vencimento" class="form-control">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="md-form row-form-group mb-3">
                <label for="aluno" class="form-control-label">Valor:</label>
                <input type="text" name="valor" class="form-control value-field">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="md-form row-form-group mb-3">
                <button id="btn-add-mensalidade" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Adicionar
                </button>
            </div>
        </div>
    </div>
</form>
