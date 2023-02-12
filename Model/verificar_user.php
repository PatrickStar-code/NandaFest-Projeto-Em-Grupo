<?php 
    include_once("../Views/conexao.php");

    $user = $_GET["user"];

    $sql = "SELECT * FROM clientes WHERE login_cliente = '$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "1";
} else {
  echo "0";
}
$conn->close();
