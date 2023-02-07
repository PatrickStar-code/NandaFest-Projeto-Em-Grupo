<br>
<div class="container mx-aut">
    <div class="min-w-full border rounded lg:grid lg:grid-cols-3">
    </div>
    <div class="relative w-full p-6 overflow-y-auto h-[40rem]">
        <ul class="space-y-2" id="msg-box">

                        <!-- DIV GESTOR
                        <li class="flex justify-start">
                            <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
                                <span class="block"><?php echo $row["mensagem"] ?></span>
                            </div>
                        </li> -->
     
        </ul>
    </div>
    <form action="" method="post" id="chat">
        <div class="flex items-center justify-between w-full p-3 border-t border-gray-300">

            <input type="text" placeholder="Message" id="text" class="block w-full py-2 pl-4 mx-3 bg-gray-100 rounded-full outline-none focus:text-gray-700" name="message" required />

            <button type="submit" name="msg">
                <svg class="w-5 h-5 text-gray-500 origin-center transform rotate-90" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                </svg>
            </button>
    </form>
</div>

<!-- Adicionando AJAX -->

<script>
    $(document).ready(function(){
        $("#chat").submit(function (e) { 
            e.preventDefault();
            $.post("../../Controller/chatCliente.php", {text: $("#text").val()},
                function () {
                    $("#text").val("")
                }
            );

        });
    });
    var ultimaMensagem = 0;

    setInterval(() => {
        $.post("../../Controller/verMensagemCliente.php", {last_id: ultimaMensagem},
            function (data) {
                var dados = JSON.parse(data);
                dados.forEach(mensagem => {
                    ultimaMensagem = mensagem[0];
                    if(mensagem[2]=="Funcionario"){

                        $("#msg-box").append(`<li class="flex justify-end">
                            <div class="relative max-w-xl px-4 py-2 text-gray-700 bg-gray-100 rounded shadow">
                            <span class="block">${mensagem[1]}</span>
                            </div>
                        </li>`)
                    }
                    else{
                        $("#msg-box").append( `<li class="flex justify-start">
                            <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
                                <span class="block">${mensagem[1]}</span>
                            </div>
                        </li>`)
                    }
                    
                })
            }
        );
    }, 1000);
</script>
