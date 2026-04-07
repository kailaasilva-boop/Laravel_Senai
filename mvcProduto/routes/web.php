<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produto/listar',[ProdutoController::class, 'listar'])->name('produto.listar');

Route::get('/produto/cadastrar',[ProdutoController::class,'cadastro'])->name('produto.cadastro');

Route::post('/produto/salvar',[ProdutoController::class, 'add'])->name('produto.salvar');

Route::get('/produto{id}/atualizar', [ProdutoController::class, 'atualizar'])->name('produto.atualizar');

Route::put('/produto/{id}/update', [ProdutoController::class, 'update'])->name('prouto.update');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/setor/listar', [SetoresController::class, 'listar'])->name('setor.listar');

Route::get('/setor/cadastro', [SetoresController::class, 'cadastro'])->name('setor.cadastro');


