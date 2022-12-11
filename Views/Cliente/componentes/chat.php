<br>
<div class="container mx-aut">
    <div class="min-w-full border rounded lg:grid lg:grid-cols-3">
    </div>
    <div class="relative w-full p-6 overflow-y-auto h-[40rem]">
        <ul class="space-y-2">
            <?php
            $id_cliente = $_SESSION["Login"]->cod;
            $sql = "SELECT * FROM Chat WHERE clientes_cod_cliente  = $id_cliente";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {


                    if ($row['PARA'] == "Funcionario") {
            ?>
                        <!-- DIV CLIENTE -->
                        <li class="flex justify-end">
                            <div class="relative max-w-xl px-4 py-2 text-gray-700 bg-gray-100 rounded shadow">
                                <span class="block"><?php echo $row["mensagem"] ?></span>
                            </div>
                        </li>
                    <?php } else { ?>

                        <!-- DIV GESTOR -->
                        <li class="flex justify-start">
                            <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
                                <span class="block"><?php echo $row["mensagem"] ?></span>
                            </div>
                        </li>
                    <?php } ?>
            <?php }
            } ?>
        </ul>
    </div>
    <form action="" method="POST" id="chat">
        <div class="flex items-center justify-between w-full p-3 border-t border-gray-300">

            <input type="text" placeholder="Message" class="block w-full py-2 pl-4 mx-3 bg-gray-100 rounded-full outline-none focus:text-gray-700" name="message" required />

            <button type="submit" name="msg">
                <svg class="w-5 h-5 text-gray-500 origin-center transform rotate-90" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                </svg>
            </button>
    </form>
</div>
