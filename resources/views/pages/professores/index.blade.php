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
                        <h4 class="font-weight-bold m-0">Professores</h4>
                    </div>
                    <div class="col-sm-8">
                        <a href="{{route('professores.create')}}" class="btn btn-primary col-sm-2 float-right">Adicionar Professor</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="professores-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nome</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($professores as $professor)
                        <tr>
                            <td><a href="{{route('professores.show',$professor->id)}}"> {{$professor->nome}}</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <span> Total de professores: {{count($professores)}}</span>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts_src')
    <script src="{{asset('js/sections/professor.js')}}"></script>
@endpush
