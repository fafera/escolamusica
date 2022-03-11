<?php
namespace App\Http\Controllers;

use App\Models\Professor;
use App\Services\AgendaServices;
use Illuminate\Http\Request;

class AgendaController extends Controller
{

  public function get(Request $request) {
    $professor = Professor::findOrFail($request->get('professor'));
    $diaDaSemana = $request->get('dia_da_semana');
    $agenda = new AgendaServices($professor, $diaDaSemana);
    return view('components.agenda.table-data', ['professor' => $professor, 'diaDaSemana' => $diaDaSemana, 'agenda' => $agenda->getAgendaFromProfessorByWeekDay()]);
  }
}
