@extends('layouts.main')

@section('title','Cadastro')

@section('content')
<h2>OS's Cadastradas</h2>
<div class="container-fluid">
    <table class="table table-striped" id='tb_gestao'>
        <thead>
            <tr>
                <th style="min-width: 80px;">ID</th>
                <th style="min-width: 250px;">Breve Descrição</th>
                <th>Localização</th>
                <th>Status Orig</th>
                <th>Status Geros</th>
                <th>Usuário Geros</th>
                <th>Área</th>
                <th>Solução</th>
                <th>Prioridade</th>
                <th>Requerente</th>
                <th style="min-width: 100px;">Últ. Atualiz.</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody class='table-group-divider'>
            @foreach($os_join as $os)
            
            <tr>
                <td>{{ $os->id_ufes }}</td>
                <td  data-toggle="tooltip" title="{{ $os->descricao }}">{{ $os->breve_descricao }}</td>
                <td>{{ $os->localizacao }}</td>                
                <td>{{ $os->status_ufes }}</td>
                <td>{{ $os->nome_status }}</td>
                <td>{{ $os->nome_usuario }}</td>
                <td data-toggle="tooltip" title="{{ $os->categoria }}">{{ $os->categoria_parts[0] ?? 'N/A' }}</td>
                <td>{{ $os->solucao }}</td>
                <td>{{ $os->prioridade }}</td>
                <td>{{ $os->requerente }}</td>
                <td>{{ $os->ult_atualizacao }}</td>

                <td style="vertical-align: middle;">
                    <div class="d-flex">
                        <div class="btn-group" role="group">
                            <a type='button' href="{{ route('os_gestao.show', $os->id) }}" class="btn btn-outline-secondary my-1 btn-sm"><i class="fas fa-folder-open" style="color: #212529;"></i></a>
                        </div>
                        <div class="btn-group" role="group">
                            <a type='button' href="{{ route('os_gestao.edit', $os->id) }}" class="btn btn-outline-secondary my-1 btn-sm"><i class="fas fa-edit" style="color: #212529;"></i></a>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        // Verifica se o DataTable já está inicializado
        if ($.fn.DataTable.isDataTable("#tb_gestao")) {
            // Destroi o DataTable existente antes de re-inicializá-lo
            $("#tb_gestao").DataTable().clear().destroy();
        }

        // Inicializa o DataTable
        $("#tb_gestao").DataTable({
            paging: true, // Ativar paginação
            searching: true, // Ativar pesquisa
            responsive: true, // Habilita o modo responsivo
            //order: [[0, "desc"]],
            language: {
                url: "//cdn.datatables.net/plug-ins/2.0.8/i18n/pt-BR.json",
            },
        });
    });
</script>
@endsection