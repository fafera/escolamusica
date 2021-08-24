@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="font-weight-bold m-0">{{$professor->nome}}</h4>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @if(session('status'))
                <div class="alert alert-{{session('status')}}" role="alert">
                    {{session('message')}}
                </div>
            @endif
            <div class="default-tab">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab">
                        @if(auth()->user()->role == 'admin')
                            <a class="nav-item nav-link @if($component['nav'] == 'dados') {{'active'}}@endif" id="dados" href="{{route('professores.show', $professor)}}">Dados cadastrais</a>
                            {{-- <a class="nav-item nav-link" id="responsavel" href="#">Responsável Financeiro</a> --}}
                            <a class="nav-item nav-link @if($component['nav'] == 'matriculas') {{'active'}}@endif" id="matriculas" href="{{route('professores.matriculas', $professor)}}">Matrículas</a>
                            <a class="nav-item nav-link @if($component['nav'] == 'agenda') {{'active'}}@endif" id="agenda" href="{{route('professores.agenda', [$professor, 1])}}">Agenda</a>
                            {{-- <a class="nav-item nav-link" id="cobrancas" href="#">Cobranças</a> --}}
                        @endif
                        <a class="nav-item nav-link @if($component['nav'] == 'aulas') {{'active'}}@endif" id="aulas" href="{{route('professores.aulas', $professor)}}">Aulas</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="tab-content">
        <input type="hidden" id="id_professor" value={{$professor->id}}>
        <div id="tab-append">
            {!! $component['view'] !!}
        </div>
    </div>
</div>
@endsection
@push('scripts')
$('#btn-submit').on('click',function(event) {
    $('#form-alunos').submit();
});
$('.nav-item').on('click', function(event) {
    $('.nav-item').removeClass('active');
    $(this).addClass('active');
});
$('.delete-matricula-btn').on('click', function(event) {
    console.log($(this).attr('name'));
    if (confirm('Você realmente deseja deletar esta matrícula?')) {
        jQuery.ajax({
            url: "{{ route('matriculas.destroy', '') }}/"+$(this).attr('name'),
            method: 'delete',
            success: function(result){
                location.reload();
            }
        });
    }
});

@endpush