@if(!($professor->alunos()->ativos($mes,$ano)->isEmpty()))
  @foreach($professor->alunos()->ativos($mes,$ano) as $aluno)
      <p class="hover-aluno"><a class="lista_alunos" id="lista_aluno_{{$aluno->id}}" href="#content_aluno_{{$aluno->id}}" style="text-decoration:none; color: black">{{$aluno->nome}}</a></p>
  @endforeach
@else
  <small>Nenhum aluno com matrícula ativa encontrado!</small>
@endif
@if(!$professor->matriculasLiberadas->isEmpty()) 
  @foreach($professor->matriculasLiberadas as $matricula)
    <p class="hover-aluno"><a class="lista_alunos" id="lista_aluno_{{$matricula->matricula->aluno->id}}" href="#content_aluno_{{$matricula->matricula->aluno->id}}" style="text-decoration:none; color: black">{{$matricula->matricula->aluno->nome}}</a></p>
  @endforeach
    
@endif