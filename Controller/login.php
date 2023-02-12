<?php 
    $login = $_POST["login"];
    $senha = md5($_POST["senha"]);

    header("location: ../Model/login.php?login=$login&senha=$senha");
?>