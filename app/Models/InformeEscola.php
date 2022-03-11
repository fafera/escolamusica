<?php

namespace App\Models;

use App\Helpers\FinancialHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InformeEscola extends Model
{
    use HasFactory;
    protected $table = 'informe_escola';
    protected $fillable = ['id_aula', 'id_mensalidade',  'valor', 'id_informe_professor'];
    public function getValorBRLAttribute() {
      return FinancialHelper::formatToBRL($this->valor);
    }
    public function informeProfessor() {
      return $this->belongsTo('App\Models\InformeProfessor', 'id_informe_professor');
    }
}
