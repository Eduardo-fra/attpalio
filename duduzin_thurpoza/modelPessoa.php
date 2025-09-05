<?php
class ModelPessoa {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "root", "bdn");

        if ($this->conn->connect_error) {
            die("Erro de conexão: " . $this->conn->connect_error);
        }
    }

    public function cadastrar($nome, $cpf, $telefone) {
        $stmt = $this->conn->prepare("INSERT INTO personas (nome, cpf, telefone) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nome, $cpf, $telefone);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }

        $stmt->close();
    }
}
?>
