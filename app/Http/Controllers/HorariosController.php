<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Helpers\MessageHelper;
use App\Models\HorarioFuncionamento;
use App\Repositories\HorarioFuncionamentoRepository;

class HorariosController extends Controller
{
    public $horarioFuncionamentoRepository, $horarios;
    public function __construct(HorarioFuncionamentoRepository $horarioFuncionamentoRepository)
    {
        $this->horarioFuncionamentoRepository = $horarioFuncionamentoRepository;
        $this->horarios = $this->horarioFuncionamentoRepository->all();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $horarios = $this->buildCollectionHorarios($this->horarios);
        return view('pages.horarios.index', ['horarios' => $horarios]);
    }
    private function buildCollectionHorarios($horarios) {
        $horariosFuncionamento = [];
        $horariosFuncionamento['segunda_sexta']['manha'] = $horarios->where('dia_da_semana', 1)->where('titulo', 'Manhã')->first();
        $horariosFuncionamento['segunda_sexta']['tarde'] = $horarios->where('dia_da_semana', 1)->where('titulo', 'Tarde')->first();
        $horariosFuncionamento['sabado']['manha'] = $horarios->where('dia_da_semana', 6)->where('titulo', 'Manhã')->first();
        $horariosFuncionamento['sabado']['tarde'] = $horarios->where('dia_da_semana', 6)->where('titulo', 'Tarde')->first();
        
        return $horariosFuncionamento;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach($this->horarios as $horario) {
            if($horario->dia_da_semana <= 5) {
                if($horario->titulo == 'Manhã') {
                    $horario->horario_inicial = Carbon::parse($request->get('segunda_sexta')['manha']['horario_inicial'])->toTimeString();
                    $horario->horario_final = Carbon::parse($request->get('segunda_sexta')['manha']['horario_final'])->toTimeString();
                    $horario->save();
                }
                if($horario->titulo == 'Tarde') {
                    $horario->horario_inicial = Carbon::parse($request->get('segunda_sexta')['tarde']['horario_inicial'])->toTimeString();
                    $horario->horario_final = Carbon::parse($request->get('segunda_sexta')['tarde']['horario_final'])->toTimeString();
                    $horario->save();
                }
            } else {
                if($horario->titulo == 'Manhã') {
                    $horario->horario_inicial = Carbon::parse($request->get('sabado')['manha']['horario_inicial'])->toTimeString();
                    $horario->horario_final = Carbon::parse($request->get('sabado')['manha']['horario_final'])->toTimeString();
                    $horario->save();
                }
                if($horario->titulo == 'Tarde') {
                    $horario->horario_inicial = Carbon::parse($request->get('sabado')['tarde']['horario_inicial'])->toTimeString();
                    $horario->horario_final = Carbon::parse($request->get('sabado')['tarde']['horario_final'])->toTimeString();
                    $horario->save();
                }
            }
        }
        return redirect()->route('horarios.index')->with('message', MessageHelper::createMessageObject('success', 'Horários alterados com sucesso'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
