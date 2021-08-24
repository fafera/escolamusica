@if(!($professor->alunos()->ativos($mes,$ano)->isEmpty()))
    @foreach($professor->alunos()->ativos($mes,$ano) as $aluno)
        @if(isset($aluno))
            <div class="content-aluno" id="content_aluno_{{$aluno->id}}" style="margin-bottom: 70px;">
                <h5 class="font-weight-bold">{{$aluno->nome}} - {{$aluno->matriculaFromProfessor($professor->id)->modalidade->duracaoBRTime}} - {{$aluno->matriculaFromProfessor($professor->id)->curso->titulo}}</h5>
                <hr>
                <div id="box_aulas_aluno_{{$aluno->id}}">
                @foreach($aluno->aulas()->doMes($mes,$ano)->merge($aluno->aulasTeste()->doMes($mes,$ano))->sortBy('data') as $aula)
                    @component('components.aulas.detalhe-aula', ['aula' => $aula])

                    @endcomponent

                @endforeach
                </div>
                <a href="#" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#aulas-modal-add-{{$aluno->id}}">
                    <span><i class="fa fa-plus"></i> Adicionar aula</span>
                </a>
                @component('components.aulas.modal-add', ['aluno' => $aluno, 'professor' => $professor, 'mes'=> $mes, 'ano' => $ano])

                @endcomponent
            </div>
        @endif
    @endforeach
@else
    <small>Nenhum aluno com matrícula ativa encontrado!</small>
@endif

@if(!$professor->matriculasLiberadas->isEmpty()) 
    @foreach($professor->matriculasLiberadas as $matricula)
        <div class="content-aluno" id="content_aluno_{{$matricula->matricula->aluno->id}}" style="margin-bottom: 70px;">
            <h5 class="font-weight-bold">{{$matricula->matricula->aluno->nome}} - {{$matricula->matricula->modalidade->duracaoBRTime}} - {{$matricula->matricula->curso->titulo}}</h5>
            <hr>
            <div id="box_aulas_aluno_{{$matricula->matricula->aluno->id}}">
            @foreach($matricula->matricula->aluno->aulas()->doMes($mes,$ano) as $aula)
                @component('components.aulas.detalhe-aula', ['aula' => $aula])

                @endcomponent

            @endforeach
            </div>
            <a href="#" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#aulas-modal-add-{{$matricula->matricula->aluno->id}}">
                <span><i class="fa fa-plus"></i> Adicionar aula</span>
            </a>
            @component('components.aulas.modal-add', ['aluno' => $matricula->matricula->aluno, 'professor' => $professor, 'matricula'=> $matricula,  'mes'=> $mes, 'ano' => $ano])

            @endcomponent
        </div>
    @endforeach


@endif
