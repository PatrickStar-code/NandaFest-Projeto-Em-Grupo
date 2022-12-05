<?php
//Head
include_once("../top_bot/top.php");



//Classe empresa
include_once("./Classes/empresa.class.php");
include_once("./Classes/cliente.class.php");

//Iniciando sesão
session_start();

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


if (isset($_POST["cadastro"])) {
    $password = $_POST["password"];
    $repeatpassword = $_POST["tpassword"];
    if ($password == $repeatpassword) {
        $nome_cliente = $_POST["nome"];
        $email_cliente = $_POST["email"];
        $telefone_cliente = $_POST["telefone"];
        $cidade_cliente = $_POST["cidade"];
        $cep_cliente = $_POST["cep"];
        $login_cliente = $_POST["username"];
        $senha_cliente = $_POST["password"];


        $sql = "INSERT INTO clientes (nome_cliente,telefone_cliente,email_cliente,cidade_cliente,cep_cliente,login_cliente,senha_cliente)VALUES ('$nome_cliente','$telefone_cliente','$email_cliente','$cidade_cliente','$cep_cliente','$login_cliente','$senha_cliente')";

        if ($conn->query($sql) === TRUE) {
            echo '<div id="toast-success" class="flex fixed-bottom items-center p-4 mb-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">Conta Cliada com Sucesso.</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $msg = "A senhas não coincidem";
    }
}
?>
<style>


</style>

<div class="h-screen flex">
    <div class="flex w-1/2 bg-pink-400 i justify-around items-center">
        <div>
            <img src="<?php echo $_SESSION["Empresa"]->img ?>" class="h-6 mr-3 sm:h-9" alt="Flowbite Logo" />
            <h1 class="text-white font-bold text-4xl font-sans">Nanda Decorações</h1>
            <p class="text-white mt-1">Celebre Conosco!</p>
            <a href="./sobre_nos.php"><button type="submit" class="block w-28 bg-white text-gray-800 mt-4 py-2 rounded-2xl font-bold mb-2">Saiba Mais</button></a>
        </div>
    </div>
    <div class="flex w-1/2 justify-center items-center bg-blue-500">
        <div class="block bg-blue-500  text-white mt-4 py-2 rounded-3 font-bold mb-2">
            <div class="block bg-blue-500  text-white mt-4 py-2 rounded-3 font-bold mb-2">
                <form class="bg-bg-blue-500" method="POST" action="#">
                    <div class="p-8 rounded border-gray-200">
                        <h1 class="font-medium text-3xl">Bem Vindo!</h1>
                        <p class=" mt-6">Cadastre-se para a festa!</p>


                        <div class="mt-8 grid lg:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="text-sm block mb-1 font-medium">Nome</label>
                                <input type="text" name="nome" id="nome" required class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                            </div>

                            <div>
                                <label for="email" class="text-sm block mb-1 font-medium">Email</label>
                                <input type="text" name="email" id="email" required  class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                            </div>

                            <div>
                                <label for="telefone" class="text-sm block mb-1 font-medium">Telefone</label>
                                <input type="text" name="telefone" id="telefone" required  class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                            </div>


                            <div>
                                <label for="name" class="text-sm block mb-1 font-medium">Cep</label>
                                <input type="text" id="cep" name="cep" required  class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                            </div>


                        </div>
                        <div class="mt-8 grid lg:grid-cols-2 gap-4">

                            <div>
                                <label for="email" class="text-sm block mb-1 font-medium">UF</label>
                                <input type="text" id="uf" name="uf" required  class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                            </div>

                            <div>
                                <label for="cidade" class="text-sm block mb-1 font-medium">Cidade</label>
                                <input type="text" id="cidade" required  name="cidade" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                            </div>

                            <div>
                                <label for="bairro" class="text-sm block mb-1 font-medium">Bairro</label>
                                <input type="text" id="bairro" required  name="bairro" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                            </div>
                            <div>
                                <label for="endereco" class="text-sm block mb-1 font-medium">Endereço</label>
                                <input type="text" id="endereco" required  name="endereco" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                            </div>
                            <div>
                                <label for="numero" class="text-sm block mb-1 font-medium">Numero</label>
                                <input type="text" id="numero" required  name="numero" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                            </div>



                            <div>
                                <label for="username" class="text-sm block mb-1 font-medium">Usuario</label>
                                <input type="text" name="username" required  id="username" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                            </div>
                            <div>
                                <label for="password" class="text-sm block mb-1 font-medium">Senha</label>
                                <input type="password" name="password" required  id="password" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                            </div>
                            <div>
                                <label for="tpasword" class="text-sm  block mb-1 font-medium">Repita sua senha</label>
                                <input type="password" name="tpassword" required  id="tpassword" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />
                            </div>
                        </div>
                        <br>
                        <?php if (isset($msg)) {
                            echo $msg;
                        } ?>
                        <div class="space-x-4 mt-8">
                            <button type="submit" class="block w-full bg- border-2  mt-4 py-2 rounded-2xl text-white font-semibold mb-2 hover:bg-gradient-to-tr from-pink-400 to-pink-400" name="cadastro">Registrar-se</button>

                            <!-- Secondary -->
                            <a href="./index.php"><span class="text-sm ml-2 hover:text-pink-400 cursor-pointer">Já possui uma conta?</span></a>
                        </div>
                </form>


            </div>

        </div>
    </div>
</div>

<!-- pEGANDO CEP -->
<script>
    $("#cep").blur(function() {

        var cep = this.value.replace(/[^0-9]/, "");


        if (cep.length != 8) {
            return false;
        }


        var url = "https://viacep.com.br/ws/" + cep + "/json/";


        $.getJSON(url, function(dadosRetorno) {
            try {

                $("#endereco").val(dadosRetorno.logradouro);
                $("#bairro").val(dadosRetorno.bairro);
                $("#cidade").val(dadosRetorno.localidade);
                $("#uf").val(dadosRetorno.uf);
            } catch (ex) {}
        });
    });
</script>
<script>
    $("#telefone").mask("(00)00000-0000")
</script>
<?php include_once("../top_bot/bot.php") ?>