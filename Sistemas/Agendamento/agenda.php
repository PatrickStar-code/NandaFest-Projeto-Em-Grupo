<?php 
include_once("../top_bot/top.php");
    session_start();
?>


<!-- Links FullCalendar -->
<link href='css_Fullcalendar/core/main.min.css' rel='stylesheet' />
<link href='css_Fullcalendar/daygrid/main.min.css' rel='stylesheet' />
<script src='js_Fullcalendar/core/main.min.js'></script>
<script src='js_Fullcalendar/interaction/main.min.js'></script>
<script src='js_Fullcalendar/daygrid/main.min.js'></script>
<script src='js_Fullcalendar/core/locales/pt-br.js'></script>
<script src="./Script_Agenda.js"></script>
<link rel="stylesheet" href="./Style_Agenda.css">

<?php 
if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>

<!-- Body Pagina -->
<div id='calendar'></div>




<!-- Modal -->
<div class="modal fade" id="cadastrar_pedido" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Agendamento</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <span id="msg"></span>
                <form  id="add_event" method="POST">
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="desc">Descrição Agendamento</label>

                        <input type="text" id="desc" class="form-control" name="desc">
                    </div>

                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="dth">Data e Hora do Evento</label>

                        <input type="text" id="dth" class="form-control " name="dth" onkeypress="DataHora(event,this)">
                    </div>

                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="cidade">Cidade</label>

                        <input type="text" id="cidade" class="form-control" name="cidade">
                    </div>

                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="Logadouro">Logadouro</label>
                        <input type="text" id="Logadouro" class="form-control" name="logadouro">
                    </div>


                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="tema">Tema do Evento</label>
                        <input type="text" id="tema" class="form-control" name="tema">
                    </div>

                   

                    <div class="md-form mb-5">
                        <label for="dec"><input type="checkbox" class="form-control" name="dec" id="dec<id_dec>"value="<id_dec>" >Nome_dec</label>
                        
                    </div>

                    <input type="number" id="cont" name="cont" style="display: none;">

                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-primary btn-event type="submit" name="btnadd" id="btnadd">Enviar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- Modal -->
    <!-- Fim Body -->


    <?php include_once("../top_bot/bot.php") ?>