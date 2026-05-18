<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Filme;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'dataNascimento' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'telefone' => 'required|numeric|max:255|unique:autores,telefone'
        ]);

        Setor::create([
            'nome' => $request->nome,
            'dataNascimento' => $request->data_nascimento,
            'email' => $request->email,
            'telefone' => $request->telefone,
        ]);

        return redirect()->back()->with('success', 'Autor cadastrado com sucesso!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'dataNascimento' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'telefone' => "required|numeric|max:255|unique:autores,telefone,$id"
        ]);

        $auto = Autor::findOrFail($id);

        $autor->nome = $request->nome;
        $autor->dataNascimento = $request->dataNascimento;
        $autor->email = $request->email;
        $autor->telefone = $request->telefone;

        $autor->save();

        return redirect()->route('autor.listar');
    }
}