<table>
    <thead>
    <tr>
        <th>Aluno</th>
        <th>Modalidade</th>
        <th>Aulas realizadas</th>
        <th>Porcentagem</th>
        <th>Valor professor</th>
        <th>Valor escola</th>
    </tr>
    </thead>
    <tbody>
    @foreach($invoices as $invoice)
        <tr>
            <td>{{ $invoice->name }}</td>
            <td>{{ $invoice->email }}</td>
        </tr>
    @endforeach
    </tbody>
</table>