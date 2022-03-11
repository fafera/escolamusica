<?php

namespace App\View\Components;

use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Professor;
use App\Models\Modalidade;
use Illuminate\View\Component;

class ModalAddMatricula extends Component
{
    public $aluno;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($aluno)
    {
        $this->aluno = $aluno;
    }

    public function modalidades() {
        return Modalidade::all();
    }
    public function cursos() {
        return Curso::all();
    }
    public function professores() {
        return Professor::all();
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.matriculas.modal-add');
    }
}
