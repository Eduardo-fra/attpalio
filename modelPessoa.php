<?php
require_once __DIR__ . 'pessoa.php';

class ModelPessoa {
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=cadastro;charset=utf8", "root", "root");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }

    // CREATE
    public function inserir(Pessoa $pessoa) {
        try {
            $sql = "INSERT INTO pessoa (nome, cpf, telefone) VALUES (?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$pessoa->getNome(), $pessoa->getCpf(), $pessoa->getTelefone()]);
        } catch (PDOException $e) {
            return "Erro: " . $e->getMessage();
        }
    }

    // READ
    public function listar() {
        $sql = "SELECT * FROM pessoa";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function atualizar(Pessoa $pessoa) {
        $sql = "UPDATE pessoa SET nome=?, cpf=?, telefone=? WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $pessoa->getNome(),
            $pessoa->getCpf(),
            $pessoa->getTelefone(),
            $pessoa->getId()
        ]);
    }

    // DELETE
    public function deletar($id) {
        $sql = "DELETE FROM pessoa WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>
