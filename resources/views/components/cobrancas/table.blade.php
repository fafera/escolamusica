<table id="mensalidades-table" class="table table-striped table-bordered">
  <thead>
      <tr>
          <th>Vigência</th>
          <th>Valor</th>
          <th>Aluno</th>
          <th>Vencimento</th>
          <th>Status</th>
      </tr>
  </thead>
  <tbody>
      @foreach($mensalidades as $mensalidade)
      <tr style="cursor: pointer;" class="mensalidade-table-row" data-href="{{route('mensalidades.show', $mensalidade->id)}}">
        <td>{{$mensalidade->mes}}/{{$mensalidade->ano}}</td>
        <td>{{$mensalidade->valorFormatado}}</td>
        <td>{{$mensalidade->matricula->aluno->nome}}</td>
        <td>{{$mensalidade->vencimentoDataBR}}</td>
        <td>{{$mensalidade->statusFormatado}}</td>
      </tr>
      @endforeach
  </tbody>
</table>