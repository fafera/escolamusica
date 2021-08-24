<?php

namespace App\View\Components\Aulas;

use App\Helpers\DateHelper;
use Illuminate\View\Component;
use App\Repositories\ProfessorRepository;

class ListaAulas extends Component
{
    public $professor, $mes, $ano;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($professor, $mes, $ano)
    {
        $this->professor = $this->getProfessor($professor);
        $this->mes = $mes;
        $this->ano = $ano;
    }
    private function getProfessor($id) {
        $instance = new ProfessorRepository;
        return $instance->get($id);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.aulas.lista-aulas');
    }
}
