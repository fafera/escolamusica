<div class="row">
  <div class="col-md-12">
      @component('components.agenda.navs.weekdays',['professor' => $professor, 'diaDaSemana' => $diaDaSemana])

      @endcomponent
    <div class="table-responsive">
      <table id="agenda-table" class="table table-condensed table-bordered">
        <thead>
          <tr>
            <th class="agenda-horario">Horário</th>
            <th class="agenda-status">Status</th>
            <th class="agenda-descricao">Descrição</th>
            <th class="agenda-acao">Ação</th>
          </tr>
        </thead>
        <tbody id="agenda-table-data">
        </tbody>
      </table>
    </div>
  </div>
</div>
@push('scripts_src')
  <script src="{{asset('js/sections/agenda.js')}}"></script>
@endpush

{{-- @push('scripts')
  $('#weekdays-tab a').on('click', function() {
    event.preventDefault()
      jQuery.ajax({
          url: "{{ url('/agenda/get') }}",
          method: 'post',
          data: {
              professor: {{$professor->id}},
              dia_da_semana: $(this).attr('id'),
          },
          success: function(result){
              console.log(result);
          }
      });
    console.log(this);
  });
@endpush --}}