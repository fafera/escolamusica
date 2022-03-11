<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                {{-- <button id="add-matricula" data-toggle="modal" data-target="modal-add-matricula" class="btn btn-primary col-sm-2 float-right">Adicionar matrícula</button> --}}
                <a href="{{route('matriculas.create')}}" target="_blank" id="add-matricula" class="btn btn-primary col-sm-2 float-right">Adicionar matrícula</a>
            </div>
            <div class="card-body">
                <table id="matriculas-table" class="table table-striped table-bordered data-table">
                    <thead>
                        <tr>
                            <th>Dia da semana</th>
                            <th>Horário</th>
                            <th>Aluno</th>
                            <th>Curso</th>
                            <th>Duração</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($professor->matriculas as $matricula)
                            <tr>
                                <td> {{$matricula->dia_da_semana}}</td>
                                <td> {{$matricula->horario}}</td>
                                <td> {{$matricula->aluno->nome}}</td>
                                <td> {{$matricula->curso->titulo}}</td>
                                <td> {{$matricula->modalidade->duracao}}</td>
                                <td style="text-align: center">
                                <a href="#" id="btn-modal-matricula" name="{{$matricula->id}}" class="edit-curso" data-toggle="modal" data-target="#modal-matricula-{{$matricula->id}}"><i class="fa fa-edit"></i></a>
                                <a href="#" id="btn-delete-matricula" name="{{$matricula->id}}" class="delete-item delete-matricula-btn"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @component('components.matriculas.modal-edit', ['matricula' => $matricula])
                        
                            @endcomponent
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>