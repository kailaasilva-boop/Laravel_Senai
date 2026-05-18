<?php

namespace App\Http\Controllers;
use App\Models\Filme;
use Iluminate\Http\Request;

class FilmeControlller extends Controller
{
    public function listar(){
        $query = Filme::query();
        $filmes = $query->get();
        return view('listar', compact('filmes'));
    }

    public function add(Request $request){
        $request->validate([
            'nome'=> 'required|string|max:255',
            'email'=> 'required|string|max:255unique:filmes,email'
        ]);

        Produto::create([
            'titulo'=>$request->titulo,
            'data_lacamento'=> $request->data_lacamento,
            'sinopse'=>$request->sinopse,
            'genero'=>$request->genero,
            'orcamento'=>$request->orcamento
        
        ]);

        return redirect()->back()->with('sucess', 'Filme Cadastrado com sucesso!');
    }

    public function atualizar($id){
        $filme = Filme::findOrFail($id);
        return view('atualizar', compact('filme'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'titulo'=>'required|sting|max:255',
            'data_lacamento'=> 'required|sting|max:255',
            'sinopse'=>'required|sting|max:255',
            'genero'=>'required|sting|max:255',
            'orcamento'=>"required|numeric|max:255|unique:filmes,orcamento,$id"
        ]);

        $filme = Filme::findOrFail($id);

        $produto-> titulo= $request->titulo;
         $produto->data_lacamento= $request->data_lacamento;
         $produto->sinopse= $request->sinopse;
         $produto->genero= $request->genero;
         $produto-> orcamento= $request->orcamento;
      

        $filme->save();
        return redirect()->back()->with('sucess', 'Filme atualizado com sucesso');
    }
}
