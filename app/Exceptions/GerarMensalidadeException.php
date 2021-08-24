<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class GerarMensalidadeException extends Exception
{
    public function report() {
      Log::debug('Mensalidades já geradas');
    }
    public function render() {
      return view('exceptions.gerar-mensalidade');
    }
}
