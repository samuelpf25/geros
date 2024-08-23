<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'senha' => 'required|string',
        ]);

        $usuario = Usuarios::where('login', $request->login)->first();

        if ($usuario && Hash::check($request->senha, $usuario->senha)) {
            Auth::login($usuario);
            Log::info('Usuário autenticado', ['user_id' => $usuario->id]);
            Log::info('Sessão atual', ['session' => session()->all()]);
            Log::info('Usuário autenticado', ['user' => Auth::user()]);

            return redirect()->route('os_gestao.index');
        }

        Log::info('Falha na autenticação', ['login' => $request->login]);
        return redirect()->route('login')->with('error', 'Login ou senha inválidos.');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
