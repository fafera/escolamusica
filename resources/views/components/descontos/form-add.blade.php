<form name="form-desconto" id="form-add-desconto" method="POST" action="{{ route('descontos.store') }}">
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
        <div class="col-lg-12">
            <div class="md-form row-form-group mb-3">
                <label for="motivo" class="form-control-label">Motivo:</label>
                <input type="text" name="motivo" class="form-control">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="md-form row-form-group mb-3">
                <label for="valor" class="form-control-label">Valor:</label>
                <input type="text" name="valor" id="valor" class="form-control">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="md-form row-form-group mb-3">
                <button id="btn-add-desconto" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Adicionar
                </button>
            </div>
        </div>
    </div>
</form>
