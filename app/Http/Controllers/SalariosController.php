<?php

namespace App\Http\Controllers;

use App\Helpers\MessageHelper;
use App\Repositories\SalarioRepository;
use Illuminate\Http\Request;

class SalariosController extends Controller
{
    private $salarioRepository;

    public function __construct(SalarioRepository $salarioRepository){
        $this->salarioRepository = $salarioRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.salarios.index', ['salarios' => $this->salarioRepository->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.salarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.salarios.show', ['salario' => $this->salarioRepository->get($id)]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function generate(Request $request) {
        if(app('App\Services\SalarioServices')->gerarSalarios($request->get('mes'), $request->get('ano')) != null) {
            return redirect()->route('salarios.index')->with('message', MessageHelper::createMessageObject('success', 'Folhas de pagamento geradas com sucesso!'));
        }
        return null;
    }
}
