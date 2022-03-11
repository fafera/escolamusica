@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-4 text-center my-auto">
                            <h4 class="font-weight-bold m-0">Aulas</h4>
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label"for="data_referencia">Selecione o mês:</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="data_referencia" id="data_referencia" value="{{date('m/Y')}}">
                                        <i class="fa fa-calendar my-auto ml-1" id="icon-calendar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="max-height: 1000px; overflow-y: scroll;" id="lista-aulas">
                    @component('components.aulas.lista-aulas',['professor' => $professor, 'mes' => date('m'), 'ano' => date('Y')])

                    @endcomponent

                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="card">
                <div class="card-header">
                    <h4 class="font-weight-bold m-0">Alunos</h4><small>{{--<a href="#">Classificar por ordem alfabética ↑↓</a>--}}</small>
                </div>
                <div id="lista-alunos" class="card-body list-card">
                    @component('components.aulas.lista-alunos', ['professor' => $professor, 'mes' => date('m'), 'ano' => date('Y')])

                    @endcomponent
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-4">
                <div class="card-header">
                     <h4 class="font-weight-bold m-0">Aulas extra</h4>
                </div>
                <div id="lista-aulas-teste" class="card-body">
                    @component('components.aulas.teste.lista', ['professor' => $professor, 'mes' => date('m'), 'ano' => date('Y')])

                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts_src')
    <script src="{{asset('js/sections/aulas.js')}}"></script>
@endpush