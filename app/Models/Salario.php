<?php

namespace App\Models;

use App\Helpers\DateHelper;
use App\Helpers\FinancialHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salario extends Model
{
    protected $fillable = ['id_professor', 'mes', 'ano', 'valor'];
    use HasFactory;

    public function getValorBRLAttribute() {
      return FinancialHelper::formatToBRL($this->valor);
    }
    public function getMesExtensoAttribute() {
      return DateHelper::getMonthName($this->mes);
    }
    public function professor() {
        return $this->belongsTo('App\Models\Professor', 'id_professor', 'id');
    }
    public function informesProfessor() {
        return $this->hasMany('App\Models\InformeProfessor', 'id_salario');
    }
    // public function informes() {
    //     return $this->hasManyThrough('App\Models\InformeProfessor', 'App\Models\Professor', 'id', 'id_professor', 'id_professor', 'id')->where('salarios.mes', $this->mes)->where('salarios.ano', $this->ano);
    // }


}
