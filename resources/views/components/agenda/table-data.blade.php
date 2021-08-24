@foreach ($agenda as $horario)
  <tr>
    @isset ($horario['matricula'])
      <td class="table-data-horario">{{$horario['matricula']['horario']}}</td>
      <td class="table-data-status"><span class="badge badge-pill badge-info">Matrícula</span></td>
      <td class="table-data-descricao">
        <div class="div-descricao">
          <b>{{$horario['matricula']['aluno']->nome}}</b> - {{$horario['matricula']['info']->curso->titulo}} -  <span class="badge badge-pill badge-warning">{{$horario['matricula']['info']->modalidade->duracaoBRTime}}</span>
        </div>
      </td>
      <td class="table-data-acao"><a href="{{route('matriculas.show', $horario['matricula']['info']->id)}}" target="_blank"><i class="fa fa-pen" aria-hidden="true"></i> Editar matrícula</a></td>
    @else
      <td class="table-data-horario">{{$horario['vaga']['horario']}}</td>
      <td class="table-data-status"><span class="badge badge-pill badge-success">Vaga</span></td>
      <td class="table-data-descricao">
        <div class="div-descricao">
          @foreach($horario['vaga']['limites'] as $limite)
            <span class="badge badge-pill badge-success">{{$limite['duracao']}}</span>
          @endforeach
        </div>
      </td>
      <td class="table-data-acao"><a href="{{route('matriculas.create')}}" target="_blank"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar matrícula</a></td>
    @endisset
  </tr>
@endforeach
