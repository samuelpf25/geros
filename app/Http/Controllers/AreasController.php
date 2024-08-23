<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use Illuminate\Http\Request;

class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areas = Areas::all(); // Recupera todas as áreas do banco de dados
        return view('areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('areas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        // Cria uma nova areas no banco de dados
        Areas::create($request->all());

        return redirect()->route('areas.index')->with('success', 'Área criada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $areas = Areas::findOrFail($id); // Encontra a área pelo ID
        return view('areas.show', compact('areas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $areas = Areas::findOrFail($id); // Encontra a areas pelo ID
        return view('areas.edit', compact('areas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        // Atualiza a areas no banco de dados
        $areas = Areas::findOrFail($id);
        $areas->update($request->all());

        return redirect()->route('areas.index')->with('success', 'Área atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $areas = Areas::findOrFail($id); // Encontra a área pelo ID
        $areas->delete();

        return redirect()->route('areas.index')->with('success', 'Área deletada com sucesso.');
    }
}
