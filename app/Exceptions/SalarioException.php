<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class SalarioException extends Exception
{
    public function report() {
      \Log::debug('Salário já gerado');
    }
    public function render() {
      return view('exceptions.salario');
    }
}
