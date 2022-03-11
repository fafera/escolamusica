<select name="dia_da_semana" id="dia_da_semana" class="form-control">
  <option @if($diaDaSemana == 1) {{'selected'}} @endif value="1">Segunda-feira</option>
  <option @if($diaDaSemana == 2) {{'selected'}} @endif value="2">Terça-feira</option>
  <option @if($diaDaSemana == 3) {{'selected'}} @endif value="3">Quarta-feira</option>
  <option @if($diaDaSemana == 4) {{'selected'}} @endif value="4">Quinta-feira</option>
  <option @if($diaDaSemana == 5) {{'selected'}} @endif value="5">Sexta-feira</option>
  <option @if($diaDaSemana == 6) {{'selected'}} @endif value="6">Sábado</option>
</select>