
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
<?php include("./Components/sidebar.php")?>
<!-- Fim body -->

<?php include_once("../top_bot/bot.php") ?>
