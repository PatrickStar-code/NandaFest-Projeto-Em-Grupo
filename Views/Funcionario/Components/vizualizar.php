<?php
$pedido = $_GET["id"];
$sql = "SELECT * FROM agendamentos WHERE cod_pedidos = $pedido";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
?>


        <div class="container m-auto px-6 py-20 md:px-12 lg:px-20">

            <div class="mt-12 m-auto -space-y-4 items-center justify-center md:flex md:space-y-0 md:-space-x-4 xl:w-10/12">
                <div class="relative  -mx-4 group md:w-6/12 md:mx-0 lg:w-5/12">
                    <div aria-hidden="true" class="absolute top-0 w-full h-full rounded-2xl bg-white shadow-xl transition duration-500 group-hover:scale-105 lg:group-hover:scale-110"></div>
                    <div class="relative p-6 space-y-6 lg:p-8">
                        <h3 class="text-3xl text-gray-700 font-semibold text-center">Agendamento #<?php echo $row["cod_pedidos"] ?></h3>
                        <div>
                            <div class="relative flex justify-around">
                                <div class="flex items-end">
                                    <span class="text-8xl text-gray-800 font-bold leading-0"><?php echo $row["valor_pedido"] ?></span>
                                    <div class="pb-2">
                                        <span class="block text-2xl text-gray-700 font-bold">R$</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul role="list" class="w-max space-y-4 py-6 m-auto text-gray-600">
                            <li class="space-x-2">
                                <span>Cliente: <?php $id_c = $row["clientes_cod_cliente"];
                                                echo $_SESSION["Clientes"][$id_c]->nome ?></span>
                            </li>
                            <li class="space-x-2">
                                <span>Logadouro: <?php echo $row["logradouro_pedido"] ?></span>
                            </li>
                            <li class="space-x-2">
                                <span>Descrição: <?php echo $row["descricao_pedido"] ?></span>
                            </li>
                            <li class="space-x-2">
                                <span>Status: <?php echo $row["status_pedido"] ?></span>
                            </li>
                        </ul>
                        <p class="flex items-center justify-center space-x-4 text-lg text-gray-600 text-center">
                            <a href="" class="flex space-x-2 items-center text-purple-600">
                                <img src="../Imgs/calendario (1).png" alt="" class="h-12">
                                <span class="font-semibold"><?php echo $row["dthr_pedido"] ?></span>
                            </a>
                        </p>
                        <a href="./agendamentos.php"><button type="button" title="Submit" class="block w-full py-3 px-6 text-center rounded-xl transition bg-purple-600 hover:bg-purple-700 active:bg-purple-800 focus:bg-indigo-600">
                                Retorna Aos Agendamentos
                            </button></a>
                    </div>
                </div>

                <div class="relative group md:w-6/12  lg:w-7/12">
                    <div aria-hidden="true" class="absolute top-0 w-full h-full rounded-2xl bg-white shadow-lg transition duration-500 group-hover:scale-105">
                    </div>

                    <div class="relative p-6 pt-16 md:p-8 md:pl-12 md:rounded-r-2xl lg:pl-20 lg:p-16">
                        <p>Comentario: <?php echo $row["comentario_pedido"] ?></p>
                        <p class="text-4xl">Decorações</p>

                        <ul role="list" class="space-y-4 py-6 text-gray-600">
                            <?php $sql2 = "SELECT * FROM dec_agendamento WHERE agendamentos_cod_pedidos = $pedido";
                            $result2 = $conn->query($sql2);

                            if ($result2->num_rows > 0) {
                                // output data of each row
                                while ($row2 = $result2->fetch_assoc()) {
                            ?>
                                    <li class="space-x-2">
                                        <span class="text-purple-500 font-semibold">&check;</span>
                                        <span><?php $id_dec = $row2["decoracoes_cod_decoracoes"]; echo $_SESSION["dec"][$id_dec] -> descricao?></span>
                                    </li>
                                 
                            <?php }
                            } ?>
                        </ul>


                    </div>
                </div>
            </div>
        </div>
<?php       }
} ?>