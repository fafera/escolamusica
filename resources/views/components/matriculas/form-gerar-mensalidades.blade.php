<form name="form-gerar-mensalidades" id="form-gerar-mensalidades" method="POST" action="{{ route('matriculas.gerarMensalidades') }}">
    @method('POST')
    @csrf
    <div class="row">
        <div class="col-lg-3">
            <div class="md-form row-form-group mb-3">
                <label for="mes" class="form-control-label">Mês:</label>
                <input type="text" name="mes" class="form-control">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="md-form row-form-group mb-3">
                <label for="ano" class="form-control-label">Ano:</label>
                <input type="text" name="ano" class="form-control">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="md-form row-form-group mb-3">
                <button id="btn-gerar-mensalidades" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Gerar
                </button>
            </div>
        </div>
    </div>
</form>
