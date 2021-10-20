<?php 

namespace App\Repositories;

use App\Models\Aluno;

class AlunoRepository extends AbstractRepository {
    protected $model = Aluno::class;
    public function delete($id) {
        $aluno = $this->model::findOrFail($id);
        $aluno->status = 'inativo';
        return $aluno->save();
    }
}
?>