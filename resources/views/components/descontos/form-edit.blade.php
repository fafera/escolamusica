<form name="form-desconto" id="form-edit-desconto" method="POST" action="{{ route('descontos.update', $desconto->id) }}">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="md-form row-form-group mb-3">
                <label for="aluno" class="form-control-label">Aluno:</label>
                <input type="hidden" name="id_matricula" value="{{$desconto->id_matricula}}">
                <input type="text" name="aluno" readonly class="form-control" disabled value="{{$desconto->matricula->aluno->nome}}">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="md-form row-form-group mb-3">
                <label for="motivo" class="form-control-label">Motivo:</label>
                <input type="text" name="motivo" class="form-control" value="{{$desconto->motivo}}">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="md-form row-form-group mb-3">
                <label for="valor" class="form-control-label">Valor padrão:</label>
                <input type="text" name="valor" id="valor" class="form-control" value="{{$desconto->valor}}">
            </div>
        </div>
    </div>
</form>
<div class="row">
    <div class="col-lg-8">
        <div class="md-form row-form-group mb-3">
            <button id="btn-edit-desconto" class="btn btn-primary">
                <i class="fa fa-dot-circle-o"></i> Salvar alterações
            </button>
        </div>
    </div>
    <div class="col-lg-4">
        <form id="form-delete-desconto" action="{{route('descontos.destroy', $desconto->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button id="btn-delete-desconto" class="btn btn-danger float-right">
                <i class="fa fa-trash"></i> Excluir desconto
            </button>
        </form>
    </div>
</div>