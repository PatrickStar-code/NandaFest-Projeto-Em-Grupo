<?php
    $user = $_POST["user"];

 header("location:../Model/verificar_user.php?user=$user");
?>