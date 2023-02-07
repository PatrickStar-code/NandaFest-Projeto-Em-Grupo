<?php 
    include_once("../Views/conexao.php");

    $password = $_GET["password"];
    $nome_cliente = $_GET["nome"];
    $email_cliente = $_GET["email"];
    $telefone_cliente = $_GET["telefone"];
    $cidade_cliente = $_GET["cidade"];
    $cep_cliente = $_GET["cep"];
    $login_cliente = $_GET["username"];
    $senha_cliente = $_GET["password"];

    $sql = "INSERT INTO clientes (nome_cliente,telefone_cliente,email_cliente,cidade_cliente,cep_cliente,login_cliente,senha_cliente)VALUES ('$nome_cliente','$telefone_cliente','$email_cliente','$cidade_cliente','$cep_cliente','$login_cliente','$senha_cliente')";

    if ($conn->query($sql) === TRUE) {
        echo '<div id="toast-success" class="flex fixed-bottom items-center p-4 mb-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ml-3 text-sm font-normal">Conta Cliada com Sucesso.</div>
    </div>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>