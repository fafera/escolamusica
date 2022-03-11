<table id="informes-professor-table" class="table table-striped table-bordered">
  <thead>
      <tr>
        <th>Aluno</th>
        <th>Modalidade</th>
        <th>Quantidade de aulas realizadas</th>
        <th>Porcentagem professor</th>
        <th>Valor</th>
        <th>Valor escola</th>
      </tr>
  </thead>
  <tbody>
    @php $informesEscola = 0; @endphp
      @foreach($salario->informesProfessor as $informe)
        @isset($informe->mensalidade)
          <tr {{-- style="cursor: pointer;" class="informe-table-row" data-href="#" --}}>
            <td>{{$informe->mensalidade->matricula->aluno->nome}}</td>
            <td>{{$informe->mensalidade->matricula->modalidade->duracaoBRTime}}</td>
            <td>{{$informe->qtd_aulas_realizadas}}</td>
            <td>{{$informe->mensalidade->matricula->porcentagem_professor}}%</td>
            <td>{{$informe->valorBRL}}</td>
            <td>{{$informe->mensalidade->informeEscola->valorBRL}}</td>
          </tr>
          @php $informesEscola = $informesEscola + $informe->mensalidade->informeEscola->valor; @endphp
        @else
        <tr {{-- style="cursor: pointer;" class="informe-table-row" data-href="#" --}}>
          <td>{{$informe->aulaTeste->aluno->nome}}</td>
          <td>{{$informe->aulaTeste->modalidade->duracaoBRTime}}</td>
          <td>Aula teste</td>
          <td>{{$informe->aulaTeste->porcentagem_professor}}%</td>
          <td>{{$informe->valorBRL}}</td>
          <td>{{$informe->aulaTeste->informeEscola->valorBRL}}</td>
        </tr>
        @php $informesEscola = $informesEscola + $informe->aulaTeste->informeEscola->valor; @endphp
        @endisset
      @endforeach
      <tr>
        <td colspan="3"></td>
        <td><b>{{$salario->informesProfessor->count()}} alunos</b></td>
        <td><b>{{ $salario->valorBRL}}</b></td>
        <td><b>{{App\Helpers\FinancialHelper::formatToBRL($informesEscola)}}</b></td>
      </tr>
  </tbody>
</table>
<span style="float: right;">{{$salario->informesProfessor->count()}} alunos - Total: {{ $salario->valorBRL}}</span>