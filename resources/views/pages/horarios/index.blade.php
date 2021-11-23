@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-4">
                        <h4 class="font-weight-bold m-0">Horários de funcionamento</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @component('components.horarios.form', ['horarios' => $horarios])

                @endcomponent
            </div>
        </div>
    </div>
</div>
@endsection