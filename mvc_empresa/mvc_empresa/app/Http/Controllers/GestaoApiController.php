<?php

namespace App\Http\Controllers;
use App\Models\Autor;
use Illuminate\Http\Request;


class SetorApiController extends Controller
{
    // LISTAR GESTAO
    public function listarApi(Request $request)
    {
        try {
            $query = Gestso::query();

            // filtro por nome
            if ($request->filled('nome')) {
                $query->where('nome', 'like', '%' . $request->nome . '%');
            }

            // filtro por tipo_materia_prima
            if ($request->filled('tipo_materia_prima')) {
                $query->where('tipo_materia_prima', $request->tipo_materia_prima);
            }
            
            // filtro por data_fabricacao
            if ($request->filled('data_fabricacao')) {
                $query->where('data_fabricacao', $request->data_fabricacao);
            }
            
            // filtro por quantidade
            if ($request->filled(' quantidade')) {
                $query->where(' quantidade', $request-> quantidade);
            }
            
            // filtro por preco_venda
            if ($request->filled('preco_venda')) {
                $query->where('preco_venda', $request->preco_venda);
            }

            $setores = $query->get();
            return response()->json([
                'success' => true,
                'data' => $gestao
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor',
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    // CRIAR GESTAO
    public function addApi(Request $request) {
        try {

            $request->validate([
                'nome' => 'required|string|max:255',
                'tipo_materia_prima'=>'required|string',
                'data_fabricacao'=>'required|stringric',
                'quantidade'=>'required|numeric',
                'preco_venda'=>'required|numeric'
            ]);

            $gestao = new Gestao();

            $gestao->nome = $request->nome;
            $gestao->tipo_materia_prima = $request->tipo_materia_prima ;
            $gestao->data_fabricacao = $request->data_fabricacao ;
            $gestao->quantidade = $request->quantidade ;
            $gestao->preco_venda = $request->preco_venda;

            $gestao->save();

            return response()->json([
                'success' => true,
                'message' => 'Setor criado com sucesso!',
                'setor' => $setor
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro de validação',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor',
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    // ATUALIZAR GESTAO
    public function updateApi(Request $request, $id) {
        try {

            $request->validate([
               'nome' => 'required|string|max:255',
                'tipo_materia_prima'=>'required|string',
                'data_fabricacao'=>'required|stringric',
                'quantidade'=>'required|numeric',
                'preco_venda'=>'required|numeric'
            ]);

            $gestao = Gestao::findOrFail($id);
            $gestao->nome = $request->nome;
            $gestao->tipo_materia_prima = $request->tipo_materia_prima ;
            $gestao->data_fabricacao = $request->data_fabricacao ;
            $gestao->quantidade = $request->quantidade ;
            $gestao->preco_venda = $request->preco_venda;

            $gestao->save();

            return response()->json([
                'success' => true,
                'message' => 'Gestao atualizado com sucesso!',
                'setor' => $gestao
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro de validação',
                'errors' => $e->errors()
            ], 422);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gestao não encontrado'
            ], 404);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor',
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    // DELETAR GESTAO
    public function deletarApi($id){
        try {

            $gestao = Gestao::findOrFail($id);
            $gestao->delete();

            return response()->json([
                'success' => true,
                'message' => 'Gestao deletado com sucesso!'
            ], 200);

        }catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gestao não encontrado'
            ], 404);

        }catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor',
                'errors' => $e->getMessage()
            ], 500);
        }
    }
}