<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\MessageHelper;
use App\Repositories\ModalidadeRepository;

class ModalidadesController extends Controller
{
    public $modalidadeRepository;
    public function __construct(ModalidadeRepository $modalidadeRepository)
    {
        $this->modalidadeRepository = $modalidadeRepository;
    }
    public function index() {
        return view('pages.modalidades.index', ['modalidades' => $this->modalidadeRepository->all()]);
    }
    public function create() {
        return view('pages.modalidades.create');
    }
    public function store(Request $request) {
        if($this->modalidadeRepository->store()) {
            return redirect()->route('modalidades.index')->with('message', MessageHelper::createMessageObject('success', 'Modalidade adicionada com sucesso'));
        }
        return null;
    }
    public function show($id) {
        $modalidade = $this->modalidadeRepository->get($id);
        $modalidade = $this->modalidadeRepository->transformDuracao($modalidade);
        return view('pages.modalidades.show', ['modalidade' => $modalidade]);
    }
    public function update(Request $request, $id) {
        return redirect()->route('modalidades.show', [$this->modalidadeRepository->update($id)])->with('message',MessageHelper::createMessageObject('success', 'Modalidade editada com sucesso!'));
    }
    public function destroy($id)
    {
        $this->modalidadeRepository->delete($id);
        return redirect()->route('modalidades.index')->with('message', MessageHelper::createMessageObject('success', 'Modalidade excluída com sucesso!'));
    }
    public function getValorAjax(Request $request) {
        return $this->modalidadeRepository->get($request->get('id'))->valorBR;
    }
}
