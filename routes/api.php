<?php


use App\Models\Notificacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAPIController;
use App\Http\Controllers\ClienteAPIController;
use App\Http\Controllers\NotificacaoController;
use App\Http\Controllers\PagamentoAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* END-POINTS DO SISTEMA TV-CABO para acessar Clientes */
Route::get('/clientes', [ClienteAPIController::class, 'index']);
Route::post('/clientes', [ClienteAPIController::class, 'store']);

Route::middleware('throttle:100,1')->get('/cliente/{id}', [ClienteAPIController::class, 'show']);


Route::get('/clienteInativo/{id}', [ClienteAPIController::class, 'showInativo']);
Route::put('/clientes/{id}', [ClienteAPIController::class, 'update']);
Route::delete('/clientes/{id}', [ClienteAPIController::class, 'destroy']);
Route::get('/procurar/{campo}/{valor}', [ClienteAPIController::class, 'ExisteValor']);


/* END-POINTS DO SISTEMA TV-CABO para acessar Pagamento */
Route::get('/pagamentos/{id}/{ano}', [PagamentoAPIController::class, 'show']);
Route::get('/pagamento/{id}/{ano}/{mes}', [PagamentoAPIController::class, 'existePagamento']); // Procura se já existe um pagamento 
Route::delete('/pagamento/{id}', [PagamentoAPIController::class, 'destroy']);



/* END-POINT DO SISTEMA TV-CABO para verificar clientes que pagam hoje */

Route::get('/notificacao', [NotificacaoController::class, 'existeNotificacao']); // Procura se já existe notificação para hoje

// Notificacao de clientes pagamento hoje
Route::get('/clientesPagandoHoje', [ClienteAPIController::class, 'clientesPagandoHoje']); // Procura se já existe notificação para hoje


/*END-POINT DO SISTEMA TV-CABO para verificar se o número de casa já foi usado */
Route::get('/casa/{num_casa}', [ClienteAPIController::class, 'casa']);


/* END-POINTS DO SISTEMA TV-CABO para acessar Administradores/Users */
Route::post('/senha/{senha?}', [UserAPIController::class, 'verifica_senha']);

Route::delete('/users/{id}', [UserAPIController::class, 'destroy']);





Route::get('/teste', [ClienteAPIController::class, 'teste']);

