<div id="modal-add-matricula" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Adicionar matrícula - {{$aluno->nome}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body mx-3">
            <form id="form-add-matricula" method="POST" action="{{ route('alunos.storeMatricula') }}">
                @csrf
                <div class="md-form row-form-group mb-3">
                    <label for="dia_da_semana" class="form-control-label">Dia da Semana:</label>
                    @component('components.form.weekdays')
                        
                    @endcomponent
                </div>
                <div class="md-form row-form-group mb-3">
                    <label for="curso" class="form-control-label">Curso:</label>
                    <select name="id_curso" id="curso" class="form-control">
                        <option value="">Selecione o curso:</option>
                        @foreach($cursos as $curso)
                            <option value="{{$curso->id}}">{{$curso->titulo}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md-form row-form-group mb-3">
                    <label for="modalidade" class="form-control-label">Modalidade:</label>
                    <select name="id_modalidade" id="modalidade" class="form-control">
                        <option value="">Selecione a duração:</option>
                        @foreach($modalidades as $modalidade)
                            <option value="{{$modalidade->id}}">{{$modalidade->duracao}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md-form row-form-group mb-3">
                    <label for="professor" class="form-control-label">Professor:</label>
                    <select name="id_professor" id="professor" class="form-control">
                        <option value="">Selecione o professor:</option>
                        @foreach($professores as $professor)
                            <option value="{{$professor->id}}">{{$professor->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md-form row-form-group mb-3">
                    <label for="horario" class="form-control-label">Horário:</label>
                    <input type="text" name="horario" id="horario" class="form-control">
                </div>
                
                <div class="md-form row-form-group mb-3">
                    <label for="valor" class="form-control-label">Valor:</label>
                    <input type="text" name="valor" id="valor" class="form-control">
                </div>
                <div class="md-form form-check mb-1">
                    <input type="checkbox" name="desconto" id="desconto" class="form-check-input">
                    <label for="desconto" class="form-check-label">Possui desconto?</label>
                </div>
                <div class="md-form row-form-group mb-3" id="motivo-div" style="display: none;">
                    <label for="desconto" class="form-control-label">Motivo do desconto:</label>
                    <input type="text" name="motivo" id="motivo" class="form-control">
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>