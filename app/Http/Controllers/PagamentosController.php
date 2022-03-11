<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\MessageHelper;
use App\Repositories\MatriculaRepository;
use App\Repositories\PagamentoRepository;
use App\Repositories\MensalidadeRepository;

class PagamentosController extends Controller
{
    private $pagamentoRepository;

    public function __construct(PagamentoRepository $pagamentoRepository){
        $this->pagamentoRepository = $pagamentoRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.pagamentos.index', ['pagamentos' => $this->pagamentoRepository->all()]);

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
        $stored = $this->pagamentoRepository->store();
        if($stored) {
            return $this->getRedirectStoreRoute($stored);
        }
        return redirect()->route('home')->with('message', MessageHelper::createMessageObject('success', 'Erro ao adicionar pagamento!'));
    }
    private function getRedirectStoreRoute($stored) {
        switch ($stored->tipo) {
            case 'mensalidade':
                return redirect()->route('mensalidades.show',[$stored->mensalidade])->with('message', MessageHelper::createMessageObject('success', 'Pagamento adicionado com sucesso!'));
                break;
            case 'cobranca':
                return redirect()->route('cobrancas.show',[$stored->cobranca])->with('message', MessageHelper::createMessageObject('success', 'Pagamento adicionado com sucesso!'));
                break;
            default:
                return null;
                break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->pagamentoRepository->redirectPaymenteToBillType($id);
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
        $pagamento = $this->pagamentoRepository->get($id);
        $tipo = $pagamento->tipo;
        if($this->pagamentoRepository->delete($id)) {
            switch ($tipo) {
                case 'mensalidade':
                    return redirect()->route('mensalidades.show',[$pagamento->mensalidade])->with('message', MessageHelper::createMessageObject('success', 'Pagamento excluído com sucesso!'));
                    break;

                case 'cobranca':
                    return redirect()->route('cobrancas.show',[$pagamento->cobranca])->with('message', MessageHelper::createMessageObject('success', 'Pagamento excluído com sucesso!'));
                    break;
            }

        }
        return redirect()->route('home')->with('message', MessageHelper::createMessageObject('success', 'Erro ao excluir pagamento!'));
    }
}
