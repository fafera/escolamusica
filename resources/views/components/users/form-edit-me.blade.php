<form name="form-user" id="form-edit-user" method="POST" action="{{ route('users.update', $user->id) }}">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="md-form row-form-group mb-3">
                <label for="user" class="form-control-label">Usuário:</label>
                <input type="hidden" name="id_user" value="{{$user->id}}">
                <input type="text" name="user" readonly class="form-control" disabled value="{{$user->name}}">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="md-form row-form-group mb-3">
                <label for="role" class="form-control-label">Senha:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
        </div>
    </div>
</form>
<div class="row form-group">
    
    <div class="col-lg-12">
        <button id="btn-edit-user" class="btn btn-primary">
            <i class="fa fa-dot-circle-o"></i> Salvar alterações
        </button>
    </div>
         
</div>