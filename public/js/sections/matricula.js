$(".mensalidade-table-row").click(function() {
  window.open($(this).data("href"));
});
$(".matricula-table-row").click(function() {
  window.open($(this).data("href"));
})
if($('#user_role').val() == 'admin') {
    var table = $('#matriculas-table').DataTable({
        lengthChange: false,
        dom: 'Bfrtip',
        buttons: [
            {
                text: 'Adicionar matrícula',
                action: function ( e, dt, node, config ) {
                window.open($('#route-add-matricula').val());
                }
            }
        ]
    });
}
var dt = new Date(),
    month = dt.getMonth() +1;

$('#mes option:eq('+month+')').prop('selected', true);
$('#horario').mask('00h00');
$('#valor').mask('#.##0,00', {reverse: true});
$('#matricula').mask('#.##0,00', {reverse: true});
$('#vencimento').datepicker({
    format: 'dd/mm/yyyy',
});
$('#porcentagem_professor').mask('00');
$('body').on('change', '#modalidade', function(e) {
  console.log();
    e.preventDefault();
    jQuery.ajax({
        url: $(this).attr('getValorUrl'),
        method: 'post',
        data: {
            id: $(this).val()
        },
        success: function(result){
            $('#valor').val(result);
        }
    });
});
$('body').on('click', '#check-desconto', function(e) {
    if($(this).prop('checked')) {
        $('#desconto-div').show();
        $('#desconto').prop('disabled', false);
        $('#valor_desconto').prop('disabled', false);
    } else {
        $('#desconto-div').hide();
        $('#desconto').prop('disabled', true);
        $('#valor_desconto').prop('disabled', true);
    }
});
$('body').on('click', '#check-matricula', function(e) {
    if($(this).prop('checked')) {
        $('#matricula-div').show();
        $('#matricula').prop('disabled', false);
    } else {
        $('#matricula-div').hide();
        $('#matricula').prop('disabled', true);
    }
});
$('body').on('change', '#dia_da_semana, #mes, #ano', function(e) {
    e.preventDefault();
    jQuery.ajax({
        url: $('#qtd_aulas_previstas').attr('getAulasPrevistasUrl'),
        method: 'post',
        data: {
            dia_da_semana: $('#dia_da_semana').val(),
            ano: $('#ano').val(),
            mes: $('#mes').val()
        },
        success: function(result){
            $('#qtd_aulas_previstas').val(result);
        }
    });
});
$('#btn-edit-matricula').on('click', function(e) {
    $('#form-edit-matricula').submit();
});
$('#btn-submit').on('click', function(e) {
    e.preventDefault();
    jQuery.ajax({
        url: $(this).attr('url'),
        method: 'post',
        data: $('#form-add-matricula').serialize(),
        success: function(result){
            console.log(result);
            if(result['status'] == 'success') { 
                $('#form-add-mensalidade').append('<input type="hidden" name="id_matricula" value="'+result['matricula']['id']+'">');
                $('#form-add-mensalidade').submit();
            } else {
                alert(result['message']);
                window.location.href = result['route']; 
            }
        }
    });
});
$('#btn-delete-matricula').on('click', function(event) {
    if (confirm('Você realmente deseja deletar esta matrícula?')) {
        return true;
    } 
    return false;
});
$('#btn-delete-liberada').on('click', function(event) {
    if (confirm('Você realmente deseja deletar esta liberação?')) {
        $('#form-delete-liberada').submit();
    }
    return false;
});
