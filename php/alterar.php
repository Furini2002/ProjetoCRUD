<?php

if(isset($_POST['id'])) {
    require('conexao.php');

    // Obtém os dados do formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];

    // Consulta SQL para atualizar os dados do usuário
    $sql = "UPDATE usuario SET nome='$nome', tipo='$tipo' WHERE id=$id";

    // Executa a consulta SQL    
    if (mysqli_query($conn, $sql)) {
        // Redireciona de volta para a página de cadastro com a mensagem de sucesso
        header("Location: ../html/pesquisa.php?changed=true");
        exit();
    } else {
        echo "Erro ao inserir registro: " . mysqli_error($conn);
    }
}

?>