<?php

namespace App\Models;

use App\Helpers\FinancialHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformeProfessor extends Model
{
    use HasFactory;
    protected $table = 'informe_professores';
    protected $fillable = ['id_professor', 'id_mensalidade', 'qtd_aulas_realizadas', 'valor', 'id_salario', 'id_aula'];
    public function getValorBRLAttribute() {
        return FinancialHelper::formatToBRL($this->valor);
    }
    public function professor() {
        return $this->belongsTo('App\Models\Professor', 'id_professor');
    }
    public function mensalidade() {
        return $this->belongsTo('App\Models\Mensalidade', 'id_mensalidade');
    }
    public function aulaTeste() {
        return $this->belongsTo('App\Models\AulaTeste', 'id_aula');
    }
    public function salario() {
        return $this->belongsTo('App\Models\Salario', 'id_salario', 'id');
    }
    public function informeEscola() {
        return $this->hasOne('App\Models\InformeEscola', 'id_informe_professor');
    }
    public function scopeFromDate($query, $mes, $ano) {
        return $query->join('mensalidades', 'mensalidades.id', '=', 'informe_professores.id_mensalidade')->where('mensalidades.mes', $mes)->where('mensalidades.ano', $ano)->get();
    }

}
