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
    
    $usuario_Id = $_SESSION["admin"];
    
    extract($_POST);
    
    $chatMensagem = str_replace("<script>", "Erou!", $chatMensagem);
    $chatMensagem = str_replace("</script>", "Erou!", $chatMensagem);
            
    $sql = "insert into chat values ('', '$chatMensagem', $usuario_Id, '$data')";

    $sqlEnvia = mysqli_query($con, $sql);

    if($sqlEnvia){

        include "mysqli-query.php";
        
        $dia = date("d/m/y");
        $hora = date("H:i:s");
        
        $server = $_SERVER['SERVER_NAME'];
        $urlPrincipal = "http://".$server."/sawt/";
        
        $sql = mysqli_query($con, "select u.nome, u.foto from usuario u where u.Id = $usuario_Id");
        $row = mysqli_fetch_object($sql);

        $return['mensagem'] = "
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
                        ".$chatMensagem."
                    </p>
                </div>
            </li>
        ";

    }else{

        $return['error'] = 1;
        
        $return['mensagem'] = "Ocorreu algum erro<br>Consulte a administração do sistema para resolver";
        
    }

}

echo json_encode($return);

mysqli_close($con);
?>