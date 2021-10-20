@extends('layouts.app')
@section('content')
<h4 class="font-weight-bold m-0 mb-2">{{$professor->nome}}</h4>
<input type="hidden" id="user_role" value="{{Auth::user()->role}}">
<input type="hidden" id="show-id-professor" value="{{$professor->id}}">
<p class="mb-4">
    Total de matrículas ativas: {{count($professor->matriculas()->ativas())}}
</p>
@if(Auth::user()->role == 'admin')
<div id="dados-cadastrais-row" class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Dados Cadastrais</h6>
            </div>
            <div class="card-body">
                @component('components.professores.dados', ['professor' => $professor])

                @endcomponent
            </div>
        </div>
    </div>
</div>
@endif
<div id="agenda-row" class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Agenda</h6>
            </div>
            <div class="card-body">
                @component('components.professores.agenda', ['professor' => $professor, 'diaDaSemana' => 1])

                @endcomponent
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Aulas</h6>
            </div>
            <div class="card-body">
                @component('components.professores.aulas', ['professor' => $professor])

                @endcomponent
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Matrículas</h6>
            </div>
            <div class="card-body">
                @component('components.professores.matriculas', ['professor' => $professor])

                @endcomponent
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Salários</h6>
            </div>
            <div class="card-body">
                @component('components.professores.salarios', ['professor' => $professor])

                @endcomponent
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts_src')
<script src="{{asset('js/sections/professor.js')}}"></script>
@endpush