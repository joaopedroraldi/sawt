<?php

session_start();

if($_SESSION["admin"] == 0){
    $return['error'] = 1;
    $return['mensagem'] = "Faça login para poder usar o sistema";
}else{
    
    $empresaId = strip_tags(trim(utf8_decode($_COOKIE['pegaId']))); 

    include "connect.php";

    date_default_timezone_set('America/Sao_Paulo');

    $return['error'] = 0;

    $data = date("Y-m-d H:i:s");
    
    $return['data'] = "?data=".date("Y-m-d")."&hora=".date("H:i:s");

    extract($_POST);
    /*
    $return['mensagem'] = "Dados do formulário<br>";
    foreach ($_POST as $key => $value) {
        $return['mensagem'] .= $key.": ".nl2br($value)."<br>";
    }
    */
    
    $valorTotal = str_replace('.', '', $valorTotal);
    $valorTotal = str_replace(',', '.', $valorTotal);
    
    $valorEntrada = str_replace('.', '', $valorEntrada);
    $valorEntrada = str_replace(',', '.', $valorEntrada);
    
    $valorPrimeira = str_replace('.', '', $valorPrimeira);
    $valorPrimeira = str_replace(',', '.', $valorPrimeira);
    
    $valorParcelas = str_replace('.', '', $valorParcelas);
    $valorParcelas = str_replace(',', '.', $valorParcelas);

    $sql = "insert into contrato values ('', '$valorTotal', '$parcelas', '$valorEntrada',  '$valorPrimeira', '$valorParcelas', '$diaVencimento', '$forma_pagamento_Id', '$data', '$empresaId')";

    $sqlEnvia = mysqli_query($con, $sql);

    if($sqlEnvia){

        include "mysqli-query.php";
        
        $contrato = mysqli_query($con, "select MAX(Id) as Id from contrato");
        
        $contratoSql = mysqli_fetch_object($contrato);
        $contratoId = $contratoSql->Id;
        
        $contrato_servicos = "insert into contrato_servicos ";
        $contrato_anexos = "insert into contrato_anexos ";
        $coluna = "( ";
        $valor = "( ";
        $anexo = "( ";
        
        foreach ($_SESSION['servicos'] as $key => $value) {
            $servico = explode("-" , $key);
            $servico = $servico[0];
            if($servico == "hospedagem"){ 
                $coluna .= $servico.", ";
                $valor .= $value.", "; 
                $anexo .= "'".$hospedagem."', "; 
            }
            if($servico == "pagina"){ 
                $coluna .= $servico.", ";
                $valor .= $value.", "; 
                $anexo .= "'".$pagina."', "; 
            }
            if($servico == "dominio"){ 
                $coluna .= $servico.", ";
                $valor .= $value.", "; 
                $anexo .= "'".$dominio."', "; 
            }
            if($servico == "manutencao"){ 
                $coluna .= $servico.", ";
                $valor .= $value.", "; 
                $anexo .= "'".$manutencao."', "; 
            }
            if($servico == "criacao_de_logo"){ 
                $coluna .= $servico.", ";
                $valor .= $value.", "; 
                $anexo .= "'".$criacao_de_logo."', "; 
            }
            if($servico == "design"){ 
                $coluna .= $servico.", ";
                $valor .= $value.", "; 
                $anexo .= "'".$design."', "; 
            }
            if($servico == "facebook"){ 
                $coluna .= $servico.", ";
                $valor .= $value.", "; 
                $anexo .= "'".$facebook."', "; 
            }
            if($servico == "email_marketing"){ 
                $coluna .= $servico.", ";
                $valor .= $value.", "; 
                $anexo .= "'".$email_marketing."', "; 
            }
        }
        
        $coluna .= " contrato_Id ) "; 
        
        $valor .= " $contratoId ) ";
        $sql = $contrato_servicos." ".$coluna." values ".$valor;
        $sqlEnvia = mysqli_query($con, $sql);
        include "mysqli-query.php";
        
        $anexo .= " $contratoId ) ";
        $sql = $contrato_anexos." ".$coluna." values ".$anexo;
        $sqlEnvia = mysqli_query($con, $sql);
        include "mysqli-query.php";
        
        $sql = "insert into direitos_deveres values ('', $contratoId, '$contratante', '$contratada')";
        $sqlEnvia = mysqli_query($con, $sql);
        include "mysqli-query.php";

        $return['mensagem'] = "Contrato gerado com sucesso";

    }else{

        $return['error'] = 1;
        $return['mensagem'] = "Ocorreu algum erro<br>Consulte a administração do sistema para resolver";
        
    }

    
}

$return["json"] = json_encode($return);
echo json_encode($return);

mysqli_close($con);
?>