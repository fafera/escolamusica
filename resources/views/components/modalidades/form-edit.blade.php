<form name="form-edit-modalidade" id="form-edit-modalidade" method="POST" action="{{ route('modalidades.update', $modalidade->id) }}">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-lg-3">
            <div class="md-form row-form-group mb-3">
                <label for="duracao" class="form-control-label">Duração:</label>
                <br>
                <small>Horas</small>
                <input type="number" min="0" max="24" required id="horas" name="horas" class="form-control form-control-sm" value="{{$modalidade->horas}}">
                <small>Minutos</small>
                <input type="number" min="0" max="60" required id="minutos" name="minutos" class="form-control form-control-sm" value="{{$modalidade->minutos}}">
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="md-form row-form-group mb-3">
                <label for="valor" class="form-control-label">Valor:</label>
                <input type="text" id="valor" name="valor" required class="form-control" value="{{$modalidade->valor}}">
            </div>
        </div>
    </div>
</form>
<div class="row">
    <div class="col-lg-8">
        <div class="md-form row-form-group mb-3">
            <button id="btn-edit-modalidade" class="btn btn-primary">
                <i class="fa fa-dot-circle-o"></i> Salvar
            </button>
        </div>
    </div>
    <div class="col-lg-4">
        <form id="form-delete-modalidade" action="{{route('modalidades.destroy', $modalidade->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button id="btn-delete-modalidade" class="btn btn-danger float-right">
                <i class="fa fa-trash"></i> Excluir modalidade
            </button>
        </form>
    </div>
</div>
