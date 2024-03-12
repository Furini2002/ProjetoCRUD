<?php
include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <form method="POST" action="pesquisa.php" class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" name="pesquisa" placeholder="Pesquisar">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>

        <?php
        require('../php/conexao.php');
        
        $resultado = null;

        if (isset($_POST['pesquisa'])) {
            $pesquisa = $_POST['pesquisa'];
            $sql = "SELECT * FROM usuario WHERE (nome LIKE '%$pesquisa%')";
            $resultado = mysqli_query($conn, $sql);
        } else {
            // Se não houver pesquisa, traga todos os usuários
            $sql = "SELECT * FROM usuario";
            $resultado = mysqli_query($conn, $sql);
        }
        ?>

        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Listagem de Usuários</h3>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    while ($linha = mysqli_fetch_array($resultado)): ?>
                        <tr>
                            <td><?= $linha['id'] ?></td>
                            <td><?= $linha['nome'] ?></td>
                            <td><?= $linha['tipo'] ?></td>
                            <td>
                                <a href="../php/excluir.php?id=<?= $linha['id'] ?>" class="btn btn-danger" onclick="return confirm('Confirma exclusão de <?= $linha['nome'] ?>?')">Excluir</a>
                                <a href="../php/editar.php?id=<?= $linha['id'] ?>" class="btn btn-primary">Alterar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php
    // Verifica se houve um sucesso na exclusão
    if (isset($_GET['deleted']) && $_GET['deleted'] === "true") {
        echo <<<HTML
        <div class="alert alert-success alert-dismissible fixed-bottom mb-0" role="alert">
            Usuário excluído com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        HTML;
    }

    // Verifica se houve um sucesso na alteração
    if (isset($_GET['changed']) && $_GET['changed'] === "true") {
        echo <<<HTML
        <div class="alert alert-success alert-dismissible fixed-bottom mb-0" role="alert">
            Usuário alterado com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        HTML;
    }
    ?>

</body>
</html>
