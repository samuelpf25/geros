@extends('layouts.main')

@section('content')
<div>
    <h2>Editar Pasta - {{ $areas->nome }}</h2>
    <form action="{{ route('areas.update', $areas->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome da Área</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $areas->nome }}"required>
        </div>

        <button type="submit" class="btn btn-secondary mt-2">Atualizar</button>
    </form>
</div>
@endsection