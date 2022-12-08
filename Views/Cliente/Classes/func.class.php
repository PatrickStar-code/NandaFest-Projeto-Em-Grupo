<?php 
class Func{
    var $cod;
    var $nome;
   
    var $img;

    function __construct($cod,$nome,$img)
    {
        $this->cod = $cod;
        $this -> nome = $nome;
        $this -> img = $img;
    
    }
}
?>