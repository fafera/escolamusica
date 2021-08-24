$('.value-field').mask('#.##0,00', {reverse: true});
$('a[name="btn-delete-pagamento"]').on('click', function(event) {
    if (confirm('Você realmente deseja deletar este pagamento?')) {
        $(this).parent('form').submit();
    }
    return false;
});
$('#btn-delete-mensalidade').on('click', function(event) {
    if (confirm('Você realmente deseja deletar esta mensalidade?')) {
        $('#form-delete-mensalidade').submit();
    }
    return false;
});
$('#btn-edit-mensalidade').on('click', function(){
  $('#form-edit-mensalidade').submit();
});
var table = $('#mensalidades-table').DataTable({
    lengthChange: false,
    dom: 'Bfrtip',
    buttons: [
        {
            text: 'Adicionar mensalidade',
            action: function ( e, dt, node, config ) {
              window.open($('#route-add-mensalidade').data('url'));
            }
        }
    ]
});
$('.mensalidade-table-row').on('click', function() {
  window.open($(this).data("href"));
});
$('#vencimento').datepicker();
$('#data').datepicker();
$('#filtro_periodo').datepicker( {
  format: 'mm/yyyy',
  minViewMode: 'months',
  changeMonth: true,
  changeYear: true,
  autoclose: true
});
function filtrarAjax(value) {
  jQuery.ajax({
      url: $('#mensalidades-filtros').data('url'),
      method: 'post',
      data: {
          periodo: value,
      },
      success: function(result){
        $('#table-col').html(result);
        var table = $('#mensalidades-table').dataTable();
        $('#total_mensalidades').html(table.api().data().length);
      }
  });
}
$('#filtro_periodo').on('change', function(e) {
  e.preventDefault();
  filtrarAjax($(this).val());
});
$('#limpar-filtros').on('click', function (){
  filtrarAjax('');
  $('#filtro_periodo').val('');
});
