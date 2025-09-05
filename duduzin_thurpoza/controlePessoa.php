<?php
require_once "modelPessoa.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"] ?? "";
    $cpf = $_POST["cpf"] ?? "";
    $telefone = $_POST["telefone"] ?? "";

    if (!empty($nome) && !empty($cpf) && !empty($telefone)) {
        $pessoa = new ModelPessoa();

        if ($pessoa->cadastrar($nome, $cpf, $telefone)) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar. Verifique se o CPF já não está cadastrado.";
        }
    } else {
        echo "Preencha todos os campos.";
    }
}
?>
