<?php
namespace App\Http\Controllers;
use App\Models\Filme;
use App\Models\Autor;

use Illuminate\Http\Request;

class AutorApiController extends Controller
{
    public function listarApi(){
        $autor = Autor::all();
        return response()->json($autor);
    }


    public function addApi(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'data_Nascimento' => 'required|string|max:255',
            'email' =>' required|string|max:255',
            'telefone' => 'required|numeric|max:255',
            // para poder ser nulo ou existir na tabela autor
        ]);

        $autor = Autor::create([
            'nome' => $request->nome,
            'data_Nascimento' => $request->data_nascimento,
            'email'=> $request->email,
            'telefone'=> $request->telefone,

        ]);

        return response()->json([
            'message' => 'Autor Criado',
            'autor' => $autor
        ], 200);
    }
    
    public function updateApi(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'data_Nascimento' => 'required|string|max:255',
            'email'=>'required|string|max:255',
            'telefone' => 'required|numeric|max:255',
        ]);

        $autor = Autor::findOrFail($id); // buscar autor para ser atualizado

        $autor->nome = $request->nome; // atualizando o campo nome
        $autor->data_Nascimeto = $request->data_Nascimento; // atualizando o campo data_Nascimento
        $autor->email = $request->email; // atualizando o campo email
        $autor->telefone = $request->telefone; // atualizando o campo telefone

        $autor->save(); // salvando no banco de dados(fazendo update)

        return response()->json([
            'message' => "Autor atualizado!",
            'autor' => $autor
        ], 200);
    }
    public function deletarApi($id){
        $autor = Autor::findOrFail($id); // buscar o autor para depois deletar
        $autor->delete(); // faz o delete no banco de dados

        return response()->json([
            'message' => "Autor Deletado com Sucesso!",
        ], 200);
    }
}