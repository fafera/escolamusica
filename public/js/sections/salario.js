$('.salario-table-row').on('click', function() {
  window.open($(this).data("href"));
});
$('#salarios-table').DataTable();
$('#filtro_periodo').datepicker( {
  format: 'mm/yyyy',
  minViewMode: 'months',
  changeMonth: true,
  changeYear: true,
  autoclose: true
});
function filtrarAjax(value) {
  jQuery.ajax({
      url: $('#salarios-filtros').data('url'),
      method: 'post',
      data: {
          periodo: value,
      },
      success: function(result){
        $('#table-col').html(result);
        var table = $('#salarios-table').dataTable();
        $('#total_salarios').html(table.api().data().length);
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
$('#btn-export').on('click', function() {
  window.location.href = $(this).data('url');
});
$('#btn-delete').on('click', function() {
  if (confirm('Você realmente deseja deletar esta folha de pagamento?')) {
    $('#form-delete-salario').submit();
  } 
  
});