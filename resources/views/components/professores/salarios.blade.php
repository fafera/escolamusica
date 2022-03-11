<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="salarios-table" class="table table-striped table-bordered data-table">
                <thead>
                    <tr>
                        <th scope="col">Mês</th>
                        <th scope="col">Ano</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($professor->salarios as $salario)
                        <tr>
                            <td> {{$salario->mes}}</td>
                            <td> {{$salario->ano}}</td>
                            <td> {{$salario->valor}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@push('scripts')
$('#salarios-table').DataTable({
    lengthChange: false,
    searching: false
});
@endpush