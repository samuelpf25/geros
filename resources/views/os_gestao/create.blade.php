@extends('layouts.main')

@section('title','Cadastro')

@section('content')

<div class="container mt-5">
    <h1>Cadastrar OS</h1>
    <form action="{{ route('os_gestao.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" required>
        </div>
        <div class="mb-3">
            <label for="funcao" class="form-label">Função</label>
            <select class="form-select" id="funcao" name="funcao">
                <option selected disabled>Selecione uma função</option>                
                <option value="empresa">Empresa</option>
                <option value="contratante">Contratante</option>
                <option value="usuario">Usuário</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="login" class="form-label">Login</label>
            <input type="text" class="form-control" id="login" name="login" required>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" required>
        </div>
        
        <button type="submit" class="btn btn-secondary mt-2">Cadastrar</button>
    </form>
</div>

@endsection