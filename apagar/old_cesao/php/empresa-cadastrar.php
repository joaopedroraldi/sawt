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

    $verificaExiste = mysqli_query($con, "select COUNT(Id) as total from cliente_empresa where cnpj = '$cnpj'");

    $totalExiste = mysqli_fetch_object($verificaExiste);

    if($totalExiste->total == 0){

        $sql = "insert into cliente_empresa values ('', '$nomeFantasia', '$razaoSocial', '$cnpj',  '$inscricaoEstadual', '$emailContato', '$emailCobranca', '$telefone', '$cep', '$cidade', '$bairro', '$rua', '$numero', '$complemento', '$segmento', '$data', '$ativo', '$porte_da_empresa_Id', '$responsavelId')";

        $sqlEnvia = mysqli_query($con, $sql);

        if($sqlEnvia){

            include "mysqli-query.php";

            $return['mensagem'] = "Empresa cadastrada com sucesso";

        }else{

            $return['error'] = 1;
            $return['mensagem'] = "Ocorreu algum erro<br>Consulte a administração do sistema para resolver";
        }

    }else{

        $return['error'] = 1;
        $return['mensagem'] = "Esta empresa já está cadastrada!";

    }
    
}

$return["json"] = json_encode($return);
echo json_encode($return);

mysqli_close($con);
?>