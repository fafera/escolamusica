<?php

namespace App\Exceptions;

use Exception;

class DiaDaSemanaException extends Exception
{
    public function report() {
      \Log::debug('Dia da semana inválido');
    }
    public function render() {
      return view('exceptions.dia_da_semana');
    }
}
