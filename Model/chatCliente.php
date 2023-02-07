<?php 
    $msg = $_GET["msg"];
    $id_cliente = $_GET["id_cliente"];

    include_once("../Views/conexao.php");

    $sql = "INSERT INTO chat (mensagem, PARA, clientes_cod_cliente)
    VALUES ('$msg', 'Funcionario', '$id_cliente')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>