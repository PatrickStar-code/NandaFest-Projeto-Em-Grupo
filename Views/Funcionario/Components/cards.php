<div class="max-w-full mx-4 py-6 sm:mx-auto sm:px-6 lg:px-8">
    <div class="sm:flex sm:space-x-4">
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full sm:w-1/3 sm:my-8">
            <div class="bg-white p-5">
                <div class="sm:flex sm:items-start">
                    <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                        <h3 class="text-sm leading-6 font-medium text-gray-400">Festas Confirmadas</h3>
                        <?php 
                        $id_func = $_SESSION["login"]->cod;
                        $sql = "SELECT count(*) as CONTADOR FROM agendamentos WHERE funcionarios_cod_funcionario = $id_func AND status_pedido = 'Aceito' " ;
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                            $total = $row["CONTADOR"];
                          }
                        }
                        ?>
                        <p class="text-3xl font-bold text-black"><?php echo $total ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full sm:w-1/3 sm:my-8">
            <div class="bg-white p-5">
                <div class="sm:flex sm:items-start">
                    <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                    <?php 
                        $sql2 = "SELECT count(*) as CONTADOR FROM agendamentos WHERE funcionarios_cod_funcionario = $id_func" ;
                        $result2 = $conn->query($sql2);
                        
                        if ($result2->num_rows > 0) {
                          // output data of each row
                          while($row2 = $result2->fetch_assoc()) {
                            $total2 = $row2["CONTADOR"];
                          }
                        }
                        ?>
                        <h3 class="text-sm leading-6 font-medium text-gray-400">Agendamentos</h3>
                        <p class="text-3xl font-bold text-black"><?php echo $total2 ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full sm:w-1/3 sm:my-8">
            <div class="bg-white p-5">
                <div class="sm:flex sm:items-start">
                    <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                        <h3 class="text-sm leading-6 font-medium text-gray-400">Valor Total</h3>
                        <?php 
                        $sql3 = "SELECT sum(valor_pedido) as soma FROM agendamentos WHERE funcionarios_cod_funcionario = $id_func AND status_pedido = 'Aceito' " ;
                        $result3 = $conn->query($sql3);
                        
                        if ($result3->num_rows > 0) {
                          // output data of each row
                          while($row3 = $result3->fetch_assoc()) {
                            if($row3["soma"] == null){
                                $total3 = 0;

                            }
                            else{
                                $total3 = $row3["soma"];
                            }

                          }
                        }
                        ?>
                        <p class="text-3xl font-bold text-black">R$ <?php echo $total3 ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>