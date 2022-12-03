<?php 
include_once("../conexao.php");

class Tema{
    var $cod;
    var $desc;
    var $img;

    function __construct($cod,$desc,$img)
    {
        $this->cod=$cod;
        $this->desc=$desc;
        $this->img=$img;
    }
}

?>