<?php
//Head
include_once("../top_bot/top.php");


//Classe empresa
include_once("./Classes/empresa.class.php");
include_once("./Classes/cliente.class.php");

//Iniciando sesão
session_start();

// Incluindo navbar
include("./componentes/navbar.php");

if (isset($_POST["mandei"])) {
    $nome = $_POST["nome"];
    $tel = $_POST["tel"];
    $em = $_POST["em"];
    $cel = $_POST["cel"];
    $cid = $_POST["cid"];
    $cep = $_POST["cep"];
    $cpf = $_POST["cpf"];
    $id = $_SESSION["Login"]->cod;


    $sql = "UPDATE clientes SET nome_cliente='$nome',telefone_cliente='$tel',email_cliente	='$em',celular_cliente='$cel',cidade_cliente='$cid',	cep_cliente='$cep',cpf_cliente='$cpf' WHERE cod_cliente=$id";

    if ($conn->query($sql) === TRUE) {
        echo '<div id="toast-success" class="flex fixed-bottom items-center p-4 mb-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
  <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
      <span class="sr-only">Check icon</span>
  </div>
  <div class="ml-3 text-sm font-normal">Dados Alterado com sucesso.</div>
  <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
      <span class="sr-only">Close</span>
      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
  </button>
</div>';
        $_SESSION["Login"]->nome = $nome;
        $_SESSION["Login"]->tel = $tel;
        $_SESSION["Login"]->em = $em;
        $_SESSION["Login"]->cel = $cel;
        $_SESSION["Login"]->cid = $cid;
        $_SESSION["Login"]->cep = $cep;
        $_SESSION["Login"]->cpf = $cpf;
    } else {
        echo '<div id="toast-warning" class="flex items-center p-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
  <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
      <span class="sr-only">Warning icon</span>
  </div>
  <div class="ml-3 text-sm font-normal">Algo inesperado aconteceu!</div>
  <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-warning" aria-label="Close">
      <span class="sr-only">Close</span>
      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
  </button>
</div>';
    }
}

?>
<script>
    $(document).ready(function() {


        $("#btn-editar").click(function(e) {
            e.preventDefault();
            $("#btn-editar").hide();
            $("#btn-submit").show();
            $("#alterar").hide();
            $("#editar").show();
        });


    })
</script>
<style>
    body {
        background-color: #BA68C8;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8;
    }

    .profile-button {
        background: rgb(99, 39, 120);
        box-shadow: none;
        border: none;
    }

    .profile-button:hover {
        background: #682773;
    }

    .profile-button:focus {
        background: #682773;
        box-shadow: none;
    }

    .profile-button:active {
        background: #682773;
        box-shadow: none;
    }

    .back:hover {
        color: #682773;
        cursor: pointer;
    }

    .labels {
        font-size: 11px;
    }

    .add-experience:hover {
        background: #BA68C8;
        color: #fff;
        cursor: pointer;
        border: solid 1px #BA68C8;
    }

    .profile-edit-btn {
        border: none;
        border-radius: 1.5rem;
        width: 70%;
        padding: 2%;
        font-weight: 600;
        color: white;
        cursor: pointer;
        background-color: #BA68C8;

    }
</style>

<!-- body -->
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="<?php if ($_SESSION["Login"]->img == null) {
                                                                        echo 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTEn1obslNphDThy9T6_yi-ClXQbXlQeq6qlYhWTU0Pm8Pp6TAiJJbthriUTHueCFBeYFM&usqp=CAU';
                                                                    } else echo $_SESSION["Login"]->img
                                                                    ?> ?>" alt="Sem Imagem Cadastrada">
                <span class="font-weight-bold"><?php echo $_SESSION["Login"]->nome ?></span>
                <span class="text-black-50"><?php echo $_SESSION["Login"]->em ?></span><span> </span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                </div>
                <form action="" method="POST">
                    <button type="button" class="profile-edit-btn" id="btn-editar">Editar</button>
                    <button type="submit" name="mandei" class="profile-edit-btn" id="btn-submit" style="display: none;">Alterar</button>

                    <div class="row mt-2" style="display:none;" id="editar">
                        <div class="col-md-12"><label class="labels">Name Completo</label><input type="text" name="nome" class="form-control" placeholder="Escreva seu nome completo!" value="<?php echo $_SESSION["Login"]->nome ?>"></div>
                        <div class="col-md-12"><label class="labels">Telefone</label><input type="text" name="tel" class="form-control" placeholder="Digite o seu telefone fixo!" value="<?php echo $_SESSION["Login"]->tel ?>"></div>
                        <div class="col-md-12"><label class="labels">Email</label><input type="text" name="em" class="form-control" placeholder="Escreva o seu email!" value="<?php echo $_SESSION["Login"]->em ?>"></div>
                        <div class="col-md-12"><label class="labels">Celular</label><input type="text" name="cel" class="form-control" placeholder="Digite o seu n° de celular!" value="<?php echo $_SESSION["Login"]->cel ?>"></div>
                        <div class="col-md-12"><label class="labels">Cidade</label><input type="text" name="cid" class="form-control" placeholder="Escreva o nome da sua cidade!" value="<?php echo $_SESSION["Login"]->cid ?>"></div>
                        <div class="col-md-12"><label class="labels">CEP</label><input type="text" name="cep" class="form-control" placeholder="Escreva o seu CEP!" value="<?php echo $_SESSION["Login"]->cep ?>"></div>
                        <div class="col-md-12"><label class="labels">CPF</label><input id="cpf" type="text" name="cpf" class="form-control" placeholder="Escreva o seu CPF!" value="<?php echo $_SESSION["Login"]->cpf ?>"></div>
                    </div>
                    <div class="row mt-2" id="alterar">
                        <div class="col-md-12"><label class="labels">Name Completo</label><span class="form-control"><?php echo $_SESSION["Login"]->nome ?></span></div>
                        <div class="col-md-12"><label class="labels">Telefone</label><span class="form-control"><?php echo $_SESSION["Login"]->tel ?></span></div>
                        <div class="col-md-12"><label class="labels">Email</label><span class="form-control"><?php echo $_SESSION["Login"]->em ?></span></div>
                        <div class="col-md-12"><label class="labels">Celular</label><span class="form-control"><?php echo $_SESSION["Login"]->cel ?></span></div>
                        <div class="col-md-12"><label class="labels">Cidade</label><span class="form-control"><?php echo $_SESSION["Login"]->cid ?></span></div>
                        <div class="col-md-12"><label class="labels">CEP</label><span class="form-control"><?php echo $_SESSION["Login"]->cep ?></span></div>
                        <div class="col-md-12"><label class="labels">CPF</label><span class="form-control"><?php echo $_SESSION["Login"]->cpf ?></span></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    $("#cpf").mask("000.000.000-00")
</script>
<!-- fim body -->

<?php include_once("../top_bot/bot.php") ?>