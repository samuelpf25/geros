<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categorias::join('areas', 'categorias.id_area', '=', 'areas.id')
        ->select(
            'categorias.id',
            'categorias.nome',
            'areas.nome as nome_area',
            'categorias.peso',
            'categorias.created_at',
            'categorias.updated_at'
        )
        ->get(); 
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areas = Areas::all();
        return view('categorias.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'peso' => 'required|integer',
        ]);

        // Cria uma nova categorias no banco de dados
        Categorias::create($request->all());

        return redirect()->route('categorias.index')->with('success', 'Status criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categorias = DB::table('categorias')
        ->join('areas', 'categorias.id_area', '=', 'areas.id')
        ->select(
            'categorias.id',
            'categorias.nome',
            'categorias.peso',
            'categorias.created_at',
            'categorias.updated_at',
            'areas.nome as nome_area'
        )
        ->where('categorias.id', $id)
        ->first(); // Encontra a área pelo ID
        return view('categorias.show', compact('categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categorias = DB::table('categorias')
        ->join('areas', 'categorias.id_area', '=', 'areas.id')
        ->select(
            'categorias.id',
            'categorias.nome',
            'categorias.peso',
            'categorias.created_at',
            'categorias.updated_at',
            'areas.nome as nome_area'
        )
        ->where('categorias.id', $id)
        ->first(); // Encontra a área pelo ID// Encontra a categorias pelo ID
        $areas = Areas::all();
        return view('categorias.edit', compact('categorias','areas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'peso' => 'required|integer',
        ]);

        // Atualiza a categorias no banco de dados
        $categorias = Categorias::findOrFail($id);
        $categorias->update($request->all());

        return redirect()->route('categorias.index')->with('success', 'Status atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categorias = Categorias::findOrFail($id); // Encontra a área pelo ID
        $categorias->delete();

        return redirect()->route('categorias.index')->with('success', 'Área deletada com sucesso.');
    }
}
