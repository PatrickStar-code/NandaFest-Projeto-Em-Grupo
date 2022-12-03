<?php
include_once("../top_bot/top.php");

//Classe empresa
include_once("./Classes/empresa.class.php");
include_once("./Classes/cliente.class.php");

//Iniciando sesão
session_start();



// Incluindo navbar
include("./componentes/navbar.php");


?>
<!-- Body -->
<?php
    // MAPA
    include("./componentes/mapa.php");

    // SLIDE
    include("./componentes/slide_nos.php");

    //Footer
    include("./componentes/footer.php");

?>

<!-- Fim body -->

<?php include_once("../top_bot/bot.php") ?>