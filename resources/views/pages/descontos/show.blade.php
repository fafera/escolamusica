@extends('layouts.app')
@section('content')
<h4 class="font-weight-bold m-0 mb-2">Descontos</h4>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Desconto {{$desconto->matricula->aluno->nome}}
                </h6>
            </div>
            <div class="card-body">
                @component('components.descontos.form-edit', ['desconto' => $desconto])

                @endcomponent
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts_src')
    <script src="{{asset('js/sections/desconto.js')}}"></script>
@endpush