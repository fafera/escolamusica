<div class="modal fade" name="modal-edit-aula" id="aulas-modal-edit-{{$aula->id}}" tabindex="-1" role="dialog" aria-labelledby="EditarAula"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Adicione as informações</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body mx-3">
                <form action="{{route('aulas.update', $aula->id)}}" method="PUT">
                    @csrf
                    <input type="hidden" name="id_aluno" value="{{$aula->aluno->id}}">
                    <input type="hidden" name="id_professor" value="{{$aula->professor->id}}">
                    <input type="hidden" name="id_matricula" value="{{$aula->matricula->id}}">
                    <div class="md-form form-group mb-2">
                        <label for="aluno">Aluno:</label>
                        <input type="text" disabled class="form-control" value="{{$aula->aluno->nome}}">
                    </div>
                    <div class="md-form form-group mb-2">
                        <label for="data">Data:</label>
                        <input type="text" name="data" class="form-control datepicker" value="{{$aula->dataBR}}">
                    </div>
                    <div class="md-form form-group mb-2">
                        <hr>
                        <div class="input-group">
                            <div class="form-check col-lg-6">
                                <input class="form-check-input check-info" type="checkbox" name="status" value="adiada" @if($aula->status == 'adiada') {{'checked'}} @endif>
                                <label class="form-check-label" for="status">Adiada/Remarcar</label>
                            </div>
                            <div class="form-check col-lg-6at-right">
                                <input class="form-check-input check-info" type="checkbox" name="tipo" value="recuperacao" @if($aula->tipo == 'recuperacao') {{'checked'}} @endif>
                                <label class="form-check-label" for="tipo">Recuperacação</label>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="md-form form-group mb-5 ckeditor-content">
                        <label for="descricao">Descrição da aula:</label>
                        <textarea class="form-control" name="descricao" id="descricao_aula_{{$aula->id}}" cols="30" rows="10">{!!$aula->descricao!!}</textarea>
                        {{-- <script>CKEDITOR.replace('descricao_aula_{{$aula->id}}')</script> --}}
                    </div>

                </form>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-primary btn-edit-aula">Editar</button>
            </div>
        </div>
    </div>
</div>

