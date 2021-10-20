<?php

namespace App\Repositories;

use App\Models\Cobranca;
use App\Models\Matricula;
use App\Models\Mensalidade;

class MatriculaRepository extends AbstractRepository {
    protected $model = Matricula::class;
    public function __construct(Matricula $model)
    {
        $this->model = $model;
    }
    public function delete($id) {
        $matricula = $this->model::findOrFail($id);
        $matricula->status = 'inativa';
        return $matricula->save();
    }
    public function ativas() {
        return $this->model->ativas();
    }
    // public function store() {
    //     parse_str(request()->get('matricula'), $matricula);
    //     parse_str(request()->get('mensalidade'), $mensalidade);
    //     $ = new MensalidadeRepository(new Mensalidade());

    //     // if(isset($request['desconto'])) {
    //     //     echo "OKaew";
    //     // }
    //     if(isset($mensalidade['matricula'])) {
    //         $this->storeMensalidade($mensalidade);
    //     }


    // }
    // private function storeDesconto($request) {
    // }
    // private function storeMensalidade($request) {
    //     dd($request);
    //     $cobranca = new Cobranca([
    //         'tipo' => 'matricula',
    //         'valor' => $request['matricula'],
    //         'id_matricula' => $request['id_matricula']
    //     ]);
    //     return $cobranca->save();
    // }
}
?>