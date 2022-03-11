<form name="form-curso" id="form-curso" method="POST" action="{{ route('cursos.store') }}">
    @method('POST')
    @csrf
    <div class="row">
        <div class="col-lg-3">
            <div class="md-form row-form-group mb-3">
                <label for="duracao" class="form-control-label">Título:</label>
                <input type="text" required id="titulo" name="titulo" class="form-control">  
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="md-form row-form-group mb-3">
                <button id="btn-add-curso" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Adicionar
                </button>
            </div>
        </div>
    </div>
</form>
