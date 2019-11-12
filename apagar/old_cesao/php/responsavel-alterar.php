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

    $responsavelId = $_COOKIE['pegaId'];

    extract($_POST);

    $verificaExiste = mysqli_query($con, "select COUNT(Id) as Id from cliente_responsavel where Id = '$responsavelId'");

    $totalExiste = mysqli_fetch_object($verificaExiste);

    if($totalExiste->Id == 1){

        $verificaCPF = mysqli_query($con, "select COUNT(Id) as total from cliente_responsavel where cpf = '$cpf' and Id != '$responsavelId'");

        $totalCPF = mysqli_fetch_object($verificaCPF);

        if($totalCPF->total == 0){
            
            $verificaRG = mysqli_query($con, "select COUNT(Id) as total from cliente_responsavel where rg = '$rg' and Id != '$responsavelId'");

            $totalRG = mysqli_fetch_object($verificaRG);

            if($totalRG->total == 0){

                $sql = "update cliente_responsavel set nome = '$nome', sobrenome = '$sobrenome', cpf = '$cpf', rg = '$rg', email = '$email', telefone = '$telefone', telefone2 = '$telefone2', cep = '$cep', numero = '$numero', complemento = '$complemento', ativo = '$ativo' where Id = '$responsavelId'";

                $sqlEnvia = mysqli_query($con, $sql);

                if($sqlEnvia){

                    include "mysqli-query.php";

                    $return['mensagem'] = "Responsável alterado com sucesso";

                }else{

                    $return['error'] = 1;
                    $return['mensagem'] = "Ocorreu algum erro<br>Consulte a administração do sistema para resolver";
                    
                }
                
            }else{
                
                $return['error'] = 1;
                $return['mensagem'] = "Este RG já está cadastrado<br>Tente outro";
                
            }

        }else{
            
            $return['error'] = 1;
            $return['mensagem'] = "Este CPF já está cadastrado<br>Tente outro";

        }

    }else{

        $return['error'] = 1;
        $return['mensagem'] = "Este usuário não existe";

    }
    
}

$return["json"] = json_encode($return);
echo json_encode($return);

mysqli_close($con);
?>