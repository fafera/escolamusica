<div class="row">
    <div class="col-md-12">
        <input type="hidden" id="route-add-matricula" value="{{route('matriculas.createFromId', $aluno->id)}}">
        <table id="matriculas-table" class="table table-striped table-bordered data-table">
            <thead>
                <tr>
                    <th>Dia da semana</th>
                    <th>Horário</th>
                    <th>Curso</th>
                    <th>Duração</th>
                    <th>Professor</th>
                </tr>
            </thead>
            <tbody>
                @foreach($aluno->matriculas as $matricula)
                    <tr class="matricula-table-row" data-href="{{route('matriculas.show', $matricula->id)}}">
                        <td> {{$matricula->dia_da_semana}}</a></td>
                        <td> {{$matricula->horario}}</a></td>
                        <td> {{$matricula->curso->titulo}}</a></td>
                        <td> {{$matricula->modalidade->duracao}}</a></td>
                        <td> {{$matricula->professor->nome}}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@push('scripts_src')
    <script src="{{asset('js/sections/matricula.js')}}"></script>
@endpush