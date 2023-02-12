<?php
$password = $_POST["password"];
$repeatpassword = $_POST["tpassword"];
$nome_cliente = $_POST["nome"];
$email_cliente = $_POST["email"];
$telefone_cliente = $_POST["telefone"];
$cidade_cliente = $_POST["cidade"];
$cep_cliente = $_POST["cep"];
$login_cliente = $_POST["username"];
$senha_cliente = md5($password);


header("location: ../Model/cadastrar.php?nome=$nome_cliente&email=$email_cliente&telefone=$telefone_cliente&cidade=$cidade_cliente&cep=$cep_cliente&username=$login_cliente&password=$senha_cliente");
