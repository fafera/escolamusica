$('.modalidade-table-row').on('click', function() {
    window.open($(this).data("href"));
  });
  var table = $('#modalidades-table').DataTable({
    lengthChange: false,
    dom: 'Bfrtip',
    buttons: [
        {
            text: 'Adicionar modalidade',
            action: function ( e, dt, node, config ) {
            window.open($('#route-add-modalidade').val());
            }
        }
    ]
});
$('#valor').mask('#.##0,00', {reverse: true});
$('#btn-edit-modalidade').on('click', function(){
    $('#form-edit-modalidade').submit();
  });
$('#btn-delete-modalidade').on('click', function(event) {
    if (confirm('Você realmente deseja deletar esta modalidade?')) {
        $('#form-delete-modalidade').submit();
    }
    return false;
});