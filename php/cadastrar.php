<?php
//1 - conexão
require('conexao.php');//alterar

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //2 - Preparar a SQL
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha1'];
    $tipo = $_POST['tipo'];
    $sql = "INSERT INTO usuario (nome, usuario, senha, tipo)
            VALUES ('$nome', '$usuario', '$senha', '$tipo')";

    //3 - Executar no BD a SQL
    if (mysqli_query($conn, $sql)) {
        // Limpa os dados do formulário
        $_POST = array();
        // Redireciona de volta para a página de cadastro com a mensagem de sucesso
        header("Location: ../html/cadastra.php?success=true");
        exit();
    } else {
        echo "Erro ao inserir registro: " . mysqli_error($conn);
    }
}
?>

