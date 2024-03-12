<?php
include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Usuário</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <form action="../php/cadastrar.php" method="POST" class="mt-4">
        <div class="form-group">
            <label for="nome">Nome completo:</label>
            <input type="text" name="nome" class="form-control" placeholder="Digite seu nome." required>
        </div>

        <div class="form-group">
            <label for="usuario">Nome de usuário:</label>
            <input type="text" name="usuario" class="form-control" placeholder="Digite seu nome de usuário." required>
        </div>

        <div class="form-group">
            <label for="senha1">Senha:</label>
            <input type="password" name="senha1" class="form-control" placeholder="Digite sua senha." required>
        </div>

        <div class="form-group">
            <label for="senha2">Confirme sua senha:</label>
            <input type="password" name="senha2" class="form-control" placeholder="Repita sua senha." required>
        </div>

        <div class="form-group">
            <label for="tipo">Selecione o nível de permissão:</label>
            <select name="tipo" class="form-control">
                <option value="Padrao">Padrão</option>
                <option value="Administrativo">Administrador</option>
                <option value="Financeiro">Financeiro</option>
                <option value="Recuros Humanos">Recursos Humanos</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <?php
    // Verifica se houve um sucesso na inserção
    if (isset($_GET['success']) && $_GET['success'] === "true") {
        echo <<<HTML
        <div class="alert alert-success alert-dismissible fixed-bottom mb-0" role="alert">
            Cadastro realizado com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        HTML;
    }
    ?>
</body>
</html>
