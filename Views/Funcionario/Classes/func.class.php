<?php 
    class Funcionario{
        var $cod;
        var $nome;
        var $tel;
        var $cpf;
        var $logadouro;
        var $celular;
        var $email;
        var $img;

        function __construct($cod,$nome,$tel,$cpf,$log,$cel,$em,$img)
        {
            $this->cod = $cod;
            $this->nome = $nome;
            $this->tel = $tel;
            $this->cpf = $cpf;
            $this->logadouro = $log;
            $this->celular = $cel;
            $this->email = $em;
            $this->img = $img;
        }
    }
?>