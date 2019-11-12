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


    if($senha == $senha2){
        
        $verificaEmail = mysqli_query($con, "select COUNT(email) as email from usuario where email = '$email'");

        $totalEmail = mysqli_fetch_object($verificaEmail);

        if($totalEmail->email == 0){
            
            if($_FILES['foto']['name'] !== ''){
    
                // Pasta onde o arquivo vai ser salvo
                $_UP['pasta'] = '../img/avatar/';
                // Tamanho mрximo do arquivo (em Bytes)
                $_UP['tamanho'] = 20971520; // 20Mb
                // Array com as extensшes permitidas
                $_UP['extensoes'] = array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF');
                // Renomeia o arquivo? (Se true, o arquivo serр salvo como .jpg e um nome Щnico)
                $_UP['renomeia'] = true;
                // Array com os tipos de erros de upload do PHP
                $_UP['erros'][0] = 'Não houve erro';
                $_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
                $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
                $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
                $_UP['erros'][4] = 'Não foi feito o upload do arquivo';
                // Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
                if($_FILES['foto']['error'] !== 0) {
                     $return['error'] = 1;
                     $return['mensagem'] = "Não foi possível fazer o upload<br />Erro: ". $_UP['erros'][$_FILES['foto']['error']];
                }else{
                    // Caso script chegue a esse ponto, nсo houve erro com o upload e o PHP pode continuar
                    // Faz a verificaусo da extensсo do arquivo
                    $foto = $_FILES['foto']['name'];
                    $extensao = explode('.', $foto);
                    $extensao = end($extensao);
                    if(array_search($extensao, $_UP['extensoes']) === false) {
                        $return['error'] = 1;
                        $return['mensagem'] = "Por favor, envie arquivos com a seguinte extensções: .png , .jpg ou .gif";
                    }
                    // Faz a verificaусo do tamanho do arquivo
                    elseif ($_UP['tamanho'] < $_FILES['foto']['size']) {
                        $return['error'] = 1;
                        $return['mensagem'] = "O arquivo enviado é muito grande, envie arquivos de até 20Mb.";
                    }
                    // O arquivo passou em todas as verificaушes, hora de tentar movЖ-lo para a pasta
                    else{
                        // Primeiro verifica se deve trocar o nome do arquivo
                        if($_UP['renomeia'] == true) {
                            // Cria um nome baseado no UNIX TIMESTAMP atual e com extensсo .jpg
                            $nome_final = time().'.'.$extensao;
                        }else{
                            // Mantжm o nome original do arquivo
                            $nome_final = $_FILES['foto']['name'];
                        }
                        // Depois verifica se é possível mover o arquivo para a pasta escolhida
                        if(move_uploaded_file($_FILES['foto']['tmp_name'], $_UP['pasta'] . $nome_final)) {



                            //Não é código de file
                            $salt = substr(md5(uniqid(rand(), true)), 0, 9);

                            $password = sha1($salt . sha1($salt . sha1($senha)));

                            $sql = "insert into usuario values ('', '$nome', '$sobrenome', $sexo, '$cpf', '$rg', '$telefone', '$email', '$password', '$salt', '$data', '$ativo', '$nome_final')";

                            $sqlEnvia = mysqli_query($con, $sql);

                            if($sqlEnvia){

                                include "mysqli-query.php";

                                $return['mensagem'] = "Usuário cadastrado com sucesso";

                            }else{

                                $return['error'] = 1;
                                $return['mensagem'] = "Ocorreu algum erro<br>Consulte a administração do sistema para resolver";
                            }




                        }else{
                            // Nсo foi possьvel fazer o upload, provavelmente a pasta estр incorreta
                            $return['error'] = 1;
                            $return['mensagem'] = "Não foi possível fazer o upload, provavelmente a pasta está incorreta";
                        }
                    }
                }
                
            }else{

                //Não é código de file
                $salt = substr(md5(uniqid(rand(), true)), 0, 9);

                $password = sha1($salt . sha1($salt . sha1($senha)));

                $sql = "insert into usuario values ('', '$nome', '$sobrenome', $sexo, '$cpf', '$rg', '$telefone', '$email', '$password', '$salt', '$data', '$ativo', 'avatar.png')";

                $sqlEnvia = mysqli_query($con, $sql);

                if($sqlEnvia){

                    include "mysqli-query.php";

                    $return['mensagem'] = "Usuário cadastrado com sucesso";

                }else{

                    $return['error'] = 1;
                    $return['mensagem'] = "Ocorreu algum erro<br>Consulte a administração do sistema para resolver";
                    
                }

            }
            
    
        }else{

            $return['error'] = 1;
            $return['mensagem'] = "Este E-mail já está cadastrado<br>Tente outro";

        }
        
    }else{

        $return['error'] = 1;
        $return['mensagem'] = "As senha não são iguais";

    }

    
}

echo json_encode($return);

mysqli_close($con);
?>