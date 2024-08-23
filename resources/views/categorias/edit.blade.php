@extends('layouts.main')

@section('content')
<div>
    <h2>Editar Categoria - {{ $categorias->nome }}</h2>
    <form action="{{ route('categorias.update', $categorias->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_area" class="form-label">Área</label>
            <select class="form-select" id="id_area" name="id_area">
                <option selected disabled>Selecione uma Área</option>
                @foreach($areas as $areas)
                <option value="{{ $areas->id }}" {{ $categorias->id_area==$areas->id ? 'selected' : '' }}>{{ $areas->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nome">Nome da Categoria</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $categorias->nome }}" required>
        </div>
        <div class="form-group">
            <label for="peso">Peso</label>
            <select name="peso" id="peso" class="form-control">
                <option value="1" {{ $categorias->peso=='1' ? 'selected' : '' }}>1</option>
                <option value="2" {{ $categorias->peso=='2' ? 'selected' : '' }}>2</option>
                <option value="3" {{ $categorias->peso=='3' ? 'selected' : '' }}>3</option>
                <option value="4" {{ $categorias->peso=='4' ? 'selected' : '' }}>4</option>
                <option value="5" {{ $categorias->peso=='5' ? 'selected' : '' }}>5</option>
            </select>
        </div>
        <button type="submit" class="btn btn-secondary mt-2">Atualizar</button>
    </form>
</div>
@endsection