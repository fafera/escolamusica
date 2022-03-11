@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-4">
                        <h4 class="font-weight-bold m-0">Usuários</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12" id="table-col">
                        <table id="users-table" class="table table-striped table-bordered">
                            <input type="hidden" id="route-add-user" value="{{route('register')}}">
                            <thead>
                                <tr>
                                    <th>Usuário</th>
                                    <th>Tipo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr style="cursor: pointer;" class="users-table-row" data-href="{{route('users.show', $user->id)}}">
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->role}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p> Total de usuários: <span id="total_users">{{count($users)}} </span></p>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts_src')
    <script src="{{asset('js/sections/user.js')}}"></script>
@endpush
