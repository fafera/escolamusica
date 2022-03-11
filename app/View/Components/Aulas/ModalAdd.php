<?php

namespace App\View\Components\Aulas;

use Illuminate\View\Component;

class ModalAdd extends Component
{
    public $idAluno;
    public $mes;
    public $ano;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($idAluno, $mes, $ano) 
    {
        $this->idAluno = $idAluno;
        $this->mes = $mes;
        $this->ano = $ano;
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.aulas.modal-add');
    }
}
