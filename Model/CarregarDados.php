<?php 
    include_once("../Views/conexao.php");

    $id = $_GET["id"];

    $sql = "SELECT * FROM chat";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            
        }
    } else {
        echo "0 results";
    }








?>