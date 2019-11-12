<?php

session_start();

$admin = 0;
if(isset($_SESSION["admin"])){ $admin = $_SESSION["admin"];
}else{ $_SESSION['admin'] = $admin; }

if($admin !== 0){
    header("Location: admin.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Web Thomas | Soluções criativas">
    <meta name="author" content="Cesar Bellon">
    <!-- android lollipop -->
    <meta name="theme-color" content="#A094E7">
    
    <title>S.A.W.T.</title>

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- android lollipop --> 
    <link rel="icon" sizes="192x192" href="img/192px.jpg">
    <!-- iPhone -->
    <link rel="apple-touch-icon" type="image/png" sizes="144x144" href="144px.png">
    
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- Custom Fonts -->
    <link href="css/estilo.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div id="background">
<div id="texture">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading text-center">
                        <img src="img/sawt-branco.svg" alt="Admin Web Thomaz"> <br /><br />
                        <h3 class="panel-title">Preencha os campos abaixo</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-signin" role="form" id="login-admin" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="inputEmail" id="inputEmail" type="email" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Senha" name="inputPassword" id="inputPassword" type="password" value="" required>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-primary btn-block" type="submit" data-loading-text="Carregando..." autocomplete="off"><span class="glyphicon glyphicon-log-in fa-fw"></span>  Entrar</button>
                                <a href="http://webthomaz.com.br/" class="btn btn-block btn-info btn-sm" role="button"><span class="glyphicon glyphicon-arrow-left fa-fw"></span> Voltar para o site</a>          
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade myModal ">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Mensagem</h4>
          </div>
          <div class="modal-body">
            <p class="recebeTexto">Recebe mensagem</p>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Meu ajax -->
    <script src="js/ajax.js"></script>
</div>
</div>
</body>

</html>
