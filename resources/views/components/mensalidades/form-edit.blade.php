<form name="form-mensalidade" id="form-edit-mensalidade" method="POST" action="{{ route('mensalidades.update', $mensalidade->id) }}">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-lg-3">
            <div class="md-form row-form-group mb-3">
                <label for="aluno" class="form-control-label">Mês:</label>
                <input type="text" name="mes" class="form-control" value="{{$mensalidade->mes}}">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="md-form row-form-group mb-3">
                <label for="aluno" class="form-control-label">Ano:</label>
                <input type="text" name="ano" class="form-control" value="{{$mensalidade->ano}}">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="md-form row-form-group mb-3">
                <label for="aluno" class="form-control-label">Quantidade de aulas:</label>
                <input type="text" name="qtd_aulas_previstas" class="form-control" value="{{$mensalidade->qtd_aulas_previstas}}">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="md-form row-form-group mb-3">
                <label for="aluno" class="form-control-label">Vencimento:</label>
                <input type="text" id="vencimento" name="vencimento" class="form-control" value="{{$mensalidade->vencimentoDataBR}}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="md-form row-form-group mb-3">
                <label for="aluno" class="form-control-label">Valor:</label>
                <input type="text" name="valor" class="form-control value-field" value="{{$mensalidade->valor}}">
            </div>
        </div>
    </div>
</form>
<div class="row">
    <div class="col-lg-8">
        <div class="md-form row-form-group mb-3">
            <button id="btn-edit-mensalidade" class="btn btn-primary">
                <i class="fa fa-dot-circle-o"></i> Salvar alterações
            </button>
        </div>
    </div>
    <div class="col-lg-4">
        <form id="form-delete-mensalidade" action="{{route('mensalidades.destroy', $mensalidade->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button id="btn-delete-mensalidade" class="btn btn-danger float-right">
                <i class="fa fa-trash"></i> Excluir mensalidade
            </button>
        </form>
    </div>
</div>