<?php

session_start();

include "connect.php";

date_default_timezone_set('America/Sao_Paulo');


$usuario_Id = $_SESSION["admin"];

$server = $_SERVER['SERVER_NAME'];
$urlPrincipal = "http://".$server."/sawt/";

$return['mensagem'] = '';

$sql = mysqli_query($con, "select c.mensagem, c.data, u.Id, u.nome, u.foto from chat c, usuario u where c.usuario_Id = u.Id order by data desc LIMIT 50");
while($row = mysqli_fetch_object($sql)){
    
    $dia = date("d/m/y", strtotime($row->data));
    $hora = date("H:i:s", strtotime($row->data));
    
    if($row->Id == $usuario_Id){
        
        $return['mensagem'] .= "
            <li class='right clearfix'>
                <span class='chat-img pull-right'>
                    <img src='php/timthumb.php?src=".$urlPrincipal."img/avatar/".utf8_encode($row->foto)."&w=50&h=50&zc=2' class='img-circle img-avatar'/>
                </span>
                <div class='chat-body clearfix'>
                    <div class='header'>
                        <small class='text-muted'>
                            <i class='fa fa-calendar fa-fw'></i>".$dia." <i class='fa fa-clock-o fa-fw'></i>".$hora."
                        </small>
                        <strong class='pull-right primary-font'>".$row->nome."</strong>
                    </div>
                    <p class='text-right'>
                        ".$row->mensagem."
                    </p>
                </div>
            </li>
        ";
        
    }else{
        
        $return['mensagem'] .= "
            <li class='left clearfix'>
                <span class='chat-img pull-left'>
                    <img src='php/timthumb.php?src=".$urlPrincipal."img/avatar/".utf8_encode($row->foto)."&w=50&h=50&zc=2' class='img-circle img-avatar'/>
                </span>
                <div class='chat-body clearfix'>
                    <div class='header'>
                        <strong class='primary-font'>".$row->nome."</strong>
                        <small class='pull-right text-muted'>
                            <i class='fa fa-calendar fa-fw'></i>".$dia." <i class='fa fa-clock-o fa-fw'></i>".$hora."
                        </small>
                    </div>
                    <p>
                        ".$row->mensagem."
                    </p>
                </div>
            </li>
        ";
        
    }
    
}

echo json_encode($return);

mysqli_close($con);
?>