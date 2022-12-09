<?php
include_once("../conexao.php");


//Head
include_once("../top_bot/top.php");
//Clases
include_once("./Classes/empresa.class.php");
include_once("./Classes/func.class.php");
include_once("./Classes/dec.class.php");
include_once("./Classes/cliente.class.php");


session_start();



//Clientes
if(isset($_SESSION["Clientes"])){
    $sql3 = "SELECT * FROM clientes";
    $result3 = $conn->query($sql3);

    if ($result3->num_rows > 0) {
        // output data of each row
        while ($row3 = $result3->fetch_assoc()) {
            $cod = $row3["cod_cliente"];
            $nome = $row3["nome_clliente"];
            $tel = $row3["telefone_cliente"];
            $em = $row3["email_cliente"];
            $cel = $row3["celular_cliente"];
            $cid = $row3["cidade_cliente"];
            $cep = $row3["cep_cliente"];
            $cpf = $row3["cpf_cliente"];
            $img = $row3["img_cliente"];
            $cliente =  new Cliente($cod,$nome,$tel,$em,$cel,$cid,$cep,$cpf,$img);
            $_SESSION["Clientes"][$cod] = $cliente;
        }
 
    } else {
        echo "deu ruim";
    }
}

// Decoraçoes
if (!isset($_SESSION["dec"])) {
    $sql2 = "SELECT * FROM decoracoes";
    $result2 = $conn->query($sql2);
    while ($row2 = $result2->fetch_assoc()) {
        $id = $row2["cod_decoracoes"]; 
        $desc = $row2["descricao_decoracao"];
        $img = $row2["img_decoracao"];
        $cod_tema = $row2["temas_cod_tema"];

        $dec = new Dec($id, $desc, $img,$cod_tema);
        $_SESSION["dec"][$id] = $dec;
    }
}


// Empresa
if (!isset($_SESSION["Empresa"])) {

    $sql = "SELECT * FROM empresa";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $cod = $row["cod_empresa"];
            $nome = $row["nome_empresa"];
            $img = $row["img_empresa"];
            $cnpj = $row["cnpj_empresa"];
        }
        $empresa = new Empresa($cod, $nome, $img, $cnpj);
        $_SESSION["Empresa"] = $empresa;
    } else {
        echo "deu ruim";
    }
}


if (isset($_POST["enviar"])) {
    $user = $_POST["user"];
    $senha = $_POST["senha"];

    $sql4 = "SELECT * FROM funcionarios WHERE login_funcionario = '$user' and senha_funcionario = '$senha'";
    $result4 = $conn->query($sql4);

    if ($result4->num_rows > 0) {
        while ($row4 = $result4->fetch_assoc()) {
            $cod = $row4["cod_funcionario"];
            $nome = $row4["nome_funcionario"];
            $tel = $row4["telefone_funcionario"];
            $cpf = $row4["cpf_funcionario"];
            $log = $row4["logradouro_funcionario"];
            $cel = $row4["celular_funcionario"];
            $email = $row4["email_funcionario"];
            $img = $row4["img_funcionario"];
        }
        $func = new Funcionario($cod, $nome, $tel, $cpf, $log, $cel, $email, $img);

        $_SESSION["login"] = $func;
        header("location:home.php");
    } else {
        echo '<div id="toast-warning" class="fixed-bottom flex items-center p-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
				<div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
					<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
					<span class="sr-only">Warning icon</span>
				</div>
				<div class="ml-3 text-sm font-normal">Login ou senha incorretos.</div>
				<button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-warning" aria-label="Close">
					<span class="sr-only">Close</span>
					<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
				</button>
			</div>';
    }
}
?>
<!-- Body -->
<!-- component -->
<section class="flex flex-col md:flex-row h-screen items-center">

    <div class="bg-indigo-600 hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen">
        <img src="https://source.unsplash.com/random" alt="" class="w-full h-full object-cover">
    </div>

    <div class="bg-white w-full md:max-w-md lg:max-w-full md:mx-auto md:mx-0 md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12
        flex items-center justify-center">

        <div class="w-full h-100">
            <img src="<?php echo $_SESSION["Empresa"]->img ?>" alt="" class="w-20">

            <h1 class="text-xl md:text-2xl font-bold leading-tight mt-12">Login Area Gerente</h1>

            <form class="mt-6" action="#" method="POST">
                <div>
                    <label class="block text-gray-700">Usuario</label>
                    <input type="text" name="user" id="" placeholder="Inserir seu usuario" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" autofocus autocomplete required>
                </div>

                <div class="mt-4">
                    <label class="block text-gray-700">Senha</label>
                    <input type="password" name="senha" id="" placeholder="Inserir sua senha"  class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500
                focus:bg-white focus:outline-none" required>
                </div>


                <button type="submit" class="w-full block bg-indigo-500 hover:bg-indigo-400 focus:bg-indigo-400 text-white font-semibold rounded-lg
              px-4 py-3 mt-6" name="enviar">Logar</button>
            </form>

            <hr class="my-6 border-gray-300 w-full">

        </div>
    </div>

</section>


<?php include_once("../top_bot/bot.php") ?>