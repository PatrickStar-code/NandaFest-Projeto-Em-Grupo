<?php 
    session_start();
    
    include_once("../Views/Cliente/Classes/cliente.class.php");

    $last_id = $_POST["last_id"];
    $id_cliente = $_SESSION["Login"]->cod;

    header("location: ../Model/verMensagemCliente.php?last_id=$last_id&id_cliente=$id_cliente");
?>