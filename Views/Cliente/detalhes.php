<?php
//Head
include_once("../top_bot/top.php");


//Classe empresa
include_once("./Classes/empresa.class.php");
include_once("./Classes/dec.class.php");
include_once("./Classes/cliente.class.php");

//Iniciando sesão
session_start();


// Incluindo navbar
include("./componentes/navbar.php");


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




$id = $_POST["id"];


?>

<!-- BODY -->
<div class="container">


    <br>
    <?php
    include("./componentes/detalhes.php");
    ?>
</div>
<!-- FIM BODY -->

<?php include_once("../top_bot/bot.php") ?>