<?php
/*
 * @author Cesar Szpak - Celke - cesar@celke.com.br
 * @pagina desenvolvida usando FullCalendar,
 * o código é aberto e o uso é free,
 * porém lembre-se de conceder os créditos ao desenvolvedor.
 */

include_once("../conexao.php");

include_once("../top_bot/top.php");

//Classe empresa
include_once("./Classes/empresa.class.php");
include_once("./Classes/cliente.class.php");
include_once("./Classes/temas.class.php");


//Iniciando sesão
session_start();

var_dump($_SESSION["Login"]);
$id_cliente = $_SESSION["Login"]->cod;

$sql = "SELECT * FROM agendamentos WHERE clientes_cod_cliente = $id_cliente;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $id = $row['cod_pedidos'];
        $title = $row['descricao_pedido'];
        $start = $row['dthr_pedido'];

        $events[] = [
            'id' => $id,
            'title' => $title,
            'start' => $start,
        ];
    }
} else {
    echo "0 results";
}



echo json_encode($events);
