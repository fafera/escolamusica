<?php

use App\Helpers\DateHelper;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AlunosController;
use App\Http\Controllers\AulasController;
use App\Http\Controllers\CobrancasController;
use App\Http\Controllers\DBController;
use App\Http\Controllers\DescontosController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\MatriculasController;
use App\Http\Controllers\MensalidadesController;
use App\Http\Controllers\ModalidadesController;
use App\Http\Controllers\PagamentosController;
use App\Http\Controllers\ProfessoresController;
use App\Http\Controllers\SalariosController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/mensalidades/corrigir', [MensalidadesController::class, 'corrigir']);
//Route::get('/limparSalarios', [DBController::class, 'limparSalarios']);

Auth::routes();

Route::get('/',[GeneralController::class, 'index']);
Route::get('aulas/teste/{id}', [AulasController::class, 'show'])->name('aulas.showAulaTeste');
Route::get('aulas/exportar', [AulasController::class, 'exportarAulas'])->name('aulas.exportarAulas');
Route::post('aulas/exportar', [AulasController::class, 'exportar'])->name('aulas.exportar');

//Professor
Route::resource('aulas', AulasController::class);

Route::post('alunos/verificar-matricula', [AlunosController::class, 'verifyMatricula'])->name('alunos.verifyMatricula');
Route::post('alunos/getMensalidadesJSON', [AlunosController::class, 'getMensalidadesJSON'])->name('alunos.getMensalidadesJSON');
Route::resource('alunos', AlunosController::class);
Route::get('matriculas/gerarMensalidades', [MatriculasController::class, 'gerarMensalidades'])->name('matriculas.gerarMensalidades');
Route::post('matriculas/gerarMensalidades', [MatriculasController::class, 'storeMensalidades'])->name('matriculas.gerarMensalidades');
Route::post('mensalidades/storefrommatricula', [MensalidadesController::class, 'storeFromMatricula'])->name('mensalidades.storeFromMatricula');
Route::post('mensalidades/filtrar', [MensalidadesController::class, 'filter'])->name('mensalidades.filtrar');
Route::resource('mensalidades', MensalidadesController::class);
Route::resource('descontos', DescontosController::class);
Route::get('matriculas/liberar', [MatriculasController::class, 'liberar'])->name('matriculas.liberar');
Route::post('matriculas/liberar', [MatriculasController::class, 'storeLiberar'])->name('matriculas.storeLiberar');
Route::delete('matriculas/destroyLiberada/{matricula}', [MatriculasController::class, 'destroyLiberada'])->name('matriculas.destroyLiberada');
Route::get('matriculas/create/{id}', [MatriculasController::class, 'create'])->name('matriculas.createFromId');
Route::post('matriculas/getaulasprevistasmes', [MatriculasController::class, 'aulasPrevistasMes'])->name('matriculas.aulasPrevistsasMes');
Route::get('matriculas/descontos', [MatriculasController::class, 'descontos'])->name('matriculas.descontos');
Route::resource('matriculas', MatriculasController::class);
Route::post('alunos/store/matricula', [AlunosController::class, 'storeMatricula'])->name('alunos.storeMatricula');
Route::post('alunos/gettab', [AlunosController::class, 'getTab']);
Route::post('alunos/getmodal', [AlunosController::class, 'getModal']);
Route::post('professores/get/json', [ProfessoresController::class, 'receiveJSON']);
//Professor
Route::resource('/professores', ProfessoresController::class);
Route::get('/professores/{id}/matriculas', [ProfessoresController::class, 'matriculas'])->name('professores.matriculas');
Route::get('/professores/{id}/aulas', [ProfessoresController::class, 'aulas'])->name('professores.aulas');
Route::get('/professores/{id}/agenda/{weekDay}', [ProfessoresController::class, 'agenda'])->name('professores.agenda');
Route::post('/agenda/get', [AgendaController::class, 'get']);

Route::resource('/pagamentos', PagamentosController::class);
Route::resource('/cobrancas', CobrancasController::class);
Route::post('/modalidades/getvalor', [ModalidadesController::class, 'getValorAjax']);
Route::post('/salarios/gerar', [SalariosController::class,'generate'])->name('salarios.generate');
Route::resource('/salarios', SalariosController::class);
Route::resource('/users', UserController::class);

