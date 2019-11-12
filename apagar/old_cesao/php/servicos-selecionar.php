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
    
    $retorno = "Serviços selecionados <br>";
    
    $total = 0;
    foreach ($_POST as $key => $value) {
        $retorno .= $key.": ".$value."<br>";
        $total++;
    }
    if($total > 0){
        
        $return['mensagem'] = $retorno;
        
        $_SESSION['servicos'] = $_POST;
        
    }else{
        
        $return['error'] = 1;
        
        $return['mensagem'] = "Selecione ao menos um serviço";
    }
    
}

$return["json"] = json_encode($return);
echo json_encode($return);

mysqli_close($con);
?>