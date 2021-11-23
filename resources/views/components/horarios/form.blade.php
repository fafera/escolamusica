<form name="form-horarios" id="form-horarios" method="POST" action="{{ route('horarios.store') }}">
    @method('POST')
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <label class="form-control-label">Segunda à sexta-feira:</label>
            <div class="row mt-3">
                <div class="col-lg-1">
                    <label class="form-check-label">Manhã:</label>
                </div>
                <div class="col-lg-2">
                    <div class="md-form row-form-group mb-3">
                        <input type="time" value="{{$horarios['segunda_sexta']['manha']->horario_inicial}}" name="segunda_sexta[manha][horario_inicial]" class="form-control">  
                    </div>
                </div>
                <div class="col-lg-1">
                    <div class="text-center">
                        <span> - </span>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="md-form row-form-group mb-3">
                        <input type="time" value="{{$horarios['segunda_sexta']['manha']->horario_final}}" name="segunda_sexta[manha][horario_final]" class="form-control">  
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-1">
                    <label class="form-check-label">Tarde:</label>
                </div>
                <div class="col-lg-2">
                    <div class="md-form row-form-group mb-3">
                        <input type="time" value="{{$horarios['segunda_sexta']['tarde']->horario_inicial}}" name="segunda_sexta[tarde][horario_inicial]" class="form-control">  
                    </div>
                </div>
                <div class="col-lg-1">
                    <div class="text-center">
                        <span> - </span>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="md-form row-form-group mb-3">
                        <input type="time" value="{{$horarios['segunda_sexta']['tarde']->horario_final}}" name="segunda_sexta[tarde][horario_final]" class="form-control">  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <label class="form-control-label">Sábado:</label>
            <div class="row mt-3">
                <div class="col-lg-1">
                    <label class="form-check-label">Manhã:</label>
                </div>
                <div class="col-lg-2">
                    <div class="md-form row-form-group mb-3">
                        <input type="time" value="{{$horarios['sabado']['manha']->horario_inicial}}" name="sabado[manha][horario_inicial]" class="form-control">  
                    </div>
                </div>
                <div class="col-lg-1">
                    <div class="text-center">
                        <span> - </span>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="md-form row-form-group mb-3">
                        <input type="time" value="{{$horarios['sabado']['manha']->horario_final}}" name="sabado[manha][horario_final]" class="form-control">  
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-1">
                    <label class="form-check-label">Tarde:</label>
                </div>
                <div class="col-lg-2">
                    <div class="md-form row-form-group mb-3">
                        <input type="time" value="{{$horarios['sabado']['tarde']->horario_inicial}}" name="sabado[tarde][horario_inicial]" class="form-control">  
                    </div>
                </div>
                <div class="col-lg-1">
                    <div class="text-center">
                        <span> - </span>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="md-form row-form-group mb-3">
                        <input type="time" value="{{$horarios['sabado']['tarde']->horario_final}}" name="sabado[tarde][horario_final]" class="form-control">  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="md-form row-form-group mb-3">
                <button id="btn-edit-horarios" class="btn btn-primary" type="submit">
                    <i class="fa fa-dot-circle-o"></i> Salvar
                </button>
            </div>
        </div>
    </div>
</form>
