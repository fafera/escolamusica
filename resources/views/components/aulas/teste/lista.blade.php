@if (!$professor->aulasTeste()->doMes($mes, $ano)->isEmpty())
    <table id="aula-teste-table" class="table table-striped table-bordered data-table">
        <thead>
            <tr>
                <th>Aluno</th>
                <th>Data</th>
                <th>Horário</th>
                <th>Tipo</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($professor->aulasTeste()->doMes($mes, $ano) as $aula)
                <tr style="cursor: pointer;" data-toggle="modal"
                    data-target="#aula-teste-modal-edit-{{ $aula->id }}" class="aula-teste-table-row">
                    <td> {{ $aula->aluno->nome }}</td>
                    <td> {{ $aula->dataBR }}</td>
                    <td> {{ $aula->horarioBR }}</td>
                    <td> {{ $aula->tipo }}</td>
                    <td> {{ $aula->status }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @foreach ($professor->aulasTeste()->doMes($mes, $ano) as $aula)
        @component('components.aulas.teste.modal-edit', ['aula' => $aula])
        
        @endcomponent
    @endforeach
@else
    <small>Nenhuma aula encontrada!</small>
@endif
