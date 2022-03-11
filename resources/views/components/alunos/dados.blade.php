<div class="row">
    <div class="col-md-12 mx-auto">
        <form id="form-edit-aluno" role="form" method="POST" action="{{ route('alunos.update', $aluno->id) }}">
            @csrf
            @method('PUT')
            <div class="row form-group">
                <label class="col-lg-1 col-form-label form-control-label">Nome</label>
                <div class="col-lg-11">
                    <input type="text" name="nome" id="nome" value="{{$aluno->nome}}" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <label class="col-lg-1 col-form-label form-control-label">Data de nascimento:</label>
                <div class="col-lg-11">
                    <input type="text" name="dt_nascimento" value="{{$aluno->dt_nascimento}}" id="dt_nascimento" class="form-control dt">
                </div>
            </div>
            <div class="row form-group">
                <label class="col-lg-1 col-form-label form-control-label">Telefone:</label>
                <div class="col-lg-11">
                    <input type="text" name="telefone" id="telefone" value="{{$aluno->telefone}}" class="form-control telefone">
                </div>
            </div>
            <div class="row form-group">
                <label class="col-lg-1 col-form-label form-control-label">CPF:</label>
                <div class="col-lg-11">
                    <input type="text" name="cpf" id="cpf" value="{{$aluno->cpf}}" class="form-control cpf">
                </div>
            </div>
            <div class="row form-group">
                <label class="col-lg-1 col-form-label form-control-label">RG:</label>
                <div class="col-lg-11">
                    <input type="text" maxlength="14" name="rg" id="rg" value="{{$aluno->rg}}"class="form-control rg">
                </div>
            </div>
            <div class="row form-group">
                <label class="col-lg-1 col-form-label form-control-label">Endereço:</label>
                <div class="col-lg-11">
                    <input type="text" name="endereco" id="endereco" value="{{$aluno->rg}}" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <label class="col-lg-1 col-form-label form-control-label">Sexo:</label>
                <div class="col col-lg-11">
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
                <label class="col-lg-1 col-form-label form-control-label">E-mail:</label>
                <div class="col-lg-11">
                    <input type="text" name="email" id="email" value="{{$aluno->email}}" class="form-control">
                </div>
            </div>
        </form>
        <div class="row form-group">
            <label class="col-lg-1 col-form-label form-control-label"></label>
            <div class="col-lg-8">
                <button id="btn-edit-aluno" class="btn btn-primary">
                    <i class="fa fa-dot-circle-o"></i> Salvar alterações
                </button>
            </div>
            <div class="col-lg-3">
                <form id="form-delete-aluno" action="{{route('alunos.destroy', $aluno->id)}}" method="post">
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