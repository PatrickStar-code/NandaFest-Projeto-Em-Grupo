<?php 

    include_once("../conexao.php");

    session_start();
    
    //Recebendo dados EM UM ARRAY COMO STRING
    $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);

    //Convertendo a data e hora padrao brasileiro para padrao do banco
    $data_start = str_replace('/','-',$dados['dth']);
    $data_start_con = date("Y-m-d H:i:s",strtotime($data_start));


    $descricao = $dados["desc"];
    $data = $data_start_con;
    $cidade = $dados["cidade"];
    $logadouro = $dados["logadouro"];
    $coment = $dados["comentario"];
    $id_cliente = $dados["id_cliente"];
    $func = $dados["Func_resp"];

    $sql = "INSERT INTO agendamentos (descricao_pedido,dthr_pedido, cidade_pedido,logradouro_pedido,status_pedido,comentario_pedido,valor_pedido,clientes_cod_cliente,funcionarios_cod_funcionario)
    VALUES ('$descricao', '$data','$cidade','$logadouro','Pendente','$coment','0','$id_cliente','$func')";

        if ($conn->query($sql) === TRUE) {
            $cad = true;
            $last_id = mysqli_insert_id($conn);
            foreach($dados["dec"] as $item){
                $sql2 = "INSERT INTO dec_agendamento (agendamentos_cod_pedidos, decoracoes_cod_decoracoes)
                VALUES ('$last_id', '$item')";

                if ($conn->query($sql2) === TRUE) {
                    $cad = true;
                }else {
                    $cad = false;
                }

            } 
        } else {
            $cad = false;
        }

    $cad = true;

    //Situação /msg
    //Se cadastrar com sucesso
    if($cad){
    $retorna=['sit' => true,'msg'=>'<!-- Success -->
    <div class="px-8 py-6 bg-green-400 text-white flex justify-between rounded">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-6" viewBox="0 0 20 20" fill="currentColor">
                <path
                    d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"
                />
            </svg>
            <p>Successo! Agendamento realizado! '. $dados['desc'].'</p>
        </div>
       
    </div>'];
    $_SESSION['msg'] ='<div class="px-8 py-6 bg-green-400 text-white flex justify-between rounded">
    <div class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-6" viewBox="0 0 20 20" fill="currentColor">
            <path
                d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"
            />
        </svg>
        <p>Successo! Agendamento realizado! '. $data_start_con .'</p>
    </div>
   
</div>';
    }
    //Se não foi cadastrado 
    else{
        $retorna=['sit' => true,'msg'=>'<!-- Danger -->
        <div class="px-8 py-6 bg-red-400 text-white flex justify-between rounded">
            <div class="flex items-center">
           <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-6" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
        </svg>
                <p>Ocorreu algum erro!</p>
            </div>
            
        </div>'];
    }

    header('Content-Type: application/json');
    //Retornando array como json
    echo json_encode($retorna)
?>