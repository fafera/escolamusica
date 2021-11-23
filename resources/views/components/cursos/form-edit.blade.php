<form name="form-edit-curso" id="form-edit-curso" method="POST" action="{{ route('cursos.update', $curso->id) }}">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-lg-3">
            <div class="md-form row-form-group mb-3">
                <label for="duracao" class="form-control-label">Título:</label>
                <input type="text" required id="titulo" name="titulo" class="form-control" value="{{$curso->titulo}}">
            </div>
        </div>
        
    </div>
</form>
<div class="row">
    <div class="col-lg-8">
        <div class="md-form row-form-group mb-3">
            <button id="btn-edit-curso" class="btn btn-primary">
                <i class="fa fa-dot-circle-o"></i> Salvar
            </button>
        </div>
    </div>
    <div class="col-lg-4">
        <form id="form-delete-curso" action="{{route('cursos.destroy', $curso->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button id="btn-delete-curso" class="btn btn-danger float-right">
                <i class="fa fa-trash"></i> Excluir curso
            </button>
        </form>
    </div>
</div>
