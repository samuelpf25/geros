@extends('layouts.main')

@section('content')
<div>
    <h2>Editar Pasta - {{ $status->nome }}</h2>
    <form action="{{ route('status.update', $status->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome do Status</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $status->nome }}"required>
        </div>
        <div class="form-group">
            <label for="peso">Peso</label>
            <select name="peso" id="peso" class="form-control">
                <option value="1" {{ $status->peso=='1' ? 'selected' : '' }}>1</option>
                <option value="2" {{ $status->peso=='2' ? 'selected' : '' }}>2</option>
                <option value="3" {{ $status->peso=='3' ? 'selected' : '' }}>3</option>
                <option value="4" {{ $status->peso=='4' ? 'selected' : '' }}>4</option>
                <option value="5" {{ $status->peso=='5' ? 'selected' : '' }}>5</option>
            </select>
        </div>
        <button type="submit" class="btn btn-secondary mt-2">Atualizar</button>
    </form>
</div>
@endsection