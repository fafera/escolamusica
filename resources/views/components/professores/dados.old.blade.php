<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form id="form-edit-professor" method="POST" action="{{ route('professores.update', $professor->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row form-group">
                        <div class="col-lg-2"><label for="nome" class="form-control-label">Nome:</label></div>
                        <div class="col-lg-8">
                            <input type="text" name="nome" id="nome" value="{{$professor->nome}}" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer row" id="footer-professor">
                <button id="btn-submit-professor" class="btn btn-primary col-sm-2">
                    <i class="fa fa-dot-circle-o"></i> Salvar alterações
                </button>
                <form id="form-delete-professor" action="{{route('professores.destroy', $professor->id)}}" method="post" class="col-sm-2 offset-sm-8">
                    @csrf
                    @method('DELETE')
                    <button id="btn-delete-professor" class="btn btn-danger float-right">
                        <i class="fa fa-trash"></i> Excluir professor
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    $('#btn-submit-professor').on('click', function(e) {
        $('#form-edit-professor').submit();
    });
@endpush