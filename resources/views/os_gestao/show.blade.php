<!-- resources/views/os/show.blade.php -->

@extends('layouts.main')

@section('content')
    <div>
        <h2>Detalhes da OS - {{ $os->id_ufes }}</h2>
        <p><strong>ID REF:</strong> {{ $os->id_ufes }}</p>
        <p><strong>Status:</strong> {{ $os->nome_status }}</p>
        <p><strong>Urgência:</strong> {{ $os->urgencia }}</p>
        <p><strong>Área:</strong> {{ $os->nome_area }}</p>     
        <p><strong>Categoria:</strong> {{ $os->nome_categoria }}</p>     
        <p><strong>Local:</strong> {{ $os->localizacao }}</p>     
        <p><strong>Descrição:</strong> {{ $os->descricao }}</p>           
        <p><strong>Requerente:</strong> {{ $os->requerente }}</p>
        <p><strong>Usuário Geros:</strong> {{ $os->nome_usuario }}</p>
        <p><strong>Criado em:</strong> {{ $os->created_at?$os->created_at->format('d/m/Y H:i:s') : '' }}</p>
        <div>
            <a href="{{ route('os_gestao.index') }}" class="btn btn-secondary">Voltar</a>
            <a href="{{ route('os_gestao.edit', $os->id) }}" class="btn btn-outline-secondary">Editar</a>
            <form action="{{ route('os_gestao.destroy', $os->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</button>
            </form>
        </div>
    </div>
@endsection
