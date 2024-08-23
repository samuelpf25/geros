@extends('layouts.main')

@section('content')
<div>
    <h2>Criar Novo Status</h2>
    <form action="{{ route('status.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome do Status</label>
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
