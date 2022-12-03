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

