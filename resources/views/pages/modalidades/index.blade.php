@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-4">
                        <h4 class="font-weight-bold m-0">Modalidades</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="modalidades-table" class="table table-striped table-bordered">
                    <input type="hidden" id="route-add-modalidade" value={{route('modalidades.create')}}>
                    <thead>
                        <tr>
                            <th>Duração</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($modalidades as $modalidade)
                        <tr style="cursor: pointer;" class="modalidade-table-row" data-href="{{route('modalidades.show', $modalidade->id)}}">
                            <td>{{$modalidade->duracaoBRTime}}</td>
                            <td>{{$modalidade->valorBR}}</td>
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
    <script src="{{asset('js/sections/modalidade.js')}}"></script>
@endpush
