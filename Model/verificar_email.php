<?php 
    include_once("../Views/conexao.php");

    $email = $_GET["email"];

    $sql = "SELECT * FROM clientes WHERE email_cliente = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "1";
} else {
  echo "0";
}
$conn->close();
