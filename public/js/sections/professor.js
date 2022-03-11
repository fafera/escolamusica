$('#btn-edit-professor').on('click', function() {
  $('#form-edit-professor').submit();
});
$('#btn-delete-professor').on('click', function(event) {
    if (confirm('Você realmente deseja deletar este professor?')) {
        $('#form-delete-professor').submit();
    }
    return false;
});
$('#professores-table').DataTable();