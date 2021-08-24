@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Criar novo usuário') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row form-group">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome:</label>
                            <div class="col-md-6">
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" required autocomplete="name">
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row form-group">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail:</label>
                            <div class="col-md-6">
                                <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row form-group">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Senha:</label>
                            <div class="col-md-6">
                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row form-group">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirme a senha</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-4 col-form-label text-md-right">Função:</label>
                            <div class="col-md-6">
                                <select id="role" name="role" data-placeholder="Selecione a funcao..." class="form-control" tabindex="1">
                                    <option value="">Selecione a função:</option>
                                    <option value="professor">Professor</option>
                                    <option value="administrador">Administrador</option>
                                </select>
                            </div>
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div id="form-load">
                            <div id="load-professor" class="load-class" style="display:none;">
                                <div class="row form-group">
                                    <label class="col-md-4 col-form-label text-md-right">Professor:</label>
                                    <div class="col-md-6">
                                        <select id="professor" name="professor" data-placeholder="Selecione o professor..." class="form-control" tabindex="1">
                                            <option value="">Selecione o professor:</option>
                                            @foreach($professores as $professor)
                                                <option value="{{ $professor->id }}">{{ $professor->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div> 
                            
                        </div>   

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Criar novo usuário') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
$('#role').on('change', function(){
    $('.load-class').hide();
    if($(this).val() == 'professor') {
        $('#load-professor').show();
    }
});
$('#professor').on('change', function(){
    $('#name').val($(this).children('option:selected').text());
});
@endpush