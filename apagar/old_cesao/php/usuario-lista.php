<?php

session_start();

include "connect.php";

date_default_timezone_set('America/Sao_Paulo');

$return['error'] = 0;

extract($_POST);

if($usuarioId == 0){
    $return['mensagem'] = "Selecione um usuario";
    $_SESSION['usuarioId'] = 0;
}else{
    $usuarios = mysqli_query($con , "select * from usuario where Id = '$usuarioId'");

    $usuariosRow = mysqli_fetch_object($usuarios);
    $return["nome"] = $usuariosRow->nome ;
    $return["sobrenome"] = $usuariosRow->sobrenome ;
    $return["telefone"] = $usuariosRow->telefone ;
    $return["email"] = $usuariosRow->email ;
    $return["ativo"] = $usuariosRow->ativo ;
    $_SESSION['usuarioId'] = $usuariosRow->Id;
}

$return["json"] = json_encode($return);
echo json_encode($return);

mysqli_close($con);
?>