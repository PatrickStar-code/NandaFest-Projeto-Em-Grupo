<?php 
    include_once("../Views/conexao.php");

    $sql = "SELECT * FROM Clientes";
    $result = $conn->query($sql);

    $clientes = array();

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $dadosClientes = array($row["cod_cliente"], $row["nome_cliente"], $row["img_cliente"]);

            array_push($clientes, $dadosClientes);
        }
    } else {
        echo "0 results";
    }
    echo json_encode($clientes);
?>