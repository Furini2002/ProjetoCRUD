<?php

//Conexão para acessar o banco de dados no webhost
$servername = "localhost";
$username = "root";
$password = "";
$database = "atv_tecweb";

$conn = mysqli_connect($servername, $username, $password, $database);

/*Verifica se deu certo a conexão
if ($conn->connect_error) {
    echo "erro";
  //die("Conexão Falhou: " . $conn->connect_error);
}
echo "Conectado com sucesso";*/
?>