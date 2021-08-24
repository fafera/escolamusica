<div class="row">
    <div class="col-md-12">
        <table id="aulas-table" class="table table-striped table-bordered data-table">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Professor</th>
                    <th>Tipo</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($aluno->aulas->merge($aluno->aulasTeste) as $aula)
                <tr class="aula-table-row" @isset($aula->matricula)data-href="{{route('aulas.show', $aula->id)}}" @else data-href="{{route('aulas.showAulaTeste', $aula->id)}}" @endisset>
                    <td> {{$aula->data}}</a></td>
                    @isset($aula->matricula)
                    <td> {{$aula->matricula->professor->nome}}</a></td>
                    @else
                    <td> {{$aula->professor->nome}}</a></td>
                    @endisset
                    
                    <td> {{$aula->tipo}}</a></td>
                    <td> {{$aula->status}}</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@push('scripts_src')
    <script src="{{asset('js/sections/aulas.js')}}"></script>
@endpush