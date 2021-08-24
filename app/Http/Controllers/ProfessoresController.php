<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Professor;
use App\Helpers\DateHelper;
use Illuminate\Http\Request;
use App\Helpers\MessageHelper;
use App\Services\AgendaServices;
use App\Services\SalarioServices;
use App\Repositories\ProfessorRepository;
use App\View\Components\Aulas\ListaAlunos;

class ProfessoresController extends Controller
{
  private $professorRepository;

  public function __construct(ProfessorRepository $professorRepository){
    $this->professorRepository = $professorRepository;
  }

  public function index() {
    return view('pages.professores.index', ['professores' => $this->professorRepository->all() ]);
  }
  public function receiveJSON(Request $request){
    return $this->buildViewJSON($request);
  }
  private function buildViewJSON($params) {
    $professor = $this->professorRepository->get($params->get('id_professor'));
    $dataReferencia = DateHelper::parseMonthYearBRDate($params->get('data_referencia'));
    $paramsView = ['professor' => $professor, 'mes' => $dataReferencia->month, 'ano' => $dataReferencia->year];
    $view['aulas'] = $this->buildViewAulas($paramsView);
    $view['aulas_teste'] = $this->buildViewAulasTeste($paramsView);
    $view['alunos'] = $this->buildViewAlunos($paramsView);

    return $view;
  }
  private function buildViewAulas($params) {
    return view('components.aulas.lista-aulas', $params)->render();
  }
  private function buildViewAulasTeste($params) {
    return view('components.aulas.teste.lista', $params)->render();
  }
  private function buildViewAlunos($params) {
    return view('components.aulas.lista-alunos', $params)->render();
  }
  public function create() {
    return view('pages.professores.create');
  }
  public function show($id) {
    return view('pages.professores.show', ['professor' => $this->professorRepository->get($id)]);
  }
  // public function matriculas($id) {
  //   $component['view'] = view('components.professores.matriculas', ['professor' => $this->professorRepository->get($id)]);
  //   $component['nav'] = 'matriculas';
  //   return view('pages.professores.show', ['professor' => $this->professorRepository->get($id), 'component' => $component]);
  // }
  // public function aulas($id) {
  //   $component['view'] = view('components.professores.aulas', ['professor' => $this->professorRepository->get($id)]);
  //   $component['nav'] = 'aulas';
  //   return view('pages.professores.show', ['professor' => $this->professorRepository->get($id), 'component' => $component]);
  // }
  public function agenda($professor, $diaDaSemana) {
    $agenda = new AgendaServices($this->professorRepository->get($professor), $diaDaSemana);
    dd($agenda->getAgendaFromProfessorByWeekDay());
    $component['view'] = view('components.professores.agenda', ['professor' => $this->professorRepository->get($professor), 'diaDaSemana' => $diaDaSemana, 'agenda' => $agenda->getAgendaFromProfessorByWeekDay()]);
    $component['nav'] = 'agenda';
    return view('pages.professores.show', ['professor' => $this->professorRepository->get($professor), 'component' => $component]);

  }
  public function update($id) {
    return redirect()->route('professores.show', [$this->professorRepository->update($id)])->with('message', MessageHelper::createMessageObject('success', 'Professor editado com sucesso!'));
  }

  public function store() {
    return redirect()->route('professores.show', [$this->professorRepository->store()])->with('message', MessageHelper::createMessageObject('success', 'Professor adicionado com sucesso!'));
  }

  public function destroy($id)
  {
    $this->professorRepository->delete($id);
    return redirect()->route('professores.index')->with('message', MessageHelper::createMessageObject('success', 'Professor excluído com sucesso!'));
  }

}
