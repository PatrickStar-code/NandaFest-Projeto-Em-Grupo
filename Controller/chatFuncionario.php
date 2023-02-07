<?php

    $msg = $_POST["text"];

    $id_cliente = $_POST["id_cliente"];

    header("location: ../Model/chatFuncionario.php?msg=$msg&id_cliente=$id_cliente");
?>