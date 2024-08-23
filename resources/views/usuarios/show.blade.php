<!-- resources/views/usuarios/show.blade.php -->

@extends('layouts.main')

@section('content')
    <div>
        <h2>Detalhes do Usuário - {{ $usuarios->nome }}</h2>
        <p><strong>ID:</strong> {{ $usuarios->id }}</p>
        <p><strong>Nome:</strong> {{ $usuarios->nome }}</p>
        <p><strong>Telefone:</strong> {{ $usuario->telefone }}</p>
        <p><strong>Função:</strong> {{ $usuario->funcao }}</p>
        <p><strong>Login:</strong> {{ $usuario->login }}</p>
        <p><strong>Criado em:</strong> {{ $usuarios->created_at->format('d/m/Y H:i:s') }}</p>
        <div>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary mt-2">Voltar</a>
            <a href="{{ route('usuarios.edit', $usuarios->id) }}" class="btn btn-outline-secondary">Editar</a>
            <form action="{{ route('usuarios.destroy', $usuarios->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</button>
            </form>
        </div>
    </div>
@endsection
