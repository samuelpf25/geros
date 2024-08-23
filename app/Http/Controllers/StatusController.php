<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status = Status::all(); // Recupera todas as áreas do banco de dados
        return view('status.index', compact('status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('status.create');
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

        // Cria uma nova status no banco de dados
        Status::create($request->all());

        return redirect()->route('status.index')->with('success', 'Status criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $status = Status::findOrFail($id); // Encontra a área pelo ID
        return view('status.show', compact('status'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $status = Status::findOrFail($id); // Encontra a status pelo ID
        return view('status.edit', compact('status'));
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

        // Atualiza a status no banco de dados
        $status = Status::findOrFail($id);
        $status->update($request->all());

        return redirect()->route('status.index')->with('success', 'Status atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $status = Status::findOrFail($id); // Encontra a área pelo ID
        $status->delete();

        return redirect()->route('status.index')->with('success', 'Área deletada com sucesso.');
    }
}
