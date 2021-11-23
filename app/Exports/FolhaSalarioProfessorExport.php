<?php

namespace App\Exports;

use App\Models\Salario;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FolhaSalarioProfessorExport implements FromView
{

    public function __construct($salario)
    {
        $this->salario = $salario;
    }
    public function view(): View
    {
        return view('components.salarios.table-informes', [
            'salario' => $this->salario
        ]);
    }
}
