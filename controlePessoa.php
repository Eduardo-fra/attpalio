<?php
require_once __DIR__ . 'modelPessoa.php';

$model = new ModelPessoa();
$acao = $_POST['acao'] ?? $_GET['acao'] ?? null;

if ($acao == "inserir") {
    $pessoa = new Pessoa();
    $pessoa->setNome($_POST['nome']);
    $pessoa->setCpf($_POST['cpf']);
    $pessoa->setTelefone($_POST['telefone']);

    $res = $model->inserir($pessoa);
    echo $res ? "Cadastro realizado com sucesso!" : "Erro ao cadastrar.";
}

elseif ($acao == "listar") {
    $dados = $model->listar();
    echo "<pre>";
    print_r($dados);
    echo "</pre>";
}

elseif ($acao == "atualizar") {
    $pessoa = new Pessoa();
    $pessoa->setId($_POST['id']);
    $pessoa->setNome($_POST['nome']);
    $pessoa->setCpf($_POST['cpf']);
    $pessoa->setTelefone($_POST['telefone']);

    $res = $model->atualizar($pessoa);
    echo $res ? "Registro atualizado!" : "Erro ao atualizar.";
}

elseif ($acao == "deletar") {
    $res = $model->deletar($_POST['id']);
    echo $res ? "Registro excluído!" : "Erro ao excluir.";
}

else {
    echo "Ação inválida!";
}
?>
