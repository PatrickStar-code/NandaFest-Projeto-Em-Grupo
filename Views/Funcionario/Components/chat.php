<div class="container mx-auto">
  <div class="min-w-full border rounded lg:grid lg:grid-cols-3">
    <div class="border-r border-gray-300 lg:col-span-1">
      <div class="mx-3 my-3">
        <div class="relative text-gray-600"></div>
      </div>

      <ul class="overflow-auto h-[32rem]">
        <h2 class="my-2 mb-2 ml-2 text-lg text-gray-600">Chats</h2>
        <?php foreach ($_SESSION["Clientes"] as  $cliente) { ?>
          <li>
            <a href="?id_cliente=<?php echo $cliente->cod ?>" class="flex items-center px-3 py-2 text-sm transition duration-150 ease-in-out border-b border-gray-300 cursor-pointer hover:bg-gray-100 focus:outline-none">
              <img class="object-cover w-10 h-10 rounded-full" src="<?php if ($cliente->img == null) {
                                                                      echo 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTEn1obslNphDThy9T6_yi-ClXQbXlQeq6qlYhWTU0Pm8Pp6TAiJJbthriUTHueCFBeYFM&usqp=CAU';
                                                                    } else {
                                                                      echo $cliente->img;
                                                                    } ?>" alt="username" />
              <div class="w-full pb-2">
                <div class="flex justify-between">
                  <span class="block ml-2 font-semibold text-gray-600"><?php echo $cliente->nome ?></span>
                </div>
                <?php
                $id_cliente = $cliente->cod;
                $sql = "SELECT MAX(idchat) as MAX FROM chat WHERE clientes_cod_cliente  = $id_cliente";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while ($row = $result->fetch_assoc()) {
                    $max = $row["MAX"];
                  }
                }

                $sql2 = "SELECT mensagem FROM chat WHERE idchat = '$max' and clientes_cod_cliente  = $id_cliente";
                $result2 = $conn->query($sql2);
                if ($result2->num_rows > 0) {
                  while ($row2 = $result2->fetch_assoc()) {

                ?>
                    <span class="block ml-2 text-sm text-gray-600"><?php echo $row2["mensagem"] ?></span>
                <?php   }
                } ?>
              </div>
            </a>
          </li>
        <?php } ?>
      </ul>
    </div>
    <?php
        if (isset($_GET["id_cliente"])) {
          $cliente = $_GET["id_cliente"];
        ?>
    <div class="hidden lg:col-span-2 lg:block">
      <div class="w-full">
     
          <div class="relative flex items-center p-3 border-b border-gray-300">
            <img class="object-cover w-10 h-10 rounded-full" src="<?php if ($_SESSION["Clientes"][$cliente]->img == null) {
                                                                    echo 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTEn1obslNphDThy9T6_yi-ClXQbXlQeq6qlYhWTU0Pm8Pp6TAiJJbthriUTHueCFBeYFM&usqp=CAU';
                                                                  } else {
                                                                    echo $_SESSION["Clientes"][$cliente]->img;
                                                                  } ?>" alt="username" />
            <span class="block ml-2 font-bold text-gray-600"><?php echo $_SESSION["Clientes"][$cliente]->nome ?></span>
            </span>
          </div>
         <div class="relative w-full p-6 overflow-y-auto h-[40rem]">
          <ul class="space-y-2">
            <?php
            if (isset($_GET["id_cliente"])) {
              $sql3 = "SELECT * FROM chat  WHERE clientes_cod_cliente  = $cliente";
              $result3 = $conn->query($sql3);

              if ($result3->num_rows > 0) {
                // output data of each row
                while ($row3 = $result3->fetch_assoc()) {
            ?>

                  <?php if ($row3['PARA'] == "Funcionario") { ?>
                    <!-- CLIENTE -->
                    <li class="flex justify-start">
                      <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
                        <span class="block"><?php echo $row3["mensagem"] ?></span>
                      </div>
                    </li>
                  <?php } else { ?>

                    <!-- GESTOR -->
                    <li class="flex justify-end">
                      <div class="relative max-w-xl px-4 py-2 text-gray-700 bg-gray-100 rounded shadow">
                        <span class="block"><?php echo $row3["mensagem"] ?></span>
                      </div>
                    </li>
                  <?php } ?>
            <?php }
              }
            } ?>
          </ul>
        </div>

        <form action='' method="GET">
          <div class="flex items-center justify-between w-full p-3 border-t border-gray-300">

            <input type="text" value="<?php echo $cliente ?>" name="id_cliente" style="display: none;">
            <input type="text" placeholder="Message" class="block w-full py-2 pl-4 mx-3 bg-gray-100 rounded-full outline-none focus:text-gray-700" name="message" required />

            <button type="submit" name="enviar_f">
              <svg class="w-5 h-5 text-gray-500 origin-center transform rotate-90" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
              </svg>
            </button>
          </div>
        </form>
      </div>
      <?php } ?>
    </div>

  </div>
</div>