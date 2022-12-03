<?php
/*
 * @author Cesar Szpak - Celke - cesar@celke.com.br
 * @pagina desenvolvida usando FullCalendar,
 * o código é aberto e o uso é free,
 * porém lembre-se de conceder os créditos ao desenvolvedor.
 */

include 'conexao.php';

$query_events = "SELECT * FROM agendamentos";
$resultado_events = $conn->prepare($query_events);
$resultado_events->execute();

$eventos = [];

while($row_events = $resultado_events->fetch(PDO::FETCH_ASSOC)){
    $id = $row_events['cod_pedido'];
    $title = $row_events['descricao_pedido'];
    $start = $row_events['dt_pedido'];
    
    $eventos[] = [
        'id' => $id, 
        'title' => $title, 
        'start' => $start,
        ];
}

echo json_encode($eventos);