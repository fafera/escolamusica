@extends('layouts.app')
@push('styles')
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel='stylesheet'>
@endpush
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-4 text-center my-auto">
                        <h4 class="font-weight-bold m-0">Alunos</h4>
                    </div>
                    <div class="col-sm-8">
                        <a href="{{route('alunos.create')}}" class="btn btn-primary col-sm-2 float-right">Adicionar Aluno</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if(session('status'))
                <div class="alert alert-{{session('status')}}" role="alert">
                    {{session('message')}}
                </div>
                @endif
                <table id="alunos-table" class="table table-striped table-bordered data-table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Data de nascimento</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alunos as $aluno)
                        <tr>
                            <td><a href="{{route('alunos.show',$aluno->id)}}"> {{$aluno->nome}}</a></td>
                            <td><a href="{{route('alunos.show',$aluno->id)}}"> {{$aluno->dt_nascimento}}</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <span> Total de alunos: {{count($alunos)}}</span>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts_src')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
@endpush
@push('scripts')
    var pagamentosTable = $('#alunos-table').DataTable({
        "language": {
            "lengthMenu": "Mostrando _MENU_ resultados por página",
            "zeroRecords": "Nenhum resultado encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhuma informação disponível",
            "infoFiltered": "(Filtrado de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "previous": "Anterior",
                "next": "Próximo"
            }
        }
    });
@endpush
