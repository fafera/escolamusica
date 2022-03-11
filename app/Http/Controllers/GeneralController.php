<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index() {
    return view('index');
  }
}
