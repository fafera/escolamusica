@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-4">
                        <h4 class="font-weight-bold m-0">Cursos</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="cursos-table" class="table table-striped table-bordered">
                    <input type="hidden" id="route-add-curso" value={{route('cursos.create')}}>
                    <thead>
                        <tr>
                            <th>Título</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cursos as $curso)
                        <tr style="cursor: pointer;" class="curso-table-row" data-href="{{route('cursos.show', $curso->id)}}">
                            <td>{{$curso->titulo}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts_src')
    <script src="{{asset('js/sections/curso.js')}}"></script>
@endpush
