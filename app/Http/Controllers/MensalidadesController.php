<?php

namespace App\Http\Controllers;

use App\Helpers\DateHelper;
use Illuminate\Http\Request;
use App\Helpers\MessageHelper;
use App\Tables\MensalidadesTable;
use App\Repositories\MatriculaRepository;
use App\Repositories\MensalidadeRepository;

class MensalidadesController extends Controller
{
    private $mensalidadeRepository, $matriculaRepository;
    public function __construct(MensalidadeRepository $mensalidadeRepository, MatriculaRepository $matriculaRepository)
    {
        $this->mensalidadeRepository = $mensalidadeRepository;
        $this->matriculaRepository = $matriculaRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.mensalidades.index', ['mensalidades' => $this->mensalidadeRepository->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.mensalidades.create', ['matriculas' => $this->matriculaRepository->ativas()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->route('mensalidades.show', [$this->mensalidadeRepository->store()])->with('message', MessageHelper::createMessageObject('success', 'Matrícula adicionada com sucesso!'));
    }
    public function storeFromMatricula(Request $request)
    {
        $this->mensalidadeRepository->store();
        return redirect()->route('matriculas.index')->with('message', MessageHelper::createMessageObject('success', 'Matrícula adicionada com sucesso!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.mensalidades.show', ['mensalidade' => $this->mensalidadeRepository->get($id)]);
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
        return redirect()->route('mensalidades.show', [$this->mensalidadeRepository->update($id)])->with('message',MessageHelper::createMessageObject('success', 'Mensalidade editada com sucesso!'));
    }
    public function filter(Request $request) {
        if(!is_null($request->get('periodo'))) {
            $periodo = DateHelper::parseMonthYearBRDate($request->get('periodo'));
            $mensalidades = $this->mensalidadeRepository->getByData($periodo->month, $periodo->year);
        } else {
            $mensalidades = $this->mensalidadeRepository->all();
        }

        return view('components.mensalidades.table', ['mensalidades' => $mensalidades]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->mensalidadeRepository->delete($id);
        return redirect()->route('mensalidades.index')->with('message', MessageHelper::createMessageObject('success', 'Mensalidade excluída com sucesso!'));
    }
}
