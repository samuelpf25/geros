<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

date_default_timezone_set('America/Sao_Paulo');

class Conexao
{
    private $servername = "localhost";
    private $database = "db_geros"; //"u892138677_orcbase";
    private $username = "root"; //"u892138677_orcbase";
    private $password = ""; //"Sa747400";
    private $conn;

    public function conectar()
    {
        // Create connection
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
        // Check connection
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        //echo "Connected successfully";
        $this->conn->query("SET time_zone = '-03:00'");
    }

    public function get_conn()
    {
        return $this->conn;
    }

    public function executar_sql($sql)
    {
        if (mysqli_query($this->conn, $sql)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
        //mysqli_close($this->conn);
    }

    public function insert($banco, $dados)
    {

        $sql = "INSERT INTO " . $banco . " VALUES " . $dados;
        $this->executar_sql($sql);
    }

    public function select($colunas, $banco, $dados, $conn)
    {
        $complemento = $dados!=''? " WHERE " . $dados: '';
        $sql = "SELECT " . $colunas . " FROM " . $banco . $complemento;
        if ($result = $conn->query($sql)) {
            $data = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            }
            echo json_encode(['success' => true, 'dados' => $data]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro na consulta']);
        }

    }

    public function update($table_bd,$set,$where)
    {
        // Atualiza o registro existente
        $sql = "UPDATE ".$table_bd." SET ".$set." WHERE ".$where;

        if ($this->get_conn()->query($sql) === TRUE) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    }

    public function delete($table, $id_col_name, $id, $conn)
    {
        $sql = "DELETE FROM $table WHERE $id_col_name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
        $stmt->close();
    }

    public function fecharConexao()
    {
        mysqli_close($this->conn);
    }
}
