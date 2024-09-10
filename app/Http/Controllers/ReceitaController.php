<?php
namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class ReceitaController extends Controller
{
    
    public function index()
    {
        return Recipe::all();
    }

    
    public function show($id)
    {
        return Recipe::findOrFail($id);
    }

  
    public function store(Request $request)
    {
        
        $dadosValidados = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'ingredientes' => 'required|array',
            'ingredientes.*' => 'string', 
            'instrucoes' => 'required|array',
            'instrucoes.*' => 'string', 
        ]);

        
        $receita = Recipe::create($dadosValidados);

      
        return response()->json([
            'message' => 'Receita recebida com sucesso!',
            'data' => $receita
        ], 201);
    }

  
    public function update(Request $request, $id)
    {
        $receita = Recipe::findOrFail($id);

        $dadosValidados = $request->validate([
            'titulo' => 'sometimes|required|string|max:255',
            'descricao' => 'sometimes|required|string',
            'ingredientes' => 'sometimes|required|string',
            'instrucoes' => 'sometimes|required|string',
        ]);

        $receita->update($dadosValidados);

        return $receita;
    }

   
    public function destroy($id)
    {
        $receita = Recipe::findOrFail($id);
        $receita->delete();

        return response()->json(null, 204);
    }
}