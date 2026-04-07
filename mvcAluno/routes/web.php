<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\TurmaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/aluno/listar',[AlunoController::class, 'listar'])->name('aluno.listar');

Route::get('/aluno/cadastrar', function(){ return view('cadastro');})->name('aluno.cadasto');

//POST - enviar os dados para cadastrar usuários
Route::post('/aluno/salvar',[AlunoController::class, 'add'])->name('aluno.salvar');

//Atualizar
Route::get('/aluno{id}/atualizar', [AlunoController::class, 'atualizar'])->name('aluno.atualizar');

Route::put('/aluno/{id}/update', [AlunoController::class, 'update'])->name('aluno.update');

Route::delete('/aluno/{id}',[AlunoController::class, 'deletar'])->name('aluno.deletar');

//rotas da turma

Route::get('/turma/cadastrar', function(){ return view('cadastroTurma');})->name('turma.cadasto');

Route::post('/turma/salvar',[TurmaController::class, 'add'])->name('turma.salvar');

