<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('autor',[AutorApiController::class, 'listarApi']);
Route::post('autor/add',[AutorApiController::class, 'addApi']);
Route::put('autor/atualizar/{id}',[AutorApiController::class, 'updateApi']);
Route::put('autor/atualizar/{id}',[AutorApiController::class, 'updateApi']);
Route::delete('autor/deletar/{id}',[AutorApiController::class, 'deletarApi']);
