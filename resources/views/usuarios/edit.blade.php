@extends('layouts.main')

@section('content')
<div>
    <h2>Editar Usuário - {{ $usuarios->nome }}</h2>
    <form action="{{ route('usuarios.update', $usuarios->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $usuarios->nome }}" required>
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="{{ $usuarios->telefone }}" required>
        </div>
        <div class="mb-3">
            <label for="funcao" class="form-label">Função</label>
            <select class="form-select" id="funcao" name="funcao">
                <option selected disabled>Selecione uma função</option>
                <option value="empresa" {{ $usuarios->funcao=='empresa' ? 'selected' : '' }}>Empresa</option>
                <option value="contratante" {{ $usuarios->funcao=='contratante' ? 'selected' : '' }}>Contratante</option>
                <option value="usuario" {{ $usuarios->funcao=='usuario' ? 'selected' : '' }}>Usuário</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $usuarios->email }}" required>
        </div>

        <div class="mb-3">
            <label for="login" class="form-label">Login</label>
            <input type="text" class="form-control" id="login" name="login" value="{{ $usuarios->login }}" required>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" value="{{ $usuarios->senha }}" required>
        </div>

        <button type="submit" class="btn btn-secondary mt-2">Atualizar</button>
    </form>
</div>
@endsection