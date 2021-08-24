var defaultDay = 1;
$(window).on('load', function() {
  getAgenda($('#show-id-professor').attr('value'), defaultDay);
});
$('#weekdays-tab a').on('click', function() {
  getAgenda($('#show-id-professor').attr('value'), $(this).attr('id'));
});
function getAgenda( professor, dia )
{
    $.ajax({
      url: $('#weekdays-tab').attr('ajax-url'),
      type: 'post',
      data: {
        professor: professor,
        dia_da_semana: dia,
      },
      success: function (data) {
        setActiveTab(dia);
        $('#agenda-table-data').html(data);
      }
    });
}
function setActiveTab(dia) {
  var elem = $('#weekdays-tab').find('#'+dia);
  elem.siblings('a').removeClass('active');
  elem.addClass('active');
}