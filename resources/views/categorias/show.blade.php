<!-- resources/views/areas/show.blade.php -->

@extends('layouts.main')

@section('content')
    <div>
        <h2>Detalhes do Status - {{ $areas->nome }}</h2>
        <p><strong>ID:</strong> {{ $areas->id }}</p>
        <p><strong>Área:</strong> {{ $areas->nome_area }}</p>
        <p><strong>Nome:</strong> {{ $areas->nome }}</p>
        <p><strong>Pontos:</strong> {{ $areas->peso }}</p>
        <p><strong>Criado em:</strong> {{ $categorias->created_at ? $categorias->created_at->format('d/m/Y H:i:s') : '' }}</p>
        <div>
            <a href="{{ route('areas.index') }}" class="btn btn-secondary mt-2">Voltar</a>
            <a href="{{ route('areas.edit', $areas->id) }}" class="btn btn-outline-secondary">Editar</a>
            <form action="{{ route('areas.destroy', $areas->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</button>
            </form>
        </div>
    </div>
@endsection