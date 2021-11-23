<form name="form-modalidade" id="form-modalidade" method="POST" action="{{ route('modalidades.store') }}">
    @method('POST')
    @csrf
    <div class="row">
        <div class="col-lg-3">
            <div class="md-form row-form-group mb-3">
                <label for="duracao" class="form-control-label">Duração:</label>
                <br>
                <small>Horas</small>
                <input type="number" min="0" max="24" required id="horas" name="horas" class="form-control form-control-sm">
                <small>Minutos</small>
                <input type="number" min="0" max="60" required id="minutos" name="minutos" class="form-control form-control-sm">
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="md-form row-form-group mb-3">
                <label for="valor" class="form-control-label">Valor:</label>
                <input type="text" id="valor" name="valor" required class="form-control">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="md-form row-form-group mb-3">
                <button id="btn-gerar-salario" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Adicionar
                </button>
            </div>
        </div>
    </div>
</form>
