<?php
include "conexao.php";

class ModelPessoa {

    // Inserir pessoa
    public function inserir(Pessoa $pessoa){
        $con = new Conexao();
        $bd = $con->pegarConexao();

        // Verifica se o CPF está vazio
        if(trim($pessoa->getCpf()) == ""){
            echo "Erro: CPF não pode estar vazio!";
            return false;
        }

        // Verifica se o CPF já existe
        $check = $bd->prepare("SELECT COUNT(*) FROM pessoa WHERE cpf = ?");
        $check->bindValue(1, $pessoa->getCpf());
        $check->execute();

        if($check->fetchColumn() > 0){
            echo "Erro: CPF já cadastrado!";
            return false;
        }

        // Insere pessoa
        try {
            $sql = "INSERT INTO pessoa (cpf, nome, contato, senha) VALUES (?, ?, ?, ?)";
            $stm = $bd->prepare($sql);
            $stm->bindValue(1, $pessoa->getCpf());
            $stm->bindValue(2, $pessoa->getNome());
            $stm->bindValue(3, $pessoa->getContato());
            $stm->bindValue(4, $pessoa->getSenha());
            $stm->execute();

            echo "Cadastrado com sucesso!";
            return true;
        } catch(PDOException $e){
            echo "Erro ao cadastrar: " . $e->getMessage();
            return false;
        }
    }

    // Apagar pessoa
    public function apagar(Pessoa $pessoa){
        try {
            $sql = "DELETE FROM pessoa WHERE cpf = ?";
            $con = new Conexao();
            $bd = $con->pegarConexao();
            $stm = $bd->prepare($sql);
            $stm->bindValue(1, $pessoa->getCpf());
            $stm->execute();
            echo "Apagado com sucesso!";
        } catch(PDOException $e){
            echo "Erro ao apagar: " . $e->getMessage();
        }
    }

    // Atualizar pessoa
    public function atualizar(Pessoa $pessoa){
        try {
            $sql = "UPDATE pessoa SET nome = ?, contato = ?, senha = ? WHERE cpf = ?";
            $con = new Conexao();
            $bd = $con->pegarConexao();
            $stm = $bd->prepare($sql);
            $stm->bindValue(1, $pessoa->getNome());
            $stm->bindValue(2, $pessoa->getContato());
            $stm->bindValue(3, $pessoa->getSenha());
            $stm->bindValue(4, $pessoa->getCpf());
            $stm->execute();
            echo "Atualizado com sucesso!";
        } catch(PDOException $e){
            echo "Erro ao atualizar: " . $e->getMessage();
        }
    }

    // Consultar todas as pessoas
    public function consultar(){
        try {
            $sql = "SELECT * FROM pessoa";
            $con = new Conexao();
            $bd = $con->pegarConexao();
            $stm = $bd->prepare($sql);
            $stm->execute();

            if($stm->rowCount() > 0){
                return json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
            }
            return json_encode([]);
        } catch(PDOException $e){
            echo "Erro ao consultar: " . $e->getMessage();
            return false;
        }
    }

    // Consultar pessoa por CPF
    public function consultarPorCpf(Pessoa $pessoa){
        try {
            $sql = "SELECT * FROM pessoa WHERE cpf = ?";
            $con = new Conexao();
            $bd = $con->pegarConexao();
            $stm = $bd->prepare($sql);
            $stm->bindValue(1, $pessoa->getCpf());
            $stm->execute();

            if($stm->rowCount() > 0){
                return json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
            }
            return json_encode([]);
        } catch(PDOException $e){
            echo "Erro ao consultar por CPF: " . $e->getMessage();
            return false;
        }
    }

    // Consultar pessoa por CPF e senha
    public function consultarSenha(Pessoa $pessoa){
        try {
            $sql = "SELECT * FROM pessoa WHERE cpf = ? AND senha = ?";
            $con = new Conexao();
            $bd = $con->pegarConexao();
            $stm = $bd->prepare($sql);
            $stm->bindValue(1, $pessoa->getCpf());
            $stm->bindValue(2, $pessoa->getSenha());
            $stm->execute();

            if($stm->rowCount() > 0){
                return json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
            }
            return json_encode([]);
        } catch(PDOException $e){
            echo "Erro ao consultar senha: " . $e->getMessage();
            return false;
        }
    }
}
?>
