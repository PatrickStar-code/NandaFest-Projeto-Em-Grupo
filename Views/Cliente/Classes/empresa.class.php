<?php
include_once("../conexao.php");
class Empresa
{
    var $cod;
    var $nome;
    var $img;
    var $cnpj;

    function __construct($cod, $nome, $img, $cnpj)
    {
        $this->cod = $cod;
        $this->nome = $nome;
        $this->img = $img;
        $this->cnpj = $cnpj;
    }
}
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


