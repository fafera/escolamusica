<div class="row">
    <div class="col-md-12">
        <table id="mensalidades-table" class="table table-striped table-bordered data-table">
            <thead>
                <tr>
                    <th>Mês</th>
                    <th>Ano</th>
                    <th>Vencimento</th>
                    <th>Valor</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($aluno->mensalidades as $mensalidade)
                    <tr class="mensalidade-table-row" data-href="{{route('mensalidades.show', $mensalidade->id)}}">
                        <td> {{$mensalidade->mes}}</a></td>
                        <td> {{$mensalidade->ano}}</a></td>
                        <td> {{$mensalidade->vencimento}}</a></td>
                        <td> {{$mensalidade->valor}}</a></td>
                        <td> {{$mensalidade->status}}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@push('scripts_src')
    <script src="{{asset('js/sections/mensalidade.js')}}"></script>
@endpush