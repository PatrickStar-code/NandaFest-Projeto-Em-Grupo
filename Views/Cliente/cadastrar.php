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



?>

<!-- <div class="h-screen flex" >
    <div class="flex w-1/2 bg-gradient-to-r from-gray-700 to-gray-500 i justify-around items-center">
        <div>
            <div class="">
            <img src="<?php echo $_SESSION["Empresa"]->img ?>" class="" alt="Flowbite Logo" />
            </div>
            <h1 class="text-white font-bold text-4xl font-sans">Nanda Decorações</h1>
            <p class="text-white mt-1">Celebre Conosco!</p>
            <a href="./sobre_nos.php"><button type="submit" class="block w-28 bg-gray-200 text-gray-800 mt-4 py-2 rounded-2xl font-bold mb-2">Saiba Mais</button></a>
        </div>
    </div>
    <div class="flex w-1/2 justify-center items-center bg-gradient-to-r from-gray-500 to-gray-800">
        <div class="block   text-gray-800 mt-4 py-2 rounded-3 font-bold mb-2">
            <div class="block bg-gray-300  text-gray-800 mt-4 py-2 rounded-3 font-bold mb-2">
                <form class="bg-bg-blue-500" method="POST" action="#" id="form">
                    <div class="p-8 rounded border-gray-200">
                        <h1 class="font-medium text-3xl">Bem Vindo!</h1>
                        <p class=" mt-6">Cadastre-se para a festa!</p>


                        <div class="mt-8 grid lg:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="text-sm block mb-1 font-medium">Nome</label>
                                <input type="text" name="nome" id="nome" required class="bg-white border border-gray-200 rounded py-1 px-3 block focus:ring-black focus:border-black text-gray-800 w-full" />
                            </div>

                            <div>
                                <label for="email" class="text-sm block mb-1 font-medium">Email</label>
                                <input type="text" name="email" id="email" required  class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-black focus:border-black text-gray-800 w-full" />
                            </div>

                            <div>
                                <label for="telefone" class="text-sm block mb-1 font-medium">Telefone</label>
                                <input type="text" name="telefone" id="telefone" required  class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-black focus:border-black text-gray-800 w-full" />
                            </div>


                            <div>
                                <label for="name" class="text-sm block mb-1 font-medium">Cep</label>
                                <input type="text" id="cep" name="cep" required  class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-black focus:border-black text-gray-800 w-full" />
                            </div>


                        </div>
                        <div class="mt-8 grid lg:grid-cols-2 gap-4">

                            <div>
                                <label for="email" class="text-sm block mb-1 font-medium">UF</label>
                                <input type="text" id="uf" name="uf" required  class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-black focus:border-black text-gray-800 w-full" />
                            </div>

                            <div>
                                <label for="cidade" class="text-sm block mb-1 font-medium">Cidade</label>
                                <input type="text" id="cidade" required  name="cidade" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-black focus:border-black text-gray-800 w-full" />
                            </div>

                            <div>
                                <label for="bairro" class="text-sm block mb-1 font-medium">Bairro</label>
                                <input type="text" id="bairro" required  name="bairro" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-black focus:border-black text-gray-800 w-full" />
                            </div>
                            <div>
                                <label for="endereco" class="text-sm block mb-1 font-medium">Endereço</label>
                                <input type="text" id="endereco" required  name="endereco" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-black focus:border-black text-gray-800 w-full" />
                            </div>
                            <div>
                                <label for="numero" class="text-sm block mb-1 font-medium">Numero</label>
                                <input type="text" id="numero" required  name="numero" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-black focus:border-black text-gray-800 w-full" />
                            </div>



                            <div>
                                <label for="username" class="text-sm block mb-1 font-medium">Usuario</label>
                                <input type="text" name="username" required  id="username" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-black focus:border-black text-gray-800 w-full" />
                            </div>
                            <div>
                                <label for="password" class="text-sm block mb-1 font-medium">Senha</label>
                                <input type="password" name="password" required  id="password" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-black focus:border-black text-gray-800 w-full" />
                            </div>
                            <div>
                                <label for="tpasword" class="text-sm  block mb-1 font-medium">Repita sua senha</label>
                                <input type="password" name="tpassword" required  id="tpassword" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-black focus:border-black text-gray-800 w-full" />
                            </div>
                        </div>
                        <br>
                        <span id="msg"></span>
                        <div class="space-x-4 mt-8">
                            <button type="submit" class="block w-full bg-blue-500 border-2  mt-4 py-2 rounded-2xl text-gray-800 font-medium mb-1 hover:bg-gradient-to-r from-blue-500 to-blue-700" name="cadastro">Registrar-se</button>

                            <!-- Secondary -->
<!-- <a href="./index.php"><span class="text-sm text-gray-800 ml-2 hover:text-black cursor-pointer">Já possui uma conta?</span></a>
                        </div>
                </form>


            </div>

        </div>
    </div>
