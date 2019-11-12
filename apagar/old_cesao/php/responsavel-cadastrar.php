<?php

session_start();

if($_SESSION["admin"] == 0){
    $return['error'] = 1;
    $return['mensagem'] = "Faça login para poder usar o sistema";
}else{

    include "connect.php";

    date_default_timezone_set('America/Sao_Paulo');

    $return['error'] = 0;

    $data = date("Y-m-d H:i:s");

    extract($_POST);

    $verificaExiste = mysqli_query($con, "select COUNT(Id) as total from cliente_responsavel where cpf = '$cpf' or rg = '$rg'");

    $totalExiste = mysqli_fetch_object($verificaExiste);

    if($totalExiste->total == 0){


        $sql = "insert into cliente_responsavel values ('', '$nome', '$sobrenome', '$cpf',  '$rg', '$email', '$telefone', '$telefone2', '$cep', '$numero', '$complemento', '$data', '$ativo')";

        $sqlEnvia = mysqli_query($con, $sql);

        if($sqlEnvia){

            include "mysqli-query.php";

            $return['mensagem'] = "Responsável cadastrado com sucesso";

        }else{

            $return['error'] = 1;
            $return['mensagem'] = "Ocorreu algum erro<br>Consulte a administração do sistema para resolver";
        }

    }else{

        $return['error'] = 1;
        $return['mensagem'] = "Este responsável já está cadastrado!";

    }
    
}

$return["json"] = json_encode($return);
echo json_encode($return);

mysqli_close($con);
?>