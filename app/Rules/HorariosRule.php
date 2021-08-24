<?php

namespace App\Rules;

use Carbon\Carbon;
use App\Models\Aula;
use App\Models\AulaTeste;
use App\Models\Matricula;
use App\Models\Professor;
use App\Models\Modalidade;
use App\Helpers\DateHelper;
use Illuminate\Http\Request;
use App\Helpers\MessageHelper;
use App\Services\AgendaServices;
use Illuminate\Contracts\Validation\Rule;

class HorariosRule implements Rule
{
    protected $request, $diaDaSemana, $horario, $id;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(Request $request, $id = null)
    {
        $this->request = $request;
        if($id) {
            $this->id = $id;
        }
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->populateFields();
        if($this->verifyMatricula()) {
            return true;
        }
        return false;
        
    }
    private function populateFields() {
        $this->horario = DateHelper::formatBRTimeToTimestamp($this->request->get('horario'));
        if($this->request->get('dia_da_semana') == null) {
            $this->diaDaSemana = Carbon::parse(DateHelper::formatBRDateToSqlDate($this->request->get('data')))->dayOfWeek;
        } else {
            $this->diaDaSemana = $this->request->get('dia_da_semana');
        }
        
    }
    private function verifyMatricula() {
        $agenda = new AgendaServices(Professor::find($this->request->get('id_professor')), $this->diaDaSemana);
        $modalidade = Modalidade::find($this->request->get('id_modalidade'));
        $matricula = $agenda->verificarMatriculaIntervaloHorario($this->horario, $modalidade->duracao);

        if(isset($matricula) && $matricula->id != $this->id) {
            return null;
        }
        return true;
    }   

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Horário inválido';
    }
}