</div> -->
<section class="h-screen">
    <div class="container px-6 py-12 h-full">
        <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
            <div class="md:w-8/12 lg:w-6/12 mb-12 md:mb-0">
                <img src="../Imgs/undraw_secure_login_pdn4.png" class="w-full" alt="Phone image" />
            </div>
            <div class="md:w-8/12 lg:w-5/12 lg:ml-20">
                <form id="form">
                    <!-- User_name input -->
                    <div id="user">
                        <div class="mb-6">
                            <input type="text" required class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Username" id="username" name="username" />
                        </div>

                        <!-- Password input -->
                        <div class="mb-6">
                            <input type="password" required class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Password" id="password" name="password" />
                        </div>

                        <!-- Password input -->
                        <div class="mb-6">
                            <input type="password" class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Repeat Password" id="tpassword" name="tpassword" />
                        </div>
                        <div class="row">
                            <button type="button" id="next-2" class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full" data-mdb-ripple="true" data-mdb-ripple-color="light">
                                Next ->
                            </button>
                        </div>
                    </div>

                    <div id="pessoal">
                        <div class="mb-6">
                            <input type="text" required class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Nome" id="nome" name="nome" />
                        </div>
                        <div class="mb-6">
                            <input type="email" required class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Email" id="email" name="email" />
                        </div>
                        <div class="mb-6">
                            <input type="text" required class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Telefone" id="telefone" name="telefone" />
                        </div>
                        <div class="row">
                            <div class="col-6">

                                <button type="button" id="return-1" class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full" data-mdb-ripple="true" data-mdb-ripple-color="light">
                                    Prev <- </button>
                            </div>
                            <div class="col-6">
                                <button type="button" id="next-3" class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full" data-mdb-ripple="true" data-mdb-ripple-color="light">
                                    Next ->
                                </button>
                            </div>
                        </div>
                    </div>

                    <div id="loc">
                        <div class="mb-6">
                            <input type="text" required class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Cep" id="cep" name="cep" />
                        </div>
                        <div class="mb-6">
                            <input type="text" required class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Uf" id="uf" name="uf" />
                        </div>
                        <div class="mb-6">
                            <input type="text" required class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Cidade" id="cidade" name="cidade" />
                        </div>
                        <div class="mb-6">
                            <input type="text" required class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Bairro" id="bairro" name="bairro" />
                        </div>
                        <div class="mb-6">
                            <input type="text" required class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Endereço" id="endereco" name="endereco" />
                        </div>
                        <div class="mb-6">
                            <input type="text" required class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Bairro" id="bairro" name="bairro" />
                        </div>
                        <div class="mb-6">
                            <input type="text" required class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Numero" id="numero" name="numero" />
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button type="button" id="return-2" class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full" data-mdb-ripple="true" data-mdb-ripple-color="light">
                                    Prev <- </button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full" data-mdb-ripple="true" data-mdb-ripple-color="light">
                                    Enviar
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between items-center mb-6">
                        <a href="./index.php" class="text-blue-600 hover:text-blue-700 focus:text-blue-700 active:text-blue-800 duration-200 transition ease-in-out">Ja possui login?</a>
                    </div>

                    <div class="flex justify-between items-center mb-6">
                        <span id="msg"></span>
                        <span id="aviso" class="text-lg text-red-500"></span>

                    </div>



                </form>
            </div>
        </div>
    </div>
</section>

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
    $("#pessoal").hide();
    $("#loc").hide();

    $("#return-2").click(function(e) {
        e.preventDefault();
        $("#aviso").html("");
        $("#loc").hide();
        $("#pessoal").show();


    });

    $("#next-3").click(function(e) {
        e.preventDefault();
        if ($("#nome").val() == "" || $("#email").val() == "" || $("#telefone").val() == "") {
            $("#aviso").html("Insira todos dados corretamente");
        } else {
            $("#aviso").html("");
            $("#pessoal").hide();
            $("#loc").show();
        }

    });

    $("#return-1").click(function(e) {
        e.preventDefault();
        $("#aviso").html("");
        $("#pessoal").hide();
        $("#user").show();
    });

    $("#next-2").click(function(e) {
        e.preventDefault();
        if ($("#username").val() == "" || $("#password").val() == "" || $("#tpassword").val() == "") {
            $("#aviso").html("Insira todos dados corretamente");
        } else {
            $("#aviso").html("");
            $("#user").hide();
            $("#pessoal").show();
        }
    });

    $("#telefone").mask("(00)00000-0000")
    $("#cep").mask("00000-000")

    // Adicionando AJAX

    function myFn() {
        console.log('idle');
    }

    var myTimer = setInterval(() => {
        $("#msg").empty();
    }, 5000);;

    // Then, later at some future time, 
    // to restart a new 4 second interval starting at this exact moment in time
    clearInterval(myTimer);
    myTimer = setInterval(() => {
        $("#msg").empty();
    }, 5000);

    $(document).ready(function() {
        $("#form").submit(function(e) {
            e.preventDefault();
            myFn();
            alert("rodei");
            $.post("../../Controller/cadastrar.php", {
                    nome: $("#nome").val(),
                    email: $("#email").val(),
                    telefone: $("#telefone").val(),
                    cep: $("#cep").val(),
                    uf: $("#uf").val(),
                    cidade: $("#cidade").val(),
                    bairro: $("#bairro").val(),
                    endereco: $("#endereco").val(),
                    numero: $("#numero").val(),
                    username: $("#username").val(),
                    password: $("#password").val(),
                    tpassword: $("#tpassword").val()
                },
                function(data) {
                    $("#msg").append(data);
                    $("#nome").val("")
                    $("#email").val("")
                    $("#telefone").val("")
                    $("#cep").val("")
                    $("#uf").val("")
                    $("#cidade").val("")
                    $("#bairro").val("")
                    $("#endereco").val("")
                    $("#numero").val("")
                    $("#username").val("")
                    $("#password").val("")
                    $("#tpassword").val("")
                }
            );

        });
    })
</script>

<?php include_once("../top_bot/bot.php") ?>