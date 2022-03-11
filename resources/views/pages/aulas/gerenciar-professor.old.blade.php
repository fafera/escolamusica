@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-8 offset-1">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-4 text-center my-auto">
                            <h4 class="font-weight-bold m-0">Aulas</h4>
                        </div>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="hidden" id="id_professor" value="{{$professor->id}}"}}>
                                <label class="col-sm-2"for="data_referencia">Selecione o mês:</label>
                                <input class="form-control" type="month" name="data_referencia" id="data_referencia" value="{{date('Y-m')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="max-height: 1000px; overflow-y: scroll;" id="lista-aulas">
                    @component('components.aulas.lista-aulas',['professor' => $professor, 'mes' => "{{date('m')}}", 'ano' => "{{date('Y')}}"])
                        
                    @endcomponent
                    
                </div>
            </div>
            
        </div>
        <div class="col-sm-2">
            <div class="card">
                <div class="card-header">
                    <h4 class="font-weight-bold m-0">Alunos</h4><small><a href="#">Classificar por ordem alfabética ↑↓</a></small>
                </div>
                <div id="lista-alunos" class="card-body list-card">
                @component('components.aulas.lista-alunos', ['professor' => $professor, 'mes' => "{{date('m')}}", 'ano' => "{{date('Y')}}"])
                    
                @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    $('#data_referencia').on('change', function(e){ 
        e.preventDefault();
        jQuery.ajax({
            url: "{{ url('/professores/get/json') }}",
            method: 'post',
            data: { 
                id_professor: $('#id_professor').val(),
                data_referencia: $(this).val()
            },
            success: function(result){
                console.log(result);
                $('#lista-aulas').html(result['aulas']);
                $('#lista-alunos').html(result['alunos']);
            }
        });
    });
    $('body').on('click', '.btn-add-aula', function(e) {
        e.preventDefault();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        var id_aluno = $(this).parents('.modal').find('form').find('[name=id_aluno]').val();
        var modal = $(this).parents('.modal');

        jQuery.ajax({
            url: "{{ route('aulas.store') }}",
            method: 'post',
            data: $(this).parents('.modal').find('form').serialize(),
            success: function(result){
                modal.modal('toggle');
                $('#box_aulas_aluno_'+id_aluno).append(result);
                console.log(result);
                
            }
        });
    });
    $('body').on('click', '.btn-edit-aula', function(e) {
        e.preventDefault();
        var modal = $(this).parents('.modal');
        var explodeId = modal.attr('id').split('-');
        var idAula = explodeId[3];
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        jQuery.ajax({
            url: "{{ route('aulas.update', '') }}/"+idAula,
            method: 'put',
            data: $(this).parents('.modal').find('form').serialize(),
            success: function(result){
                modal.modal('toggle');
                $('#aula-'+idAula).html(result);
                
                {{-- modal.modal('toggle');
                $('#box_aulas_aluno_'+id_aluno).append(result); --}}
                console.log(result);
                
            }
        });
    });
    $('body').on('click', '.check-info', function(e) {
        var thisObject = $(this);
        var checks = $(this).parents('.modal').find('form').find('.check-info');
        $.each(checks, function (key, obj) {
            if(thisObject.attr('id') != $(obj).attr('id')) {
                $(obj).prop('checked', false);
            }
        });
    });
    $('body').on('click', '.btn-delete-aula', function(e) {
        console.log($(this).attr('id'));
        e.preventDefault();
        var explodeId = $(this).attr('id').split('-');
        var idAula = explodeId[2];
        if (confirm('Você realmente deseja deletar esta aula?')) {
            jQuery.ajax({
                url: "{{ route('aulas.destroy', '') }}/"+idAula,
                method: 'delete',
                success: function(result){
                    $('#aula-'+idAula).remove();
                    console.log(result);
                    
                }
            });
        }
    });
@endpush