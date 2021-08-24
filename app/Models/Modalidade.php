<?php

namespace App\Models;

use App\Helpers\FinancialHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modalidade extends Model
{
    use HasFactory;
    public function getDuracaoBRTimeAttribute() {
      if($this->horaOuMinuto == 'hora') {
        return substr($this->duracao,1,1)." hora";
      }
      return substr($this->duracao, 3,2)." minutos";
    }
    public function getHoraOuMinutoAttribute() {
      if(substr($this->duracao, 0,2) >= 1) {
        return "hora";
      }
        return "minuto";
    }
    public function getValorBRAttribute() {
      return FinancialHelper::formatToBRL($this->valor);
    }
    public function getValorIntAttribute() {
      if($this->horaOuMinuto == 'hora') {
        return substr($this->duracao, 0,2);
      }
      return substr($this->duracao, 3,2);
    }
    public function matriculas() {
    	return $this->hasMany('App\Models\Matricula', 'id_modalidade');
    }
}
