<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form id="form-edit-aluno" method="POST" action="{{ route('alunos.update', $aluno->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row form-group">
                        <div class="col-lg-2"><label for="nome" class="form-control-label">Nome:</label></div>
                        <div class="col-lg-8">
                            <input type="text" name="nome" id="nome" value="{{$aluno->nome}}" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-2"><label for="dt_nascimento" class="form-control-label">Data de nascimento:</label></div>
                        <div class="col-lg-5">
                            <input type="text" name="dt_nascimento" id="dt_nascimento" class="form-control dt" value="{{$aluno->dt_nascimento}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-2"><label for="telefone" class="form-control-label">Telefone:</label></div>
                        <div class="col-lg-5">
                            <input type="text" name="telefone" id="telefone" class="form-control telefone" value="{{$aluno->telefone}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-2"><label for="cpf" class="form-control-label">CPF:</label></div>
                        <div class="col-lg-5">
                            <input type="text" name="cpf" id="cpf" class="form-control cpf" value="{{$aluno->cpf}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-2"><label for="rg" class="form-control-label">RG:</label></div>
                        <div class="col-lg-5">
                            <input type="text" maxlength="14" name="rg" id="rg" class="form-control rg" value="{{$aluno->rg}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-2"><label for="endereco" class="form-control-label">Endereço:</label></div>
                        <div class="col-lg-5">
                            <input type="text" name="endereco" id="endereco" class="form-control" value="{{$aluno->endereco}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-2"><label for="sexo" class="form-control-label">Sexo:</label></div>
                        <div class="col col-md-9">
                            <div class="form-check">
                                <div class="radio">
                                    <label for="masculino" class="form-check-label ">
                                        <input type="radio" id="masculino" name="sexo" value="m" class="form-check-input" @if($aluno->sexo == 'm'){{'checked'}}@endif>Masculino
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="feminino" class="form-check-label ">
                                        <input type="radio" id="feminino" name="sexo" value="f" class="form-check-input" @if($aluno->sexo == 'f'){{'checked'}}@endif>Feminino
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-2"><label for="email" class="form-control-label">E-mail:</label></div>
                        <div class="col-lg-5">
                            <input type="text" name="email" id="email" class="form-control" value="{{$aluno->email}}">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer row" id="footer-aluno">
                <button id="btn-submit-aluno" class="btn btn-primary col-sm-2">
                    <i class="fa fa-dot-circle-o"></i> Salvar alterações
                </button>
                <form id="form-delete-aluno" action="{{route('alunos.destroy', $aluno->id)}}" method="post" class="col-sm-2 offset-sm-8">
                    @csrf
                    @method('DELETE') 
                    <button id="btn-delete-aluno" class="btn btn-danger float-right">
                        <i class="fa fa-trash"></i> Excluir aluno
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    $('#btn-submit-aluno').on('click', function(e) {
        $('#form-edit-aluno').submit();
        console.log($('#form-edit-aluno').attr('action'));
    });
@endpush