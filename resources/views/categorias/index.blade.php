<!-- resources/views/categorias/index.blade.php -->

@extends('layouts.main')

@section('content')
<div>
    <h2>Listagem de Categorias</h2>
    <a href="{{ route('categorias.create') }}" class="btn btn-secondary mb-3">Criar Nova Categoria</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Área</th>
                <th>Nome</th>
                <th>Peso</th>
                <th>Criado em</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categorias)
            <tr>
                <td>{{ $categorias->id }}</td>
                <td>{{ $categorias->nome_area }}</td>
                <td>{{ $categorias->nome }}</td>
                <td>{{ $categorias->peso }}</td>
                <td>{{ $categorias->created_at ? $categorias->created_at->format('d/m/Y H:i:s') : '' }}</td>
                <td>
                    <a href="{{ route('categorias.show', $categorias->id) }}" class="btn btn-outline-secondary btn-sm">Ver</a>
                    <a href="{{ route('categorias.edit', $categorias->id) }}" class="btn btn-secondary btn-sm">Editar</a>
                    <form action="{{ route('categorias.destroy', $categorias->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection