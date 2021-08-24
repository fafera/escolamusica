<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="aulas-table" class="table table-striped table-bordered data-table">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Aluno</th>
                        <th>Tipo</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($professor->aulas as $aula)
                    <tr class="aula-table-row" data-href="{{route('aulas.show', $aula->id)}}">
                        <td> {{$aula->dataBR}}</a></td>
                        <td> {{$aula->matricula->aluno->nome}}</a></td>
                        <td> {{$aula->tipo}}</a></td>
                        <td> {{$aula->status}}</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@push('scripts_src')
<script src="{{asset('js/sections/aulas.js')}}"></script>
@endpush