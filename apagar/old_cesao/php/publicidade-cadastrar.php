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
    
    if(isset($criacao_de_logo)){
        $sql = "insert into criacao_de_logo values ('', '$criacao_de_logoObservacao', '$data', '$empresaId')";
        $sqlEnvia = mysqli_query($con, $sql);
        if($sqlEnvia){
            include "mysqli-query.php";
            $return['mensagem'] .= "Criação de logo cadastrada com sucesso <br>";
        }else{
            $return['error'] = 1;
            $return['mensagem'] .= "Ocorreu um erro no cadastro da Criação de logo <br>";
        }
    }
    
    if(isset($design)){
        if(isset($designCatalogo)){
            $designCatalogo = 1;
        }else{
            $designCatalogo = 0;
        }
        if(isset($designCartao)){
            $designCartao = 1;
        }else{
            $designCartao = 0;
        }
        if(isset($designBanner)){
            $designBanner = 1;
        }else{
            $designBanner = 0;
        }
        if(isset($designOutdoor)){
            $designOutdoor = 1;
        }else{
            $designOutdoor = 0;
        }
        if(isset($designMidiakit)){
            $designMidiakit = 1;
        }else{
            $designMidiakit = 0;
        }
        if(isset($designPapelaria)){
            $designPapelaria = 1;
        }else{
            $designPapelaria = 0;
        }
        if(isset($designAssinaturaEmail)){
            $designAssinaturaEmail = 1;
        }else{
            $designAssinaturaEmail = 0;
        }
        
        $sql = "insert into design values ('', '$designCatalogo', '$designCartao', '$designBanner', '$designOutdoor', '$designMidiakit', '$designPapelaria', '$designAssinaturaEmail', '$designObservacao', '$data', '$empresaId')";
        $sqlEnvia = mysqli_query($con, $sql);
        if($sqlEnvia){
            include "mysqli-query.php";
            $return['mensagem'] .= "Design cadastrada com sucesso <br>";
        }else{
            $return['error'] = 1;
            $return['mensagem'] .= "Ocorreu um erro no cadastro da Design <br>";
        }
    }
    
    if(isset($email_marketing)){
        if(isset($email_marketingRedacao)){
            $email_marketingRedacao = 1;
        }else{
            $email_marketingRedacao = 0;
        }
        if(isset($email_marketingDesign)){
            $email_marketingDesign = 1;
        }else{
            $email_marketingDesign = 0;
        }
        if(isset($email_marketingDisparo)){
            $email_marketingDisparo = 1;
        }else{
            $email_marketingDisparo = 0;
        }
        if(isset($email_marketingRelatorio)){
            $email_marketingRelatorio = 1;
        }else{
            $email_marketingRelatorio = 0;
        }
        if(isset($email_marketingBancoEmails)){
            $email_marketingBancoEmails = 1;
        }else{
            $email_marketingBancoEmails = 0;
        }
        
        $sql = "insert into email_marketing values ('', '$email_marketingRedacao', '$email_marketingDesign', '$email_marketingDisparo', '$email_marketingRelatorio', '$email_marketingBancoEmails', '$email_marketingObservacao', '$data', '$empresaId')";
        $sqlEnvia = mysqli_query($con, $sql);
        if($sqlEnvia){
            include "mysqli-query.php";
            $return['mensagem'] .= "E-Mail Marketing cadastrada com sucesso <br>";
        }else{
            $return['error'] = 1;
            $return['mensagem'] .= "Ocorreu um erro no cadastro da E-Mail Marketing <br>";
        }
    }
    
    if(isset($facebook)){
        if(isset($facebookRedacao)){
            $facebookRedacao = 1;
        }else{
            $facebookRedacao = 0;
        }
        
        $sql = "insert into facebook values ('', '$facebookRedacao', '$facebookImagens', '$facebookImpulsionamento', '$facebookFrequenciaQuantidade', '$facebookfrequenciaDiasSenama', '$facebookObservacao', '$data', '$empresaId')";
        $sqlEnvia = mysqli_query($con, $sql);
        if($sqlEnvia){
            include "mysqli-query.php";
            $return['mensagem'] .= "Facebook cadastrada com sucesso <br>";
        }else{
            $return['error'] = 1;
            $return['mensagem'] .= "Ocorreu um erro no cadastro da Facebook <br>";
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