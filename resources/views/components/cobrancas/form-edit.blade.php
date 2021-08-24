<form name="form-cobranca" id="form-edit-cobranca" method="POST" action="{{ route('cobrancas.update', $cobranca->id) }}">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-lg-4">
            <div class="md-form row-form-group mb-3">
                <label for="aluno" class="form-control-label">Aluno:</label>
                <input type="hidden" name="id_aluno" class="form-control" value="{{$cobranca->aluno->id}}">
                <input type="text" disabled="disabled" class="form-control" value="{{$cobranca->aluno->nome}}">
            </div>
        </div>
        @isset($cobranca->matricula)
        <div class="col-lg-4">
            <div class="md-form row-form-group mb-3">
                <label for="aluno" class="form-control-label">Matrícula:</label>
                <select name="id_matricula" id="matricula" class="form-control">
                    @foreach($cobranca->aluno->matriculas as $matricula)
                        <option @if($cobranca->id_matricula == $matricula->id) {{'selected'}} @endif value="{{$matricula->id}}">{{$matricula->dia_da_semana}} - {{$matricula->horario}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @endisset
        <div class="col-lg-4">
            <div class="md-form row-form-group mb-3">
                <label for="data" class="form-control-label">Data:</label>
                <input type="text" name="data" id="data" class="form-control" value="{{$cobranca->dataBR}}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="md-form row-form-group mb-3">
                <label for="aluno" class="form-control-label">Valor:</label>
                <input type="text" name="valor" id="valor" class="form-control value-field" value="{{$cobranca->valor}}">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="md-form row-form-group mb-3">
                <label for="aluno" class="form-control-label">Tipo:</label>
                <select name="tipo" id="tipo" class="form-control">
                    <option @if($cobranca->tipo == 'matricula') {{ 'selected'}} @endif value="matricula">Taxa de matrícula</option>
                    <option @if($cobranca->tipo == 'aula') {{ 'selected'}} @endif  value="aula">Aula</option>
                    <option @if($cobranca->tipo == 'multa') {{ 'selected'}} @endif  value="multa">Multa</option>
                </select>
            </div>
        </div>
    </div>
</form>
<div class="row">
    <div class="col-lg-8">
        <div class="md-form row-form-group mb-3">
            <button id="btn-edit-cobranca" class="btn btn-primary">
                <i class="fa fa-dot-circle-o"></i> Salvar alterações
            </button>
        </div>
    </div>
    <div class="col-lg-4">
        <form id="form-delete-cobranca" action="{{route('cobrancas.destroy', $cobranca->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button id="btn-delete-cobranca" class="btn btn-danger float-right">
                <i class="fa fa-trash"></i> Excluir cobranca
            </button>
        </form>
    </div>
</div>