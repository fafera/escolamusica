<?php 

namespace App\Repositories;

use App\Models\Desconto;
class DescontoRepository extends AbstractRepository {
    protected $model = Desconto::class;
    public function __construct(Desconto $model)
    {
        $this->model = $model;
    }
}
?>