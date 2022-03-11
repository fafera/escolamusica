<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                {{-- <button id="add-matricula" data-toggle="modal" data-target="modal-add-matricula" class="btn btn-primary col-sm-2 float-right">Adicionar matrícula</button> --}}
                <a href="{{route('matriculas.createFromId', $aluno->id)}}" target="_blank" id="add-matricula" class="btn btn-primary col-sm-2 float-right">Adicionar matrícula</a>
            </div>
            <div class="card-body">
                <table id="matriculas-table" class="table table-striped table-bordered data-table">
                    <thead>
                        <tr>
                            <th>Dia da semana</th>
                            <th>Horário</th>
                            <th>Curso</th>
                            <th>Duração</th>
                            <th>Professor</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($aluno->matriculas as $matricula)
                            <tr>
                                <td> {{$matricula->dia_da_semana}}</a></td>
                                <td> {{$matricula->horario}}</a></td>
                                <td> {{$matricula->curso->titulo}}</a></td>
                                <td> {{$matricula->modalidade->duracao}}</a></td>
                                <td> {{$matricula->professor->nome}}</a></td>
                                <td style="text-align: center">
                                    <form id="delete" action="{{route('matriculas.destroy', $matricula->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" id="{{$matricula->id}}" class="edit-curso" data-toggle="modal" data-target="#modal-matricula-{{$matricula->id}}"><i class="fa fa-edit"></i></a>
                                        <a href="#" id="btn-delete-curso" class="delete-item"><i class="fa fa-trash"></i></a>
                                    </form>
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
<x-modal-add-matricula :aluno=$aluno></x-modal-add-matricula>