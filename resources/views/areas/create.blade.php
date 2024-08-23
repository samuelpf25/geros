@extends('layouts.main')

@section('content')
<div>
    <h2>Criar Nova Área</h2>
    <form action="{{ route('areas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome da Área</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        
        <button type="submit" class="btn btn-secondary mt-2">Criar</button>
    </form>
</div>
@endsection
