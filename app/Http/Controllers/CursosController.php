<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\MessageHelper;
use App\Repositories\CursoRepository;

class CursosController extends Controller
{
    public $cursoRepository; 
    public function __construct(CursoRepository $cursoRepository)
    {
        $this->cursoRepository = $cursoRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.cursos.index', ['cursos' => $this->cursoRepository->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->cursoRepository->store()) {
            return redirect()->route('cursos.index')->with('message', MessageHelper::createMessageObject('success', 'Curso adicionado com sucesso'));
        }
        return null;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.cursos.show', ['curso' => $this->cursoRepository->get($id)]);
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
    public function update(Request $request, $id) {
        return redirect()->route('cursos.show', [$this->cursoRepository->update($id)])->with('message', MessageHelper::createMessageObject('success', 'Curso editado com sucesso!'));
    }
    public function destroy($id)
    {
        $this->cursoRepository->delete($id);
        return redirect()->route('cursos.index')->with('message', MessageHelper::createMessageObject('success', 'Curso excluído com sucesso!'));
    }
}
