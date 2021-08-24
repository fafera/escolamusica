$('#data').datepicker();
$('.value-field').mask('#.##0,00', {reverse: true});
$('.cobranca-table-row').on('click', function() {
  window.open($(this).data("href"));
});
$('#btn-delete-cobranca').on('click', function(event) {
    if (confirm('Você realmente deseja deletar esta cobrança?')) {
        $('#form-delete-cobranca').submit();
    }
    return false;
});
$('a[name="btn-delete-pagamento"]').on('click', function(event) {
    if (confirm('Você realmente deseja deletar este pagamento?')) {
        $(this).parent('form').submit();
    }
    return false;
});
$('#btn-edit-cobranca').on('click', function(){
  $('#form-edit-cobranca').submit();
});
$('#aluno').on('change', function(event) {
    event.preventDefault();
    $.ajax({
        url: $(this).data('verify'),
        type: 'post',
        data: {
            id_aluno: $(this).val()
        },
        success: function (data) {
            if(data.length > 0) {
                $('#matriculas-row').show();
                $('#matricula').append('<option value="">Selecione a matrícula:</option>');
                $(data).each(function(index, element) {
                    $('#matricula').append('<option value="'+this.id+'">'+this.dia_da_semana+' - '+this.horario+'</option>')
                });
            }
        }
    });
});
var table = $('#cobrancas-table').DataTable({
    lengthChange: false,
    dom: 'Bfrtip',
    buttons: [
        {
            text: 'Adicionar cobrança',
            action: function ( e, dt, node, config ) {
              window.open($('#route-add-cobranca').data('url'));
            }
        }
    ]
});