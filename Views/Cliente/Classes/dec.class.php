<?php 
    class Dec{
       var $cod_dec;
       var $descricao;
       var $img;
       Var $tema;

        function __construct($cod,$desc,$img,$tema)
        {
            $this->cod_dec=$cod;
            $this->descricao=$desc;
            $this->img=$img;
            $this->tema=$tema;

        }
    }
?>