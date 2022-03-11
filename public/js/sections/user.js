var table = $('#users-table').DataTable({
    lengthChange: false,
    dom: 'Bfrtip',
    buttons: [
        {
            text: 'Adicionar usuário',
            action: function ( e, dt, node, config ) {
              window.open($('#route-add-user').val());
            }
        }
    ]
});
$('.users-table-row').on('click', function() {
    window.open($(this).data("href"));
});
$('#btn-delete-user').on('click', function(event) {
    if (confirm('Você realmente deseja deletar este usuário?')) {
        $('#form-delete-user').submit();
    }
    return false;
});
$('#btn-edit-user').on('click', function(){
  $('#form-edit-user').submit();
});