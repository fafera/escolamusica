var table = $('#descontos-table').DataTable({
    lengthChange: false,
    dom: 'Bfrtip',
    buttons: [
        {
            text: 'Adicionar desconto',
            action: function ( e, dt, node, config ) {
              window.open($('#route-add-desconto').val());
            }
        }
    ]
});
$('#valor').mask('#.##0,00', {reverse: true});
$('.descontos-table-row').on('click', function() {
    window.open($(this).data("href"));
});
$('#btn-delete-desconto').on('click', function(event) {
    if (confirm('Você realmente deseja deletar este desconto?')) {
        $('#form-delete-desconto').submit();
    }
    return false;
});
$('#btn-edit-desconto').on('click', function(){
  $('#form-edit-desconto').submit();
});