<!-- resources/views/status/index.blade.php -->

@extends('layouts.main')

@section('content')
    <div>
        <h2>Listagem de Status</h2>
        <a href="{{ route('status.create') }}" class="btn btn-secondary mb-3">Criar Novo Status</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Peso</th>
                    <th>Criado em</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($status as $status)
                <tr>
                    <td>{{ $status->id }}</td>
                    <td>{{ $status->nome }}</td>
                    <td>{{ $status->peso }}</td>
                    <td>{{ $status->created_at->format('d/m/Y H:i:s') }}</td>
                    <td>
                        <a href="{{ route('status.show', $status->id) }}" class="btn btn-outline-secondary btn-sm">Ver</a>
                        <a href="{{ route('status.edit', $status->id) }}" class="btn btn-secondary btn-sm">Editar</a>
                        <form action="{{ route('status.destroy', $status->id) }}" method="POST" style="display: inline-block;">
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
