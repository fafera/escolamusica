@extends('layouts.app')
@section('content')
<h4 class="font-weight-bold m-0 mb-4">{{$aluno->nome}}</h4>
<input type="hidden" id="show-id-aluno" value="{{$aluno->id}}">
<div id="dados-cadastrais-row" class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Dados Cadastrais</h6>
            </div>
            <div class="card-body">
                @component('components.alunos.dados', ['aluno' => $aluno])

                @endcomponent
            </div>
        </div>
    </div>
</div>
<div id="matriculas-row" class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Matrículas</h6>
            </div>
            <div class="card-body">
                @component('components.alunos.matriculas', ['aluno' => $aluno])

                @endcomponent
            </div>
        </div>
    </div>
</div>
<div id="aulas-row" class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Aulas</h6>
            </div>
            <div class="card-body">
                @component('components.alunos.aulas', ['aluno' => $aluno])

                @endcomponent
            </div>
        </div>
    </div>
</div>
<div id="mensalidades-row" class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Mensalidades</h6>
            </div>
            <div class="card-body">
                @component('components.alunos.mensalidades', ['aluno' => $aluno])

                @endcomponent
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts_src')
    <script src="{{asset('js/sections/aluno.js')}}"></script>
@endpush