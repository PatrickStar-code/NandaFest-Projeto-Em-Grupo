<?php
    session_start();
    unset($_SESSION["Login"]);
    header("location:index.php");
?>