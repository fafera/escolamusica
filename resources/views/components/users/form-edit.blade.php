<form name="form-user" id="form-edit-user" method="POST" action="#">
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
                <label for="role" class="form-control-label">Função:</label>
                <input type="text" name="role" readonly disabled class="form-control" value="{{$user->role}}">
            </div>
        </div>
    </div>
</form>
<div class="row">
    
    <div class="col-lg-12">
        <form id="form-delete-user" action="{{route('users.destroy', $user->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button id="btn-delete-user" class="btn btn-danger">
                <i class="fa fa-trash"></i> Excluir usuário
            </button>
        </form>
    </div>
</div>