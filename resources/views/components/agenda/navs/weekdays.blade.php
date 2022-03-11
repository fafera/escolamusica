{{-- <div class="default-tab">
    <nav>
        <div class="nav nav-tabs" id="weekdays-tab">
          <a class="nav-item nav-link active" id="1" href="{{route('professores.agenda', [$professor, $diaDaSemana])}}">Segunda-feira</a>
          <a class="nav-item nav-link @if($diaDaSemana == 1) {{'active'}}@endif" id="1" href="{{route('professores.agenda', [$professor, $diaDaSemana])}}">Terça-feira</a>
          <a class="nav-item nav-link @if($diaDaSemana == 1) {{'active'}}@endif" id="1" href="{{route('professores.agenda', [$professor, $diaDaSemana])}}">Quarta-feira</a>
          <a class="nav-item nav-link @if($diaDaSemana == 1) {{'active'}}@endif" id="1" href="{{route('professores.agenda', [$professor, $diaDaSemana])}}">Quinta-feira</a>
          <a class="nav-item nav-link @if($diaDaSemana == 1) {{'active'}}@endif" id="1" href="{{route('professores.agenda', [$professor, $diaDaSemana])}}">Sexta-feira</a>
          <a class="nav-item nav-link @if($diaDaSemana == 1) {{'active'}}@endif" id="1" href="{{route('professores.agenda', [$professor, $diaDaSemana])}}">Sábado</a>
        </div>
    </nav>
</div> --}}
<nav id="weekdays-tab" class="nav nav-pills nav-justified" ajax-url="{{ url('/agenda/get') }}">
  <a class="nav-item nav-link border" id="1" href="#agenda-row">Segunda-feira</a>
  <a class="nav-item nav-link border" id="2" href="#agenda-row">Terça-feira</a>
  <a class="nav-item nav-link border" id="3" href="#agenda-row">Quarta-feira</a>
  <a class="nav-item nav-link border" id="4" href="#agenda-row">Quinta-feira</a>
  <a class="nav-item nav-link border" id="5" href="#agenda-row">Sexta-feira</a>
  <a class="nav-item nav-link border" id="6" href="#agenda-row">Sábado</a>
</nav>