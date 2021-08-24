<div class="modal fade" name="modal-edit-aula-teste" id="aula-teste-modal-edit-{{$aula->id}}" tabindex="-1" role="dialog" aria-labelledby="EditarAula"
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
                    <input type="hidden" id="flag_aula_teste" value="true">
                    <input type="hidden" name="id_aluno" value="{{$aula->aluno->id}}">
                    <input type="hidden" name="id_professor" value="{{$aula->professor->id}}">
                    <div class="md-form form-group mb-2">
                        <label for="aluno">Aluno:</label>
                        <input type="text" disabled class="form-control" value="{{$aula->aluno->nome}}">
                    </div>
                    <div class="md-form form-group mb-2">
                        <label for="aluno">Tipo:</label>
                        <input type="text" name="tipo" readonly="readonly" class="form-control" value="{{$aula->tipo}}">
                    </div>
                    <div class="md-form form-group mb-2">
                        <label for="data">Data:</label>
                        <input type="text" name="data" class="form-control datepicker" value="{{$aula->dataBR}}">
                    </div>
                    <div class="md-form form-group mb-5 ckeditor-content">
                        <label for="descricao">Descrição da aula:</label>
                        <textarea class="form-control" name="descricao" id="descricao_aula_teste{{$aula->id}}" cols="30" rows="10">{!!$aula->descricao!!}</textarea>
                        <script>CKEDITOR.replace('descricao_aula_teste{{$aula->id}}')</script>
                    </div>
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-success btn-edit-aula">Salvar</button>
                <button name="delete-aula-teste" id="delete-aula-{{$aula->id}}" data-url="{{route('aulas.destroy', $aula->id)}}" class="btn btn-danger btn-delete-aula">Deletar</button>
            </div>
        </div>
    </div>
</div>

