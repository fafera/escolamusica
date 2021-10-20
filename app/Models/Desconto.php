<?php

namespace App\Models;

use App\Helpers\FinancialHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Desconto extends Model
{
    protected $fillable = ['id_matricula', 'motivo', 'valor'];
    use HasFactory;

    public function getValorBRAttribute() {
        return FinancialHelper::formatToBRL($this->valor);
    }
    public function setValorAttribute($valor) {
        $this->attributes['valor'] = FinancialHelper::formatBRLtoDecimal($valor);
    }
    public function matricula() {
        return $this->belongsTo('App\Models\Matricula', 'id_matricula');
    }
}
