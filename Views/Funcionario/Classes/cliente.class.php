<?php 
    class Cliente{
        var $cod;
        var $nome;
        var $tel;
        var $em;
        var $cel;
        var $cid;
        var $cep;
        var $cpf;
        var $img;

        function __construct($cod,$nm,$tel,$em,$cel,$cid,$cep,$cpf,$img)
        {
            $this->cod = $cod;
            $this -> nome = $nm;
            $this -> tel = $tel;
            $this -> em = $em;
            $this -> cel = $cel;
            $this -> cid = $cid;
            $this->cep = $cep;
            $this->cpf=$cpf;
            $this->img=$img;
        }
    }
?>