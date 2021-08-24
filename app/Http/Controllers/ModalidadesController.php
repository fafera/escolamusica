<?php

namespace App\Http\Controllers;

use App\Repositories\ModalidadeRepository;
use Illuminate\Http\Request;

class ModalidadesController extends Controller
{
    public $modalidadeRepository;
    public function __construct(ModalidadeRepository $modalidadeRepository)
    {
        $this->modalidadeRepository = $modalidadeRepository;
    }
    public function getValorAjax(Request $request) {
        return $this->modalidadeRepository->get($request->get('id'))->valorBR;

    }
}
