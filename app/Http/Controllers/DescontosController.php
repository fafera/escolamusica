<?php

namespace App\Http\Controllers;

use App\Models\Desconto;
use App\Models\Matricula;
use Illuminate\Http\Request;
use App\Helpers\MessageHelper;

class DescontosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.descontos.index', ['descontos' => Desconto::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.descontos.create', ['matriculas' => Matricula::ativas()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->route('descontos.show', [Desconto::create($request->except('_token'))])->with('message', MessageHelper::createMessageObject('success', 'Desconto adicionado com sucesso!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.descontos.show',['desconto' => Desconto::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $desconto = Desconto::findOrFail($id);

        if($desconto->update($request->except('_token'))) {
            return redirect()->route('descontos.show', [$desconto->id])->with('message', MessageHelper::createMessageObject('success', 'Matrícula editada com sucesso'));
        }
        return null;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Desconto::findOrFail($id)->delete();
        return redirect()->route('descontos.index')->with('message', MessageHelper::createMessageObject('success', 'Desconto excluído com sucesso!'));
    }
}
