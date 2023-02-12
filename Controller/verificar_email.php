<?php 
    echo $email = $_POST["email"];

    header("location:../Model/verificar_email.php?email=$email");

?>