<?php 
  include_once("../Views/Cliente/Classes/cliente.class.php");

  session_start();

    $last_id = $_GET["last_id"];
    $id_cliente = $_SESSION["Login"]->cod;

    include_once("../Views/conexao.php");

    if($last_id == 0){

      $sql = "SELECT * FROM chat WHERE clientes_cod_cliente = $id_cliente ORDER BY idchat ASC";

    }else{

      $sql = "SELECT * FROM chat WHERE clientes_cod_cliente = $id_cliente AND idchat > $last_id";

    }
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      $mensagens = array();
      while($row = $result->fetch_assoc()) {
        $item = array($row["idchat"],$row["mensagem"],$row["PARA"]);
        array_push($mensagens, $item);
      }
    } else {
      $mensagens = array();
    }
    echo json_encode($mensagens);

?>