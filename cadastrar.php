<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Conexão com o banco de dados MySQL
require_once __DIR__ . '/conexao.php';

$conexao = new Conexao;
$conexao->conectar();
$conn = $conexao->get_conn();

// Recebe os dados enviados via AJAX
$data = json_decode(file_get_contents('php://input'), true);
date_default_timezone_set('America/Sao_Paulo');
$ultima_atualizacao = date('Y-m-d H:i:s'); //$_POST['momento_registro'];



if (!empty($data)) {
    foreach ($data as $row) {
        $id_ufes = $row['id_ufes'];
        $breve_descricao = $row['breve_descricao'];
        $entidade = $row['entidade'];
        $status_ufes = $row['status_ufes'];
        $descricao = $row['descricao'];
        $data_abertura = $row['data_abertura'];
        $categoria = $row['categoria'];
        $atribuido_fornecedor = $row['atribuido_fornecedor'];
        $solucao = $row['solucao'];
        $tecnico = $row['tecnico'];
        $prioridade = $row['prioridade'];
        $requerente = $row['requerente'];
        $ult_atualizacao = $row['ult_atualizacao'];

        // Verifica se o registro já existe
        $sql = "SELECT * FROM os_ufes WHERE id_ufes = '$id_ufes'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Atualiza o registro existente
            //$sql = "UPDATE os_ufes SET id_ufes = '$id_ufes', preco = '$preco', ultima_atualizacao = '$ultima_atualizacao' WHERE cod_sub = '$cod_subitem'";
        } else {
            // Insere um novo registro
            $sql = "INSERT INTO os_ufes (id_ufes, breve_descricao, entidade, status_ufes, descricao, data_abertura, categoria, atribuido_fornecedor, solucao, tecnico, prioridade, requerente, ult_atualizacao) VALUES ('$id_ufes', '$breve_descricao', '$entidade', '$status_ufes', '$descricao', '$data_abertura', '$categoria', '$atribuido_fornecedor', '$solucao', '$tecnico', '$prioridade', '$requerente', '$ult_atualizacao)";
        }

        if ($conn->query($sql) === TRUE) {
            echo "Registro atualizado/inserido com sucesso";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    }
} else {
    echo "Nenhum dado recebido";
}

$conn->close();
