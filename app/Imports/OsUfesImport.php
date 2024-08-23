<?php

namespace App\Imports;

use App\Models\Os_ufes;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OsUfesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Verifica se o registro já existe com base no 'id_ufes'
        $existing = Os_ufes::where('id_ufes', $row['"ID"'])->first();
        /*echo "<table border='1' cellpadding='5' cellspacing='0' style='border-collapse: collapse;'>";
        echo "<tr>";
        foreach ($row as $key => $value) {
            echo "<th>{$key}</th>";
        }
        echo "</tr>";
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>{$value}</td>";
        }
        echo "</tr>";
        echo "</table>";
        
        // Parar a execução aqui para depuração
        die(); */

        if ($existing) {
            // Atualiza o registro existente
            $existing->update([
                'breve_descricao' => $row['Breve descrição'],
                'entidade' => $row['Entidade'],
                'localizacao' => $row['Localização'],
                'status_ufes' => $row['Status'],
                'descricao' => $row['Descrição'],
                'data_abertura' => $row['Data de abertura'],
                'categoria' => $row['Categoria'],
                'atribuido_fornecedor' => $row['Atribuído a um fornecedor'],
                'solucao' => $row['Solução'],
                'tecnico' => $row['Técnico'],
                'prioridade' => $row['Prioridade'],
                'requerente' => $row['Requerente'],
                'ult_atualizacao' => $row['Última atualização'],
            ]);
            return null;
        } else {
            // Insere um novo registro
            return new Os_ufes([
                'id_ufes' => $row['"ID"'], // ID da planilha mapeado para o campo 'id_ufes'
                'breve_descricao' => $row['Breve descrição'],
                'entidade' => $row['Entidade'],
                'localizacao' => $row['Localização'],
                'status_ufes' => $row['Status'],
                'descricao' => $row['Descrição'],
                'data_abertura' => $row['Data de abertura'],
                'categoria' => $row['Categoria'],
                'atribuido_fornecedor' => $row['Atribuído a um fornecedor'],
                'solucao' => $row['Solução'],
                'tecnico' => $row['Técnico'],
                'prioridade' => $row['Prioridade'],
                'requerente' => $row['Requerente'],
                'ult_atualizacao' => $row['Última atualização'],
            ]);
        }
    }
}
