<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuarios::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        //$igrejas = Igreja::all();
        return view('usuarios.create'); //, compact('igrejas')
    }

    public function store(Request $request)
    { //login	senha	nome	email	created_at	updated_at	telefone	funcao
        try {
            $usuario = new Usuarios();
            $usuario->nome = $request->nome;
            $usuario->email = $request->email;
            $usuario->telefone = $request->telefone;
            $usuario->funcao = $request->funcao;
            $usuario->login = $request->login;
            $usuario->senha = Hash::make($request->senha);;
            $usuario->save();

            return redirect()->route('usuarios.index')->with('success', 'Usuário cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('usuarios.index')->with('error', 'Falha ao cadastrar usuário. ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $usuarios = Usuarios::findOrFail($id);
        return view('usuarios.show', compact('usuarios'));
    }

    public function edit($id)
    {
        $usuarios = Usuarios::findOrFail($id);
        return view('usuarios.edit', compact('usuarios'));
    }

    public function update(Request $request, $id)
    {
        try {
            $usuario = Usuarios::findOrFail($id);
            $usuario->nome = $request->nome;
            $usuario->email = $request->email;
            $usuario->telefone = $request->telefone;
            $usuario->funcao = $request->funcao;
            $usuario->login = $request->login;
            $usuario->senha = Hash::make($request->senha);;
            $usuario->save();

            return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('usuarios.index')->with('error', 'Falha ao atualizar usuário. ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $usuario = Usuarios::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index');
    }
}
