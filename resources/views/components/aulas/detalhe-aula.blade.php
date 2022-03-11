<div id="aula-{{$aula->id}}" class="mb-3">
    @isset($alert)
        <div class="alert alert-{{$alert['status']}} alert-dismissible fade show" role="alert">
            <strong>{{$alert['message']}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endisset
    <span>
        <b>{{$aula->dataBR}}</b> - {{$aula->statusFormatado}} - @if($aula->tipo == 'recuperacao') {!! '<span class="badge badge-pill badge-warning">Recuperação</span>'
 !!} @endif
    
        <button data-toggle="modal"  data-target="#aulas-modal-edit-{{$aula->id}}" class="badge badge-primary action-btn">
            <i class="fa fa-edit"> Editar</i>
        </button>
        <button id="delete-aula-{{$aula->id}}" name="delete-aula" class="badge badge-danger action-btn btn-delete-aula" data-url="{{route('aulas.destroy', $aula->id)}}">
            <i class="fa fa-trash"> Excluir</i>
        </button>
    </span>
    {!!$aula->descricao!!}
</div>
@if($aula->tipo != 'teste' && $aula->tipo != 'reposicao') 
    @component('components.aulas.modal-edit', ['aula' => $aula])

    @endcomponent
@endif