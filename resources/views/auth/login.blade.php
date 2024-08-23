@extends('layouts.main')

@section('content')
<div>
    <h2>Login</h2>
    @if(session('error'))
        <div>{{ session('error') }}</div>
    @endif
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="login">Login</label>
            <input type="text" class="form-control" id="login" name="login" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" required>
        </div>
        <button type="submit" class="btn btn-secondary mt-5">Entrar</button>
        <a href="{{ route('usuarios.create') }}" class="btn btn-secondary mt-5">Criar Usuário</a>
    </form>
</div>
@endsection
