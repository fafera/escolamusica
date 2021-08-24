<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\MessageHelper;
use Illuminate\Support\Facades\Auth;
use App\Repositories\AlunoRepository;

class AlunosController extends Controller
{
    private $alunoRepository;
    public function __construct(AlunoRepository $alunoRepository)
    {
        $this->alunoRepository = $alunoRepository;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.alunos.index', ['alunos' => $this->alunoRepository->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.alunos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        return redirect()->route('alunos.show', [$this->alunoRepository->store()])->with('message', MessageHelper::createMessageObject('success', 'Aluno adicionado com sucesso!'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.alunos.show', ['aluno' => $this->alunoRepository->get($id)]);
    }
    public function getTab(Request $request) {
        return view('components.alunos.'.$request->get('tabName'), ['aluno' => $this->alunoRepository->get($request->get('id'))]);
    }
    public function getModal(Request $request) {
        dd($request->get('modalName'));
        return view('components.'.$request->get('modalName'), ['aluno' => $this->alunoRepository->get($request->get('id'))]);
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
        return redirect()->route('alunos.show', [$this->alunoRepository->update($id)])->with('message', MessageHelper::createMessageObject('success', 'Aluno editado com sucesso!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->alunoRepository->delete($id)) {
            return redirect()->route('alunos.index')->with('message', MessageHelper::createMessageObject('success', 'Aluno excluído com sucesso!'));
        }
        return redirect()->route('alunos.index')->with('message', MessageHelper::createMessageObject('success', 'Erro ao excluir o aluno!'));
    }

    public function verifyMatricula(Request $request) {
        return $this->alunoRepository->get($request->get('id_aluno'))->matriculas;
    }

    public function getMensalidadesJSON(Request $request) {
        return $this->alunoRepository->get($request->get('id_aluno'))->mensalidades;
    }
}
