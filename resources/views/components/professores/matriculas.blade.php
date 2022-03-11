<div class="row">
    <div class="col-md-12">
        <input type="hidden" id="route-add-matricula" value="{{route('matriculas.create')}}">
        <div class="table-responsive">
            <table id="matriculas-table" class="table table-striped table-bordered data-table">
                <thead>
                    <tr>
                        <th scope="col">Dia da semana</th>
                        <th scope="col">Horário</th>
                        <th scope="col">Aluno</th>
                        <th scope="col">Curso</th>
                        <th scope="col">Duração</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($professor->matriculas()->ativas() as $matricula)
                        <tr class="matricula-table-row" data-href="{{route('matriculas.show', $matricula->id)}}">
                            <td> {{$matricula->dia_da_semana}}</td>
                            <td> {{$matricula->horario}}</td>
                            <td style="width: 45%"> {{$matricula->aluno->nome}}</td>
                            <td> {{$matricula->curso->titulo}}</td>
                            <td> {{$matricula->modalidade->duracao}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@push('scripts_src')
<script src="{{asset('js/sections/matricula.js')}}"></script>
@endpush