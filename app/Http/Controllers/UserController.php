<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\MessageHelper;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $user)
    {
        return view('pages.users.index',['users' => User::all()]);
    }

    public function show($id) {
        return view('pages.users.show', ['user' => User::findOrFail($id)]);
    }
    public function me() {
        return view('pages.users.me', ['user' => User::findOrFail(request()->user()->id)]);
    }
    public function update(Request $request, $id) {

        $request->validate([
            'password' => 'required'
        ]);
        $user = User::findOrFail($id);
        $user->password  = Hash::make($request->get('password'));
        if($user->save()) { 
            return redirect()->route('user.me')->with('message', MessageHelper::createMessageObject('success', 'Senha alterada com sucesso!'));
        }
        return redirect()->route('user.me')->with('message', MessageHelper::createMessageObject('danger', 'Ops! Ocorreu um erro'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if(isset($user->professor)) {
            DB::table('user_professor')->where('id_user', $id)->delete();
        }
        $user->delete();
        return redirect()->route('users.index')->with('message', MessageHelper::createMessageObject('success', 'Usuário excluído com sucesso!'));
    }
    
}
