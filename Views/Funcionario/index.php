<?php
//Head
include_once("../top_bot/top.php");
//Classe empresa
include_once("./Classes/empresa.class.php");

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
?>
<!-- Body -->
<style>
    body {
        overflow: hidden;
        color: #9CE8DC;
        
    }
</style>

<body>
    <div class="h-screen flex">
        <div class="flex w-full bg-gradient-to-r from-gray-700 to-gray-500 i justify-around items-center">
            <div class="">
                <div>
                    <img src="<?php echo $_SESSION["Empresa"]->img ?>" class="" alt="Flowbite Logo" />
                </div>
                <h1 class="text-white font-bold text-4xl font-sans">Nanda Decorações</h1>
                <p class="text-white mt-1">Celebre Conosco!</p>
                <a href="./sobre_nos.php"><button type="submit" class="block w-28 bg-gray-200 text-gray-800 mt-4 py-2 rounded-2xl font-bold mb-2">Saiba Mais</button></a>
            </div>
            <div class="block text-gray-800 mt-4 py-2 rounded-3 font-bold mb-2">
                <div class="block bg-gray-300 text-gray-800 mt-4 py-2 rounded-3 font-bold mb-2">
                    <form class="bg-bg-blue-500" method="POST" action="#">
                        <div class="p-8 rounded border-gray-200">
                            <h1 class="font-medium text-3xl">Bem Vindo!</h1>
                            <p class=" mt-6">Cadastre-se para a festa!</p>
                            <div class="mt-8 grid lg:grid-cols-2 gap-4 ">
                                <div>
                                    <label for="username" class="text-sm block mb-1 font-medium">Usuario</label>
                                    <input type="text" name="username" required id="username" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-black focus:border-black text-gray-800 w-full" />
                                </div>
                                <br>
                                <div>
                                    <label for="password" class="text-sm block mb-1 font-medium">Senha</label>
                                    <input type="password" name="password" required id="password" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-black focus:border-black text-gray-800 w-full" />
                                </div>
                            </div>
                            <br>
                            <?php if (isset($msg)) {
                                echo $msg;
                            } ?>
                            <div class="space-x-4 mt-8">
                                <button type="submit" class="block w-50 bg-blue-500 border-2  mt-4 py-2 rounded-2xl text-gray-800 font-medium mb-1 hover:bg-gradient-to-r from-blue-500 to-blue-700" name="cadastro">Registrar-se</button>

                                <!-- Secondary -->
                                <a href="./index.php"><span class="text-sm text-gray-800 ml-2 hover:text-black cursor-pointer">Já possui uma conta?</span></a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<!-- Fim body -->

<?php include_once("../top_bot/bot.php") ?>