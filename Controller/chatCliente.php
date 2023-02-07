<?php
    include_once("../Views/Cliente/Classes/cliente.class.php");

    session_start();

    $msg = $_POST["text"];

    $id_cliente = $_SESSION["Login"]->cod;

    header("location: ../Model/chatCliente.php?msg=$msg&id_cliente=$id_cliente");
?>