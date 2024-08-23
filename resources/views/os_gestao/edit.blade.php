@extends('layouts.main')

@section('content')
<div>
    <h2>Editar Ordem de Serviço - {{ $os_ufes->id_ufes }}</h2>
    <form action="{{ route('os_gestao.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="id_status">Status</label>
            <select name="id_status" id="id_status" class="form-control" required>
                <option>Selecione um status</option>
                @foreach ($status as $status)
                <option value="{{ $status->id }}" {{ $os_join && $os_join->nome_status == $status->nome ? 'selected' : '' }}>{{ $status->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="urgencia" class="form-label">Urgência</label>
            <select class="form-select" id="urgencia" name="urgencia">
                <option selected disabled>Selecione a urgência</option>
                <option value="baixa" {{ $os_ufes->urgencia=='baixa' ? 'selected' : '' }}>Baixa</option>
                <option value="media" {{ $os_ufes->urgencia=='media' ? 'selected' : '' }}>Média</option>
                <option value="alta" {{ $os_ufes->urgencia=='alta' ? 'selected' : '' }}>Alta</option>
            </select>
        </div>
        <input type="hidden" class="form-control" id="id_ufes" name="id_ufes" value="{{ $os_ufes->id_ufes }}" required>
        <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="{{ Auth::user()->id }}" required>
        <div class="mb-3">
            <label for="observacao">Observação</label>
            <textarea class="form-control" id="observacao" name="observacao" placeholder="Digite alguma observação, se houver">{{ $os_join ? $os_join->observacao : '' }}</textarea>
        </div>

        <button type="submit" class="btn btn-secondary mt-2">Registrar</button>
    </form>
</div>
@endsection