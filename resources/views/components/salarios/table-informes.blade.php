<table id="informes-professor-table" class="table table-striped table-bordered">
  <thead>
      <tr>
        <th>Aluno</th>
        <th>Modalidade</th>
        <th>Quantidade de aulas realizadas</th>
        <th>Valor</th>

      </tr>
  </thead>
  <tbody>
      @foreach($informes as $informe)
        @isset($informe->mensalidade)
          <tr {{-- style="cursor: pointer;" class="informe-table-row" data-href="#" --}}>
            <td>{{$informe->mensalidade->matricula->aluno->nome}}</td>
            <td>{{$informe->mensalidade->matricula->modalidade->duracaoBRTime}}</td>
            <td>{{$informe->qtd_aulas_realizadas}}</td>
            <td>{{$informe->valorBRL}}</td>
          </tr>
        @else
        <tr {{-- style="cursor: pointer;" class="informe-table-row" data-href="#" --}}>
          <td>{{$informe->aulaTeste->aluno->nome}}</td>
          <td>{{$informe->aulaTeste->modalidade->duracaoBRTime}}</td>
          <td>Aula teste</td>
          <td>{{$informe->valorBRL}}</td>
        </tr>
          
        @endisset
      @endforeach
  </tbody>
</table>