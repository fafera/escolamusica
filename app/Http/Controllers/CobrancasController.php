<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\MessageHelper;
use App\Repositories\AlunoRepository;
use App\Repositories\CobrancaRepository;

class CobrancasController extends Controller
{
    private $cobrancaRepository, $alunoRepository;
    public function __construct(CobrancaRepository $cobrancaRepository, AlunoRepository $alunoRepository)
    {
        $this->cobrancaRepository = $cobrancaRepository;
        $this->alunoRepository = $alunoRepository;
    }
    public function index() {
        return view('pages.cobrancas.index', ['cobrancas' => $this->cobrancaRepository->all()]);
    }
    public function create() {
      return view('pages.cobrancas.create', ['alunos' => $this->alunoRepository->all()]);
    }
    public function store(Request $request) {
        return $this->cobrancaRepository->store();
    }
    public function show($id) {
        return view('pages.cobrancas.show', ['cobranca' => $this->cobrancaRepository->get($id)]);
    }
    public function update(Request $request, $id)
    {
        return redirect()->route('cobrancas.show', [$this->cobrancaRepository->update($id)])->with('message', MessageHelper::createMessageObject('success', 'Cobrança editada com sucesso!'));
    }
    public function destroy($id)
    {
        $this->cobrancaRepository->delete($id);
        return redirect()->route('cobrancas.index')->with('message', MessageHelper::createMessageObject('success', 'Cobrança excluída com sucesso!'));
    }
}
