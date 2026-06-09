<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestaoApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('gestao',[SetorApiController::class, 'listarApi']);
Route::post('gestao/add',[SetorApiController::class, 'addApi']);
Route::put('gestao/atualizar/{id}',[SetorApiController::class, 'updateApi']);
Route::put('gestao/atualizar/{id}',[SetorApiController::class, 'updateApi']);
Route::delete('gestao/deletar/{id}',[SetorApiController::class, 'deletarApi']);