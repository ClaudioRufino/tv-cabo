<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgenciaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DividaController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\FichaContratoController;
use App\Http\Controllers\LinhaController;
use App\Http\Controllers\MultaController;
use App\Http\Controllers\NotificacaoController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/* ROUTAS COMPOSTAS DO SISTEMA */

Route::resources([
    'admin' => AdminController::class,
    'linha' => LinhaController::class,
    'multa' => MultaController::class,
    'pedido' => PedidoController::class,
    'divida' => DividaController::class,
    'agencia' => AgenciaController::class,
    'cliente' => ClienteController::class,
    'endereco' => EnderecoController::class,
    'pagamento' => PagamentoController::class,
    'notificacao' => NotificacaoController::class,
    'Ficha_contrato' => FichaContratoController::class
    ]);


/* ROUTAS COMPLEMENTARES DAS COMPOSTAS */


use Barryvdh\DomPDF\Facade\Pdf;

Route::get('/teste', function(){
    $pdf = Pdf::loadView('welcome');
    return $pdf->download('invoice.pdf');
});


