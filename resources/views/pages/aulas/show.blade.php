@extends('layouts.app')
@section('content')
<h4 class="font-weight-bold m-0 mb-2">{{$aula->aluno->nome}}</h4>
<input type="hidden" id="show-id-aula" value="{{$aula->id}}">
<p class="mb-4">
    Data: {{$aula->dataBR}}
    <br>
    Tipo: {{$aula->tipo}}
    <br>
    Professor: {{$aula->professor->nome}}
</p>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Descrição</h6>
            </div>
            <div class="card-body">
              {!! $aula->descricao !!}
            </div>
        </div>

    </div>

</div>
@endsection