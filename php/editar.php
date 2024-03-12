<?php

include '../html/navbar.php';

// Verifica se o ID do usuário foi passado na URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Conexão com o banco de dados
    require('conexao.php');

    // Consulta SQL para selecionar os detalhes do usuário com o ID fornecido
    $sql = "SELECT * FROM usuario WHERE id = $id";
    $resultado = mysqli_query($conn, $sql);

    // Verifica se o usuário foi encontrado
    if(mysqli_num_rows($resultado) > 0) {
        // Recupera os detalhes do usuário
        $usuario = mysqli_fetch_assoc($resultado);
    } else {
        echo "Usuário não encontrado.";
        exit; // Encerra o script se o usuário não for encontrado
    }
} else {
    echo "ID do usuário não especificado.";
    exit; // Encerra o script se o ID do usuário não for especificado na URL
}

if(isset($_POST['id'])) {
    require('conexao.php');

    // Obtém os dados do formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];

    // Consulta SQL para atualizar os dados do usuário
    $sql = "UPDATE usuario SET nome='$nome', tipo='$tipo' WHERE id=$id";

    // Executa a consulta SQL
    if(mysqli_query($conn, $sql)) {
        echo "Usuário atualizado com sucesso.";
    } else {
        echo "Erro ao atualizar o usuário: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Editar Usuário</h1>
        <form action="alterar.php" method="POST">
            <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?= $usuario['nome'] ?>">
            </div>

            <div class="form-group">
            <label for="tipo">Nível de permissão:</label>
            <select name="tipo" class="form-control">
                <option value="Padrao">Padrão</option>
                <option value="Administrativo">Administrador</option>
                <option value="Financeiro">Financeiro</option>
                <option value="Recuros Humanos">Recursos Humanos</option>
            </select>
        </div>

            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="pesquisa.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
