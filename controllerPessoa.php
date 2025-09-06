<?php
  include("modelPessoa.php");
  include("pessoa.php");

  $cpf = filter_input(INPUT_GET, "cpf");
  $nome = filter_input(INPUT_GET, "nome");
  $contato = filter_input(INPUT_GET, "contato");
  $senha = filter_input(INPUT_GET, "senha");
  $op = filter_input(INPUT_GET, "op");  

  $pessoa = new Pessoa();
  $pessoa->setCpf($cpf);
  $pessoa->setNome($nome);
  $pessoa->setContato($contato);
  $pessoa->setSenha($senha);

  $modelPessoa = new modelPessoa();
  
  if($op=="inserir"){
      $modelPessoa->inserir($pessoa);
  }else if($op=="apagar"){
      $modelPessoa->apagar($pessoa);
  }else if($op=="atualizar"){
    $modelPessoa->atualizar($pessoa);
  }else if($op=="consultar"){
    echo $modelPessoa->consultar();
  }else if($op == "consultarPessoa") {
    echo $modelPessoa->consultarPorCpf($pessoa); 
  }else if($op == "validaPessoa") {
    echo $modelPessoa->consultarSenha($pessoa); 
  }
?>