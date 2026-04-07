<?php

namespace App\Http\Controllers;
use App\Models\Aluno;

use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function listar(){
        //$query = Aluno::query();
        //$alunos = $query->get();

        $aluno = Aluno::with('turma')->get();
        //select * from alunos join turmas on turma_id = turmas.id;
        return view('listar', compact('alunos'));
    }

    public function add(Request $request){
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:alunos,email',
            'turma_id' => 'nullable|exists:turmas,id'
        ]);

        Aluno::create([
            'nome' => $request->nome,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('sucess','Aluno Cadastrado com sucesso!');
    }

    public function atualizar($id){
        $aluno =Aluno::findOrFail($id);
        return view('atualiazar', compact('aluno'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome'=> 'required|string|max:255',
            'email'=>"required|srting|max.255|unique:alunos,email,$id"
        ]);

        $aluno = Aluno::findOrFail($id);

        $aluno->nome = $request->nome;
        $aluno->email = $request->email;

        $aluno->save();
        return redirect()->back()->with('sucess', 'Aluno atualizado com suceso');

    }
    public function deletar($id){
        $aluno = Aluno::findOrFail($id); // buscar o aluno para depois deletar
        $aluno->delete(); // faz o delete no banco de dados

        return redirect()->route('aluno.listar')
            ->with('success', 'Aluno excluído com sucesso!');
    }
}
