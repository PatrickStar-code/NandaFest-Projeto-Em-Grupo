<?php

$sql = "SELECT * FROM agendamentos WHERE cod_pedidos = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
?>

        <section class="h-100 h-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-8 col-xl-6">
                        <div class="card border-top border-bottom border-3" style="border-color: purple !important;">
                            <div class="card-body p-5">

                                <p class="lead fw-bold mb-5" style="color: blue;">Seu Agendamento </p>

                                <div class="row">
                                    <div class="col mb-3">
                                        <p class="small text-muted mb-1">Data do Evento</p>
                                        <p><?php echo $row["dthr_pedido"] ?></p>
                                    </div>
                                    <div class="col mb-3">
                                        <p class="small text-muted mb-1">ID do Evento</p>
                                        <p><?php echo $row["cod_pedidos"] ?></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col mb-3">
                                        <p class="small text-muted mb-1">Cidade do Evento</p>
                                        <p><?php echo $row["cidade_pedido"] ?></p>
                                    </div>
                                    <div class="col mb-3">
                                        <p class="small text-muted mb-1">Logadouro do Evento</p>
                                        <p><?php echo $row["logradouro_pedido"] ?></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col mb-3">
                                        <p class="small text-muted mb-1">Funcionario Responsavel</p>
                                        <p><?php $id_func = $row["funcionarios_cod_funcionario"];echo $_SESSION["func"][$id_func]->nome ?></p>
                                    </div>
                                </div>

                                <br>
                                <p class="small text-muted mb-1">DECORAÇÕES SOLICITADAS</p>
                                <div class="mx-n5 px-5 py-4" style="background-color: #f2f2f2;">
                                    <?php
                                    $sql2 = "SELECT * FROM dec_agendamento WHERE agendamentos_cod_pedidos = $id";
                                    $result2 = $conn->query($sql2);
                                    if ($result2->num_rows > 0) {
                                        // output data of each row
                                        while ($row2 = $result2->fetch_assoc()) {
                                    ?>
                                            <div class="row">
                                                <div class="col-md-8 col-lg-9">
                                                    <p><?php $dec = $row2["decoracoes_cod_decoracoes"];
                                                        echo $_SESSION["dec"][$dec]->descricao
                                                        ?></p>
                                                </div>
                                            </div>
                                    <?php }
                                    } else echo "Erro"; ?>
                                </div>



                                <div class="row my-4">
                                    <div class="col-md-4 offset-md-8 col-lg-3 offset-lg-9">
                                        <p class="lead fw-bold mb-0" style="color: blue;">R$ <?php echo $row["valor_pedido"] ?></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <p class="lead fw-bold mb-4 pb-2" style="color: blue;">Status</p>

                                    <div class="col-lg-12">

                                        <div class="horizontal-timeline">

                                            <ul class="list-inline items d-flex justify-content-between">
                                                <li class="list-inline-item items-list">
                                                    <?php if ($row["status_pedido"] == "Pendente") { ?>
                                                        <p class="py-1 px-2 rounded text-white" style="background-color: red;"><?php echo $row["status_pedido"] ?></p>
                                                    <?php } else { ?>
                                                        <p class="py-1 px-2 rounded text-white" style="background-color: green;"><?php echo $row["status_pedido"] ?></p>
                                                    <?php } ?>
                                                </li>
                                            </ul>

                                        </div>

                                    </div>
                                </div>


                                <p class="mt-4 pt-2 mb-0">Precisa de ajuda ? <a href="./chat.php" style="color:blue;">Contate-nos</a></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php }
} ?>