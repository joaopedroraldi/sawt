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
    
    $return['mensagem'] = '';
    
    if(isset($hospedagem)){
        $sql = "insert into hospedagem values ('', '$hospedagemPacote', '$hospedagemObservacao', '$data', '$empresaId')";
        $sqlEnvia = mysqli_query($con, $sql);
        if($sqlEnvia){
            include "mysqli-query.php";
            $return['mensagem'] .= "Hospedagem Web Thomaz cadastrada com sucesso <br>";
        }else{
            $return['error'] = 1;
            $return['mensagem'] .= "Ocorreu um erro no cadastro da Hospedagem Web Thomaz <br>";
        }
    }
    
    if(isset($pagina)){
        if(isset($paginaLayout)){
            $paginaLayout = 1;
        }else{
            $paginaLayout = 0;
        }
        if(isset($paginaFront)){
            $paginaFront = 1;
        }else{
            $paginaFront = 0;
        }
        if(isset($paginaBack)){
            $paginaBack = 1;
        }else{
            $paginaBack = 0;
        }
        
        $sql = "insert into pagina values ('', '$paginaLayout', '$paginaFront', '$paginaBack', '$paginaManutencao', '$paginaDireitos', '$paginaObservacao', '$data', '$empresaId')";
        $sqlEnvia = mysqli_query($con, $sql);
        if($sqlEnvia){
            include "mysqli-query.php";
            $return['mensagem'] .= "Criação de página cadastrada com sucesso <br>";
        }else{
            $return['error'] = 1;
            $return['mensagem'] .= "Ocorreu um erro no cadastro da Criação de página <br>";
        }
    }
    
    if(isset($dominio)){
        $sql = "insert into dominio values ('', '$dominioResponsabilidade', '$dominioDireitos', '$dominioObservacao', '$data', '$empresaId')";
        $sqlEnvia = mysqli_query($con, $sql);
        if($sqlEnvia){
            include "mysqli-query.php";
            $return['mensagem'] .= "Registro de domínio cadastrada com sucesso <br>";
        }else{
            $return['error'] = 1;
            $return['mensagem'] .= "Ocorreu um erro no cadastro da Registro de domínio <br>";
        }
    }
    
    if(isset($manutencao)){
        $sql = "insert into manutencao values ('', '$manutencaoManutencao', '$manutencaoObservacao', '$data', '$empresaId')";
        $sqlEnvia = mysqli_query($con, $sql);
        if($sqlEnvia){
            include "mysqli-query.php";
            $return['mensagem'] .= "Manutenção de terceiros cadastrada com sucesso <br>";
        }else{
            $return['error'] = 1;
            $return['mensagem'] .= "Ocorreu um erro no cadastro da Manutenção de terceiros <br>";
        }
    }
    
    if($return['mensagem'] == ''){
        $return['mensagem'] = 'Selecione ao menos um serviço';
    }
    
}

$return["json"] = json_encode($return);
echo json_encode($return);

mysqli_close($con);
?>