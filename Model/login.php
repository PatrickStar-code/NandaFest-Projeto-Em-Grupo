<?php 
    include_once("../Views/conexao.php");
    include_once("../Views/Cliente/Classes/cliente.class.php");

    session_start();

    $user = $_GET["login"];
    $senha = $_GET["senha"];

    $sql = "SELECT * FROM clientes WHERE login_cliente = '$user' and senha_cliente	= '$senha' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $cod = $row["cod_cliente"];
            $nome = $row["nome_cliente"];
            $tel = $row["telefone_cliente"];
            $email = $row["email_cliente"];
            $cel = $row["celular_cliente"];
            $cidade = $row["cidade_cliente"];
            $cep = $row["cep_cliente"];
            $cpf = $row["cpf_cliente"];
            $img = $row["img_cliente"];
        }
        $cliente = new Cliente($cod, $nome, $tel, $email, $cel, $cidade, $cep, $cpf, $img);
        $_SESSION["Login"] = $cliente;
        echo "<script>location.reload()</script>";
    } else {
      echo '<div id="toast-warning" class="fixed-bottom flex items-center p-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Warning icon</span>
        </div>
        <div class="ml-3 text-sm font-normal">Login ou senha incorretos.</div>
        <!-- <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-warning" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button> -->
    </div>';
    }
?>