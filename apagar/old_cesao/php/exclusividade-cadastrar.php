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
    
    $empresaId = $_COOKIE['pegaId'];

    extract($_POST);

    $sql = "insert into exclusividade values ('', '$prazoFidelidade', '$excecoes', '$regras',  '$observacoes', '$ativo', '$empresaId')";

    $sqlEnvia = mysqli_query($con, $sql);

    if($sqlEnvia){

        include "mysqli-query.php";

        $return['mensagem'] = "Exclusividade cadastrada com sucesso";

    }else{

        $return['error'] = 1;
        $return['mensagem'] = "Ocorreu algum erro<br>Consulte a administração do sistema para resolver";
    }
    
}

$return["json"] = json_encode($return);
echo json_encode($return);

mysqli_close($con);
?>
