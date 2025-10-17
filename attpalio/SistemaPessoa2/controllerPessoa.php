<?php
include("pessoa.php");
include("modelPessoa.php");

$cpf = $_REQUEST['cpf'] ?? '';
$nome = $_REQUEST['nome'] ?? '';
$contato = $_REQUEST['contato'] ?? '';
$senha = $_REQUEST['senha'] ?? '';
$acao = $_REQUEST['acao'] ?? '';

$pessoa = new Pessoa();
$pessoa->setCpf($cpf);
$pessoa->setNome($nome);
$pessoa->setContato($contato);
$pessoa->setSenha($senha);

$modelPessoa = new ModelPessoa();

switch($acao){
    case "inserir":
        $modelPessoa->inserir($pessoa);
        break;

    case "apagar":
        $modelPessoa->apagar($pessoa);
        break;

    case "atualizar":
        $modelPessoa->atualizar($pessoa);
        break;

    case "consultar":
        echo $modelPessoa->consultar();
        break;

    case "consultarPessoa":
        echo $modelPessoa->consultarPorCpf($pessoa);
        break;

    case "validarPessoa": // ⚠ nome igual ao JS
        echo $modelPessoa->consultarSenha($pessoa);
        break;

    default:
        echo json_encode(["erro"=>"Ação inválida"]);
        break;
}
?>
