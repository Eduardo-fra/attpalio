<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Pessoa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Cadastro de Pessoa</h2>


    <form method="POST" action="controlePessoa.php">
        <input type="hidden" name="acao" value="inserir">

        <label>Nome:</label>
        <input type="text" name="nome" placeholder="Digite o nome" required>

        <label>CPF:</label>
        <input type="text" name="cpf" placeholder="Digite o CPF" required>

        <label>Telefone:</label>
        <input type="text" name="telefone" placeholder="Digite o telefone" required>

        <button type="submit">Cadastrar</button>
    </form>

   
    <div style="margin-top: 20px; text-align: center;">
        <a href="listar.php" class="btn">Listar Pessoas</a>
        <a href="editar.php" class="btn">Atualizar Pessoa</a>
        <a href="deletar.php" class="btn">Deletar Pessoa</a>
    </div>
</div>
</body>
</html>
