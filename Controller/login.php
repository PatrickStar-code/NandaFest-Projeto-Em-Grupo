<?php 
    $login = $_POST["login"];
    $senha = $_POST["senha"];

    header("location: ../Model/login.php?login=$login&senha=$senha");
?>