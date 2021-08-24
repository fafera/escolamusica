<?php

namespace App\Http\Controllers;

use App\Rules\HorariosRule;
use Illuminate\Http\Request;
use App\Helpers\MessageHelper;
use Illuminate\Support\Facades\DB;
use App\Repositories\AulaRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\AlunoRepository;
use App\Repositories\AulaTesteRepository;
use Illuminate\Support\Facades\Route;
use App\Repositories\ProfessorRepository;
use Illuminate\Support\Facades\Validator;
use App\Repositories\ModalidadeRepository;

class AulasController extends Controller
{
    private $aulaRepository, $aulaTesteRepository, $professorRepository, $alunoRepository, $modalidadeRepository;

    public function __construct(AulaRepository $aulaRepository, ProfessorRepository $professorRepository, AlunoRepository $alunoRepository, ModalidadeRepository $modalidadeRepository, AulaTesteRepository $aulaTesteRepository){
        $this->aulaRepository = $aulaRepository;
        $this->alunoRepository = $alunoRepository;
        $this->professorRepository = $professorRepository;
        $this->modalidadeRepository = $modalidadeRepository;
        $this->aulaTesteRepository = $aulaTesteRepository;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProfessorRepository $professorRepository)
    {
        return $this->getViewByRole(Auth::user());
    }
    private function getViewByRole($user) {

        $professoresRepository = new ProfessorRepository();
        if($user->role == 'professor') {
            return view('pages.aulas.gerenciar-professor', ['professor' =>$this->professorRepository->get($user->professor->id)]);
        }
        return view('pages.aulas.gerenciar-admin', ['professores' => $professoresRepository->all()]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.aulas.create', ['professores' => $this->professorRepository->all(), 'alunos' => $this->alunoRepository->all(), 'modalidades' => $this->modalidadeRepository->all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['horario' => new HorariosRule($request)]);
        
        if($validator->fails()) {
            return redirect()->route('aulas.create')->with('message', MessageHelper::createMessageObject('danger', $validator->errors()->first()));
        }
        $aula = $this->aulaRepository->store();
        if(class_basename($aula) == "AulaTeste") {
            return redirect()->route('alunos.show', ['aluno' => $aula->aluno->id])->with('message', MessageHelper::createMessageObject('success', 'Aula adicionada com sucesso'));
        }
        return view('components.aulas.detalhe-aula', ['aula' => $aula, 'alert' => MessageHelper::createMessageObject('success', 'Aula adicionada com sucesso') ])->render();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Route::currentRouteName() == 'aulas.showAulaTeste') {
            $aula = $this->aulaTesteRepository->get($id);
        } else {
            $aula = $this->aulaRepository->get($id);
        }
        return view('pages.aulas.show', ['aula' => $aula]);
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
        $aula = $this->aulaRepository->update($id);
        if(class_basename($aula) == "AulaTeste") {
            return response()->json([
                'message_aula_teste' => 'Aula teste editada com sucesso!'
            ]);
        }
        return view('components.aulas.detalhe-aula', ['aula' => $aula, 'alert' => MessageHelper::createMessageObject('success', 'Aula editada com sucesso') ])->render();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->aulaRepository->delete($id);
    }
}
