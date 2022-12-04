<?php
include_once("../conexao.php");

include_once("../top_bot/top.php");

//Classe empresa
include_once("./Classes/empresa.class.php");
include_once("./Classes/cliente.class.php");
include_once("./Classes/temas.class.php");


//Iniciando sesão
session_start();

// Incluindo navbar
include("./componentes/navbar.php");
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
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
<br>
<!-- Body Pagina -->
<div id='calendar'></div>

<div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalhes do Evento</h5>
                    <button type="button" class="close" data-bs- requireddismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <dl class="row">
                        <dt class="col-sm-3">ID do evento</dt>
                        <dd class="col-sm-9" id="id"></dd>

                        <dt class="col-sm-3">Título do evento</dt>
                        <dd class="col-sm-9" id="title"></dd>

                        <dt class="col-sm-3">Início do evento</dt>
                        <dd class="col-sm-9" id="start"></dd>

                    </dl>
                </div>
            </div>
        </div>
    </div>



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
                <form id="add_event" method="POST">
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="desc">Descrição Agendamento</label>

                        <input type="text" id="desc" class="form-control" required name="desc">
                    </div>

                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="dth">Data e Hora do Evento</label>

                        <input type="text" id="dth" class="form-control " name="dth" onkeypress="DataHora(event,this)">
                    </div>



                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="cidade">Cidade</label>

                        <input type="text" id="cidade" class="form-control" required name="cidade">
                    </div>

                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="Logadouro">Logadouro</label>
                        <input type="text" id="Logadouro" class="form-control" required name="logadouro">
                    </div>

                    <div class="md-form mb-5">
                        <label for="Func">Funcionario Responsavel</label>
                        <select name="Func_resp" class="form-control">
                            <?php
                            $sql = "SELECT * FROM funcionarios";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                            ?>

                                    <option value="<?php echo $row["cod_funcionario"] ?>"><?php echo $row["nome_funcionario"] ?></option>


                            <?php
                                }
                            }
                            ?>
                        </select>

                    </div>

                    <div class="md-form mb-5">
                        <label for="comentario">Comentario</label>
                        <textarea name="comentario" id="" cols="30" rows="3" class="form-control"></textarea>
                    </div>


                    <div class="md-form mb-5">
                        <label>Decorações</label>
                        <br>
                        <br>
                        <div id="accordion-collapse" data-accordion="collapse">
                            <?php include("./componentes/acordion.php") ?>
                        </div>

                    </div>



                    <input type="text" name="id_cliente" id="cliente" value="<?php echo $_SESSION["Login"]->cod ?> " style="display:none;">

                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-primary btn-event" type="submit" name="btnadd" id="btnadd">Enviar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- Modal -->

    
        <!-- Fim Body -->


        <?php include_once("../top_bot/bot.php") ?>