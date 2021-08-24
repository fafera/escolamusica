// $('#data_referencia').datepicker({
//   changeMonth: true,
//   changeYear: true,
//   showButtonPanel: true,
//   dateFormat: 'MM yy',
//   onClose: function(dateText, inst) {
//       $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
//   }

// });
$(".aula-table-row").click(function() {
  window.open($(this).data("href"));
});
$('#aulas-table').DataTable({
    lengthChange: false
});
$('#horario').mask('00h00');
$('#valor').mask('#.##0,00', {reverse: true});
$('#porcentagem_professor').mask('000');
$('input[name="data"]').datepicker({
});
// $('#data_referencia').MonthPicker({ StartYear: 2021});
$('#data_referencia').datepicker( {
  format: 'mm/yyyy',
  minViewMode: 'months',
  changeMonth: true,
  changeYear: true,
  autoclose: true
});

$('#icon-calendar').on('click', function() {
    $('#data_referencia').datepicker('show');
})

// gerenciamento aulas
  $('#id_professor').on('change', function(e){
    e.preventDefault();
    jQuery.ajax({
        url: $('#json_url').data('url'),
        method: 'post',
        data: {
            id_professor: $(this).val(),
            data_referencia: $('#data_referencia').val()
        },
        success: function(result){
            $('#lista-aulas').html(result['aulas']);
            $('#lista-alunos').html(result['alunos']);
            $('#lista-aulas-teste').html(result['aulas_teste']);
        }
    });
  });
  $('#tipo').on('change', function(e){ 
    if($(this).val() == 'recuperacao') {
        e.preventDefault();
        jQuery.ajax({
            url: $('#json_mensalidades_url').val(),
            method: 'post',
            data: {
                id_aluno: $('#aluno').val(),
                
            },
            success: function(result){
                $('#mensalidade').html('<option value="">Selecione:</option>');
                $(result).each(function(index, content) {
                    $('#mensalidade').append('<option value="'+content['id']+'">'+content['mes']+'/'+content['ano']+'</option>')
                });
                console.log(result);
            }
        });
        $('#row-mensalidades').show();
    } else {
        $('#row-mensalidades').hide();
    }
  });
  $('#data_referencia').on('change', function(e){
    e.preventDefault();
    jQuery.ajax({
        url: $('#json_url').data('url'),
        method: 'post',
        data: {
            id_professor: $('#id_professor').val(),
            data_referencia: $(this).val()
        },
        success: function(result){
            $('#lista-aulas').html(result['aulas']);
            $('#lista-alunos').html(result['alunos']);
            $('#lista-aulas-teste').html(result['aulas_teste']);
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
        url: $(this).parents('.modal').find('form').attr('action'),
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
        url: $(this).parents('.modal').find('form').attr('action'),
        method: 'put',
        data: $(this).parents('.modal').find('form').serialize(),
        success: function(result){
            if(result['message_aula_teste'] != null) {
                alert(result['message_aula_teste']);
                location.reload();
            } else {
                console.log(result);
                modal.modal('toggle');
                $('#aula-'+idAula).html(result);
            }
        }
    });
  });
  $('body').on('click', '.check-info', function(e) {
    var thisObject = $(this);
    var checks = $(this).parents('.modal').find('form').find('.check-info');
    $.each(checks, function (key, obj) {
        if(thisObject.attr('name') != $(obj).attr('name')) {
            $(obj).prop('checked', false);
        }
        if(thisObject.attr('name') == 'status') {

        }
    });
  });
  $("input[name='status']").change(function() {
    if(this.checked) {
        $('#status_default').attr('disabled', true);
    } else {
        $('#status_default').attr('disabled', false);
    }
  });
  $('body').on('click', '.btn-delete-aula', function(e) {
    console.log($(this).attr('id'));
    e.preventDefault();
    var explodeId = $(this).attr('id').split('-');
    var idAula = explodeId[2];
    if (confirm('Você realmente deseja deletar esta aula?')) {
        jQuery.ajax({
            url: $(this).data('url'),
            data: {tipo: $(this).attr('name')},
            method: 'delete',
            success: function(result) {
                if($(this).attr('name') == 'btn-delete-aula')
                    $('#aula-'+idAula).remove();
                alert('Aula excluída com sucesso!');
            }
        });
    }
  });