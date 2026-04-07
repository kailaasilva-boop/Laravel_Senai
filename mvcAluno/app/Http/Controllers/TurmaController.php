<?php

namespace App\Http\Controllers;
use App\Models\Turma;

use Illuminate\Http\Request;

class TurmaController extends Controller
{
   public function add(Request $request){
        $request->validate([
            'numSerie' => 'required|string|max:255',
            'serie' => 'required|string|max:255|unique:turmas,email'
        ]);

        Turma::create([
            'numSerie' => $request->numSerie,
            'serie' => $request->serie,
        ]);

        return redirect()->back()->with('sucess','Turma Cadastrado com sucesso!');
    }

    public function atualizar($id){
        $turma =Turma::findOrFail($id);
        return view('atualiazar', compact('turma'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'numSerie'=> 'required|string|max:255',
            'serie'=>"required|srting|max.255|unique:turmas,serie,$id"
        ]);

        $turma = Turma::findOrFail($id);

        $turma->numSerie = $request->numSerie;
        $turma->serie = $request->serie;

        $turma->save();
        return redirect()->back()->with('sucess', 'Turma atualizado com suceso');

    }
    public function deletar($id){
        $turma = Turma::findOrFail($id); // buscar o turma para depois deletar
        $turma->delete(); // faz o delete no banco de dados

        return redirect()->route('turma.listar')
            ->with('success', 'Turma excluído com sucesso!');
    } 
}
