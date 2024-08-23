<!-- resources/views/areas/index.blade.php -->

@extends('layouts.main')

@section('content')
    <div>
        <h2>Listagem de Áreas</h2>
        <a href="{{ route('areas.create') }}" class="btn btn-secondary mb-3">Criar Nova Área</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Criado em</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($areas as $areas)
                <tr>
                    <td>{{ $areas->id }}</td>
                    <td>{{ $areas->nome }}</td>
                    <td>{{ $areas->created_at ? $areas->created_at->format('d/m/Y H:i:s') : 'Data não disponível' }}</td>
                    <td>
                        <a href="{{ route('areas.show', $areas->id) }}" class="btn btn-outline-secondary btn-sm">Ver</a>
                        <a href="{{ route('areas.edit', $areas->id) }}" class="btn btn-secondary btn-sm">Editar</a>
                        <form action="{{ route('areas.destroy', $areas->id) }}" method="POST" style="display: inline-block;">
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
