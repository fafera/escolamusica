@extends('layouts.app')
@section('content')
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
                        <a class="nav-item nav-link nav-tab active" id="dados" href="#">Dados cadastrais</a>
                        {{-- <a class="nav-item nav-link" id="responsavel" href="#">Responsável Financeiro</a> --}}
                        <a class="nav-item nav-link nav-tab" id="matriculas" href="#">Matrículas</a>
                        {{-- <a class="nav-item nav-link" id="cobrancas" href="#">Cobranças</a> --}}
                    @endif
                    <a class="nav-item nav-link" id="aulas" href="#">Aulas</a>
                </div>
            </nav>
        </div>
    </div>
</div>
<div class="tab-content">
    <input type="hidden" id="id_aluno" value={{$aluno->id}}>
    <div id="tab-append">
        @component('components.alunos.dados', ['aluno' => $aluno])

        @endcomponent

    </div>
</div>
@endsection
@push('scripts')
$('#btn-submit').on('click',function(event) {
    $('#form-alunos').submit();
});
$('.nav-tab').on('click', function(event) {
    $('.nav-tab').removeClass('active');
    var tab = $(this);
    event.preventDefault();
    jQuery.ajax({
        url: "{{ url('/alunos/gettab') }}",
        method: 'post',
        data: {
            id: $('#id_aluno').val(),
            tabName: $(this).attr('id'),
        },
        success: function(result){
            tab.addClass('active');
            $('#tab-append').html(result);
        }
    });
});



@endpush