<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
@foreach($info as $infoAluno)
    <h1>{{$infoAluno->nome}} @isset($infoAluno->curso) - {{$infoAluno->curso}} - {{$infoAluno->duracao}} @endisset </h1>
    @foreach($infoAluno->aulas as $aula)
        <span><b>{{$aula->data}} - {{$aula->status}}</b></span>
        <br>
        {!!$aula->descricao!!}
    @endforeach
    <div style='page-break-after:always;'></div>
@endforeach