<div class="row">
    <div class="col-md-12 mx-auto">
        <form id="form-edit-professor" role="form" method="POST" action="{{ route('professores.update', $professor->id) }}">
            @csrf
            @method('PUT')
            <div class="row form-group">
                <label class="col-lg-1 col-form-label form-control-label">Nome</label>
                <div class="col-lg-11">
                    <input type="text" name="nome" id="nome" value="{{$professor->nome}}" class="form-control">
                </div>
            </div>
        </form>
        <div class="row form-group">
            <label class="col-lg-1 col-form-label form-control-label"></label>
            <div class="col-lg-8">
                <button id="btn-edit-professor" class="btn btn-primary">
                    <i class="fa fa-dot-circle-o"></i> Salvar alterações
                </button>
            </div>
            <div class="col-lg-3">
                <form id="form-delete-professor" action="{{route('professores.destroy', $professor->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button id="btn-delete-professor" class="btn btn-danger float-right">
                        <i class="fa fa-trash"></i> Excluir professor
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
