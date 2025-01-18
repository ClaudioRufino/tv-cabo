<?php

use App\Http\Controllers\ClienteAPIController; // Testando apenas

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgenciaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DividaController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\FichaContratoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinhaController;
use App\Http\Controllers\MultaController;
use App\Http\Controllers\NotificacaoController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth')->group(function () {

    Route::resources([
        'home' => HomeController::class,
        'user' => UserController::class,
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
        Route::resource('admin', AdminController::class)->except(['create']);
        // Route::resource('admin', UserController::class)->except(['create']);
});

Route::get('admin/{id}', [PagamentoController::class, 'teste'])->name('admin.teste');
Route::get('admin', [UserController::class, 'create'])->name('admin.create');


// Rota representando a definição do sistema
Route::get('definicao', [HomeController::class, 'definicao'])->name('home.definicao');


/* ROTAS COMPLEMENTARES DAS COMPOSTAS */

/* Rotas complementares do Pagamento de mensalidade e dívida */
Route::get('pagamentoId/{id}', [PagamentoController::class, 'createId'])->name('pagamentoId');
Route::get('pagamentoP/{id}/{ano}', [PagamentoController::class, 'showP'])->name('pagamento.showP');
Route::get('pagamento/{id}/{ano}/{mes}/{valor}', [PagamentoController::class, 'editar'])->name('pagamento.editar');


/* Rotas complementares do Pagamento de Multas */
Route::get('pagamentoMultaId/{cliente_id}/{multa_id}', [MultaController::class, 'createId'])->name('pagamentoMultaId');

/* Rota do calendário */
Route::get('calendario', function(){
    return view('calendario');
})->middleware(['auth', 'verified'])->name('calendario');

Route::get('/', function(){
    return view('auth.login');
});


Route::get('/clienteAtivar/{id}', [ClienteController::class, 'ativar'])->name('cliente.ativar');

Route::get('/page2', [ClienteController::class, 'pagina2']);

Route::get('page3', function(){
    return view('paginacao');
})->name('page3');



Route::get('teste', function(){
    return view('teste');
})->name('teste');



/** Routas geradas pelo Breeze para Autenticação */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
