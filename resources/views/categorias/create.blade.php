@extends('layouts.main')

@section('content')
<div>
    <h2>Criar Novo Status</h2>
    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_area" class="form-label">Área</label>
            <select class="form-select" id="id_area" name="id_area">
                <option selected disabled>Selecione uma Área</option>
                @foreach($areas as $areas)
                <option value="{{ $areas->id }}">{{ $areas->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nome">Nome da Categoria</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="peso">Peso</label>
            <select name="peso" id="peso" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-secondary mt-2">Criar</button>
    </form>
</div>
@endsection
