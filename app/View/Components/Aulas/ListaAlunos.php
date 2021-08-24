<?php

namespace App\View\Components\Aulas;

use App\Models\Professor;
use App\Repositories\ProfessorRepository;
use Illuminate\View\Component;

class ListaAlunos extends Component
{
    public $professor;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($professor)
    {
        $this->professor = $this->getProfessor($professor);
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
        return view('components.aulas.lista-alunos');
    }
    
}
