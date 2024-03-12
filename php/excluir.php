<?php
require('conexao.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM usuario WHERE id = $id";

    //3 - Executar no BD a SQL
    if (mysqli_query($conn, $sql)) {
        // Limpa os dados do formulário
        $_POST = array();
        // Redireciona de volta para a página de cadastro com a mensagem de sucesso
        header("Location: ../html/pesquisa.php?deleted=true");
        exit();
    } else {
        echo "Erro ao inserir registro: " . mysqli_error($conn);
    }
}
?>
