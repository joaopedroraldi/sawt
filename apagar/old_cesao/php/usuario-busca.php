<?php

include "connect.php";

date_default_timezone_set('America/Sao_Paulo');

$return['error'] = 0;

extract($_POST);

if($ativo == 2){
    $usuarios = mysqli_query($con , "select Id, nome, sobrenome from usuario");
}else{
    $usuarios = mysqli_query($con , "select Id, nome, sobrenome from usuario where ativo = '$ativo'");
}

$quarda = "<option value=0>Selecione um usuário</option>";

while($usuariosRow = mysqli_fetch_object($usuarios)){
    $quarda .= "<option value=".$usuariosRow->Id.">".$usuariosRow->nome." ".$usuariosRow->sobrenome."</option>";
}
$return['mensagem'] = mysql_escape_string($quarda);

$return["json"] = json_encode($return);
echo json_encode($return);

mysqli_close($con);
?>