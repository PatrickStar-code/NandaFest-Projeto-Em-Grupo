<?php
$id = $_SESSION["login"]->cod;
$sql = "SELECT * FROM agendamentos WHERE funcionarios_cod_funcionario = $id";
$result = $conn->query($sql);
?>


<section class="container mx-auto p-6 font-mono">
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
        <div class="w-full overflow-x-auto">
            <table class="w-full" id="table">
                <thead>
                    <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                        <th class="px-4 py-3">Pedido</th>
                        <th class="px-4 py-3">Cliente</th>
                        <th class="px-4 py-3">Logadouro</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Valor</th>
                        <th class="px-4 py-3">Ações</th>

                    </tr>
                </thead>
                <tbody class="bg-white">
                    <?php if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 border">
                                    <div class="flex items-center text-sm">

                                        <div>
                                            <p class="text-xs">#<?php echo $row["cod_pedidos"] ?></p>
                                            <p class="font-semibold text-black"><?php echo $row["descricao_pedido"] ?></p>
                                            <p class="text-xs text-gray-600"><?php echo $row["dthr_pedido"] ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-ms font-semibold border"><?php $id_c = $row["clientes_cod_cliente"];
                                                                                    echo $_SESSION["Clientes"][$id_c]->nome  ?></td>
                                <td class="px-4 py-3 text-ms font-semibold border"><?php echo $row["logradouro_pedido"]  ?></td>
                                <td class="px-4 py-3 text-xs border">
                                    <?php if ($row["status_pedido"] == "Aceito") { ?>
                                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"><?php echo $row["status_pedido"] ?></span>
                                    <?php } else { ?>
                                        <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-sm"><?php echo $row["status_pedido"] ?></span>

                                    <?php } ?>
                                </td>
                                <td class="px-4 py-3 text-sm border"><?php
                                                                        if ($row["valor_pedido"] == 0) {
                                                                            echo "A Combinar";
                                                                        } else {
                                                                            echo "R$ " . $row["valor_pedido"];
                                                                        }
                                                                        ?></td>
                                <td class="px-4 py-3 text-sm border">
                                    <?php if ($row["status_pedido"] == "Aceito") { ?>
                                        <!-- Se Aceito -->
                                        <!-- VIZUALIZAR -->
                                        <a href="verificar.php?id=<?php echo $row["cod_pedidos"] ?>"><button type="button" class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800">
                                                <img src="../Imgs/lupa.png" alt="" class="h-5 w-5">
                                                <span class="sr-only">Vizualizar</span>
                                            </button></a>

                                        <button  data-modal-toggle="red<?php echo $row["cod_pedidos"] ?>" type="button" class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800">
                                        <img src="../Imgs/atualizar.png" alt="" class="h-5 w-5">
                                            <span class="sr-only">Cancelar</span>
                                        </button>


                                        <!-- Cancelar/Excluir -->
                                        <button data-modal-toggle="cancel<?php echo $row["cod_pedidos"] ?>" type="button" class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800">
                                            <img src="../Imgs/cancelar.png" alt="" class="h-5 w-5">
                                            <span class="sr-only">Cancelar</span>
                                        </button>



                                    <?php } else { ?>
                                        <!-- Se nao aceito -->
                                        <!-- Vizualizar -->
                                        <a href="verificar.php?id=<?php echo $row["cod_pedidos"] ?>"><button type="button" class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800">
                                                <img src="../Imgs/lupa.png" alt="" class="h-5 w-5">
                                                <span class="sr-only">Vizualizar</span>
                                            </button></a>

                                        <!-- Confirmar -->
                                        <button type="button" data-modal-toggle="popup-modal<?php echo $row["cod_pedidos"] ?>" class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800">
                                            <img src="../Imgs/verificado.png" alt="" class="h-5 w-5">
                                            <span class="sr-only">Confirmar</span>
                                        </button>


                                        <!-- Cancelar/Excluir -->
                                        <button data-modal-toggle="cancel<?php echo $row["cod_pedidos"] ?>" type="button" class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800">
                                            <img src="../Imgs/cancelar.png" alt="" class="h-5 w-5">
                                            <span class="sr-only">Cancelar</span>
                                        </button>


                                    <?php } ?>
                                </td>
                            </tr>
                            <!-- Modal Confirmar pedido -->
                            <div id="popup-modal<?php echo $row["cod_pedidos"] ?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                <div class="relative w-full h-full max-w-md md:h-auto">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal<?php echo $row["cod_pedidos"] ?>">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-6 text-center">
                                            <img src="../Imgs/verificado.png" alt="" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200">
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Realmente deseja confirmar o pedido o pedido <?php echo  $row["cod_pedidos"] ?>?</h3>
                                            <button data-modal-toggle="val<?php echo $row["cod_pedidos"] ?>" type="button" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Sim
                                            </button>

                                            <button data-modal-toggle="popup-modal<?php echo $row["cod_pedidos"] ?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-black-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Não</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Cancelar Pedido -->
                            <div id="cancel<?php echo $row["cod_pedidos"] ?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                <div class="relative w-full h-full max-w-md md:h-auto">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="cancel<?php echo $row["cod_pedidos"] ?>">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-6 text-center">
                                            <img src="../Imgs/cancelar.png" alt="" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200">
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Realmente deseja cancelar o pedido <?php echo  $row["cod_pedidos"] ?>?</h3>
                                            <a href="?apagar=true&id=<?php echo $row["cod_pedidos"] ?>"><button data-modal-toggle="cancel<?php echo $row["cod_pedidos"] ?>" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                    Sim
                                                </button></a>
                                            <button data-modal-toggle="cancel<?php echo $row["cod_pedidos"] ?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-black-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Não</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Definir Valor -->
                            <div id="val<?php echo $row["cod_pedidos"] ?>" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                <div class="relative w-full h-full max-w-md md:h-auto">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow">
                                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="val<?php echo $row["cod_pedidos"] ?>">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="px-6 py-6 lg:px-8">
                                            <form action="" method="POST"></form>
                                            <form action="" method="POST">

                                                <h3 class="mb-4 text-xl font-medium text-gray-900">Digite o Valor para o Agendamento <?php echo $row["cod_pedidos"] ?></h3>
                                                <input type="text" name="id" value="<?php echo $row["cod_pedidos"] ?>" style="display: none;">
                                                <label for="val" class="block mb-2 text-sm font-medium text-gray-900">Valor</label>
                                                <input type="text" name="val" id="val" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="124,85" required>
                                                <br>
                                                <button type="submit" name="definir_val" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <!-- ReDefinir Valor -->
                             <div id="red<?php echo $row["cod_pedidos"] ?>" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                <div class="relative w-full h-full max-w-md md:h-auto">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow">
                                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="red<?php echo $row["cod_pedidos"] ?>">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="px-6 py-6 lg:px-8">
                                            <form action="" method="POST"></form>
                                            <form action="" method="POST">

                                                <h3 class="mb-4 text-xl font-medium text-gray-900">Redefine o valor do agendamento <?php echo $row["cod_pedidos"] ?></h3>
                                                <input type="text" name="id" value="<?php echo $row["cod_pedidos"] ?>" style="display: none;">
                                                <label for="val" class="block mb-2 text-sm font-medium text-gray-900">Valor</label>
                                                <input type="text" name="val" id="val" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="124,85" required>
                                                <br>
                                                <button type="submit" name="red_val" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>