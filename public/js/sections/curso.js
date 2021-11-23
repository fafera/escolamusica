$('.curso-table-row').on('click', function() {
    window.open($(this).data("href"));
  });
  var table = $('#cursos-table').DataTable({
    lengthChange: false,
    dom: 'Bfrtip',
    buttons: [
        {
            text: 'Adicionar curso',
            action: function ( e, dt, node, config ) {
            window.open($('#route-add-curso').val());
            }
        }
    ]
});
$('#valor').mask('#.##0,00', {reverse: true});
$('#btn-edit-curso').on('click', function(){
    $('#form-edit-curso').submit();
  });
$('#btn-delete-curso').on('click', function(event) {
    if (confirm('Você realmente deseja deletar este curso?')) {
        $('#form-delete-curso').submit();
    }
    return false;
});