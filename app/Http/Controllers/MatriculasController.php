<?php

namespace App\Http\Controllers;

use App\Helpers\DateHelper;
use App\Rules\HorariosRule;
use Illuminate\Http\Request;
use App\Helpers\MessageHelper;
use App\Repositories\AlunoRepository;
use App\Repositories\CursoRepository;
use App\Repositories\DescontoRepository;
use App\Repositories\MatriculaRepository;
use App\Repositories\ProfessorRepository;
use Illuminate\Support\Facades\Validator;
use App\Repositories\ModalidadeRepository;
use App\Repositories\MensalidadeRepository;
use App\Repositories\LiberacaoMatriculaProfessorRepository;

class MatriculasController extends Controller
{
    private $matriculaRepository, $professorRepository, $alunoRepository, $modalidadeRepository, $cursoRepository, $mensalidadeRepository, $liberacaoMatriculaProfessorRepository;

    public function __construct(MatriculaRepository $matriculaRepository, ProfessorRepository $professorRepository, AlunoRepository $alunoRepository, ModalidadeRepository $modalidadeRepository, CursoRepository $cursoRepository, MensalidadeRepository $mensalidadeRepository, LiberacaoMatriculaProfessorRepository $liberacaoMatriculaProfessorRepository, DescontoRepository $descontoRepository)
    {
        $this->matriculaRepository = $matriculaRepository;
        $this->professorRepository = $professorRepository;
        $this->alunoRepository = $alunoRepository;
        $this->modalidadeRepository = $modalidadeRepository;
        $this->cursoRepository = $cursoRepository;
        $this->mensalidadeRepository = $mensalidadeRepository;
        $this->liberacaoMatriculaProfessorRepository = $liberacaoMatriculaProfessorRepository;
        $this->descontoRepository = $descontoRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('pages.matriculas.index', ['matriculas' => $this->matriculaRepository->all()]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        $data = $this->buildDefaultData();
        if(!is_null($id)) {
            $data['aluno'] = $this->alunoRepository->get($id);
        } else {
            $data['alunos'] = $this->alunoRepository->all();
        }
        return view('pages.matriculas.create', with($data));
    }
    private function buildDefaultData() {
        $data = ['professores' => $this->professorRepository->all(),
        'modalidades' => $this->modalidadeRepository->all(),
        'cursos' => $this->cursoRepository->all()];
        return $data;
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
            return redirect()->route('matriculas')->with('message', MessageHelper::createMessageObject('danger', $validator->errors()->first()));
        }
        return $this->matriculaRepository->store();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->buildDefaultData();
        $data['matricula'] = $this->matriculaRepository->get($id);
        return view('pages.matriculas.show', with($data));
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
        /* $validator = $this->validate($request, ['horario' => new HorariosRule($request, $id)]); */
        $validator = Validator::make($request->all(), ['horario' => new HorariosRule($request, $id)]);
        
        if($validator->fails()) {
            return redirect()->route('matriculas.show', $id)->with('message', MessageHelper::createMessageObject('danger', $validator->errors()->first()));
        }
        
        return redirect()->route('matriculas.show', [$this->matriculaRepository->update($id)])->with('message', MessageHelper::createMessageObject('success', 'Matrícula editada com sucesso'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->matriculaRepository->delete($id);
        return redirect()->route('matriculas.index')->with('message', MessageHelper::createMessageObject('success', 'Matrícula excluída com sucesso!'));
    }

    public function gerarMensalidades() {
        return view('pages.matriculas.gerar-mensalidades');
    }
    public function storeMensalidades(Request $request) {
        app('App\Services\GerarMensalidadeService', ['mes' => $request->get('mes'), 'ano' => $request->get('ano')]);
        return redirect()->route('matriculas.index')->with('message', MessageHelper::createMessageObject('success', 'Matrículas geradas com sucesso!'));
    }
    public function aulasPrevistasMes(Request $request) {
        return DateHelper::getWeekDaysOnMonth($request->get('dia_da_semana'), $request->get('mes'), $request->get('ano'));
    }

    public function descontos() {
        return view('pages.descontos.index', ['descontos' => $this->descontoRepository->all()]);
    }
    /* Funções de liberação de matrículas */
    public function liberar() {
        $data['professores'] = $this->professorRepository->all();
        $data['matriculas'] = $this->matriculaRepository->all();
        $data['matriculasLiberadas'] = $this->liberacaoMatriculaProfessorRepository->all();
        return view('pages.matriculas.liberar', with($data));    
    }
    public function storeLiberar(Request $request) {
        $this->liberacaoMatriculaProfessorRepository->store();
        return redirect()->route('matriculas.liberar')->with('message', MessageHelper::createMessageObject('success', 'Matrícula liberada com sucesso!'));
    }
    public function destroyLiberada($id) {
        $this->liberacaoMatriculaProfessorRepository->delete($id);
        return redirect()->route('matriculas.liberar')->with('message', MessageHelper::createMessageObject('success', 'Liberação de matrícula excluída com sucesso!'));
    }
}
