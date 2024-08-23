<!-- resources/views/status/show.blade.php -->

@extends('layouts.main')

@section('content')
    <div>
        <h2>Detalhes do Status - {{ $status->nome }}</h2>
        <p><strong>ID:</strong> {{ $status->id }}</p>
        <p><strong>Nome:</strong> {{ $status->nome }}</p>
        <p><strong>Pontos:</strong> {{ $status->peso }}</p>
        <p><strong>Criado em:</strong> {{ $status->created_at->format('d/m/Y H:i:s') }}</p>
        <div>
            <a href="{{ route('status.index') }}" class="btn btn-secondary mt-2">Voltar</a>
            <a href="{{ route('status.edit', $status->id) }}" class="btn btn-outline-secondary">Editar</a>
            <form action="{{ route('status.destroy', $status->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</button>
            </form>
        </div>
    </div>
@endsection
