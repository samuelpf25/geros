@extends('layouts.main')

@section('title','Cadastro')

@section('content')
<h2>Usuários Cadastrados</h2>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Função</th>
            <th>Login</th>
            <th>Criado em</th>
            <th>Editado em</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->id }}</td>
            <td>{{ $usuario->nome }}</td>
            <td>{{ $usuario->telefone }}</td>
            <td>{{ $usuario->funcao }}</td>
            <td>{{ $usuario->login }}</td>
            <td>{{ $usuario->created_at }}</td>
            <td>{{ $usuario->updated_at }}</td>
            <td>
                <a href="{{ route('usuarios.show', $usuario->id) }}" class="btn btn-outline-secondary btn-sm">Ver</a>
                <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-secondary btn-sm">Editar</a>
                <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection