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

    $verificaExiste = mysqli_query($con, "select COUNT(Id) as Id from cliente_empresa where Id = '$empresaId'");

    $totalExiste = mysqli_fetch_object($verificaExiste);

    if($totalExiste->Id == 1){

        $verificaCNPJ = mysqli_query($con, "select COUNT(Id) as total from cliente_empresa where cnpj = '$cnpj' and Id != '$empresaId'");

        $totalCNPJ = mysqli_fetch_object($verificaCNPJ);

        if($totalCNPJ->total == 0){

            $sql = "update cliente_empresa set nomeFantasia = '$nomeFantasia', razaoSocial = '$razaoSocial', cnpj = '$cnpj',  inscricaoEstadual = '$inscricaoEstadual', emailContato = '$emailContato', emailCobranca = '$emailCobranca', telefone = '$telefone', cep = '$cep', cidade = '$cidade', bairro = '$bairro', rua = '$rua', numero = '$numero', complemento = '$complemento', segmento = '$segmento', ativo = '$ativo', porte_da_empresa_Id = '$porte_da_empresa_Id', cliente_responsavel_Id = '$cliente_responsavel_Id' where Id = '$empresaId'";

            $sqlEnvia = mysqli_query($con, $sql);

            if($sqlEnvia){

                include "mysqli-query.php";

                $return['mensagem'] = "Empresa alterada com sucesso";

            }else{

                $return['error'] = 1;
                $return['mensagem'] = "Ocorreu algum erro<br>Consulte a administração do sistema para resolver";

            }

        }else{
            
            $return['error'] = 1;
            $return['mensagem'] = "Este CNPJ já está cadastrado<br>Tente outro";

        }

    }else{

        $return['error'] = 1;
        $return['mensagem'] = "Esta empresa não existe";

    }
    
}

$return["json"] = json_encode($return);
echo json_encode($return);

mysqli_close($con);
?>