<?php include_once("../top_bot/top.php");

//Classe empresa
include_once("./Classes/empresa.class.php");
include_once("./Classes/cliente.class.php");
include_once("./Classes/temas.class.php");


//Iniciando sesão
session_start();

if (!isset($_SESSION["Temas"])) {
    $sql = "SELECT * FROM temas";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $tema = new Tema($row["cod_tema"], $row["descricao_tema"], $row["img_tema"]);
            $_SESSION["Temas"][$row["cod_tema"]] = $tema;
        }
    } else {
        echo "deu ruim";
    }
}




// Incluindo navbar
include("./componentes/navbar.php");
?>


<!-- Body -->
<div class="container">
    <div class="row">
        <?php
        include("./componentes/card_temas.php");
        ?>
    </div>
</div>


<!-- Footer -->
<?php include("./componentes/footer.php"); ?>

<!-- Fim body -->

<?php include_once("../top_bot/bot.php") ?>