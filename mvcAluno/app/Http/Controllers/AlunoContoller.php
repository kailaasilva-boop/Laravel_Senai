<?php

namespace App\Http\Controllers;
use App\Models\Aluno;

use Illuminate\Http\Request;

class AlunoControlles extends Controller
{
    public function listar(){
        $query = Aluno::query();
        $aluno = $query->get();
        return view('listar', compact('alunos'));
    }
}