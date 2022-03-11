<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary col-sm-2 float-right">Adicionar aula</button>

            </div>
            <div class="card-body">
                <table id="aulas-table" class="table table-striped table-bordered data-table">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Aluno</th>
                            <th>Tipo</th>
                            <th>Status</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($professor->aulas as $aula)
                        <tr>
                            <td> {{$aula->data}}</a></td>
                            <td> {{$aula->matricula->aluno->nome}}</a></td>
                            <td> {{$aula->tipo}}</a></td>
                            <td> {{$aula->status}}</a></td>
                            <td style="text-align: center">
                                <form id="delete" action="{{route('aulas.destroy', $aula->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" id="{{$aula->id}}" class="edit-curso" data-toggle="modal" data-target="#modal-editcurso-{{$aula->id}}"><i class="fa fa-edit"></i></a>
                                    <a href="#" id="btn-delete-curso" class="delete-item"><i class="fa fa-trash"></i></a>
                                </form>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>