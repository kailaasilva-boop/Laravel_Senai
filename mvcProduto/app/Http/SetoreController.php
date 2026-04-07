<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use Illuminate\Http\Request;

class SetoresController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'numCorredor' => 'required|string|max:255|unique:setores,numCorredor'
        ]);

        Setor::create([
            'nome' => $request->nome,
            'numCorredor' => $request->numCorredor,
        ]);

        return redirect()->back()->with('success', 'Setor cadastrado com sucesso!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'numCorredor' => "required|string|max:255|unique:setores,numCorredor,$id"
        ]);

        $setor = Setor::findOrFail($id);

        $setor->nome = $request->nome;
        $setor->numCorredor = $request->numCorredor;

        $setor->save();

        return redirect()->route('setor.listar');
    }
}