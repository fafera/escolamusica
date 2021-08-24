<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <div class="row">
                @component('components.agenda.navs.weekdays',['professor' => $professor, 'diaDaSemana' => $diaDaSemana])

                @endcomponent
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-condensed table-bordered">
                  <thead>
                    <tr>
                      <th>Horário</th>
                      <th>Status</th>
                      <th>Descrição</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer" id="footer">
            </div>
        </div>
    </div>
</div>