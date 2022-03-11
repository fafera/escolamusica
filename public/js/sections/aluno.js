$('#dt_nascimento').mask('00/00/0000');
$('#cpf').mask('000.000.000-00');
$('#rg').mask('0000000000');
$('#telefone').mask('(00)0.0000-0000');
$('#btn-edit-aluno').on('click', function() {
  $('#form-edit-aluno').submit();
});
$('#btn-delete-aluno').on('click', function(event) {
    if (confirm('Você realmente deseja deletar este aluno?')) {
      return true;
    }
    return false;
});