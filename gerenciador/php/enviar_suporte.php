<?php
    date_default_timezone_set('America/Sao_Paulo');

    include("../cn/config.php");
    include("verifica_login.php");
    include("funcoes.php");

    $departamento = $_POST['depar'];

    $cliente = $_POST['nome_empresa'];

    $data = date("Y-m-d H:i:s");

    $corpoEmail = "";
    foreach ($_POST as $key => $value) {
        $titulo = str_replace('_', ' ', $key);
        $texto = nl2br($value);
        $corpoEmail .= "<li>".ucfirst($titulo).": ".$texto."</li>";
    }

    extract($_POST);
    

    global $email; //transforma em variável global a variável e-mail
    //crio um email em html
    $to = $departamento;
    $subject = 'Ticket enviado pelo cliente:' + $cliente;
    $txt = "
    <html>
    <head>
      <title>Ticket enviado pelo cliente</title>
    </head>
    <body>
        <ul>
            $corpoEmail
        </ul>
    </body>
    </html>
    ";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $nome <$email>";
    $envia = mail($to,$subject,$txt,$headers);


?>