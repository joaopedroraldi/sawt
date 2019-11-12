<?php
session_start();
include('cn/config.php');
$query_configuracoes = "SELECT * FROM usuarios";
$configuracoes = mysqli_query($config, $query_configuracoes);
$row_configuracoes = mysqli_fetch_assoc($configuracoes);
?>
<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Painel Administrativo</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Junior CSS -->
    <link href="css/style.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>



<body style="background:url(img/bg2.jpg) center center;">
    <div class="container">
        <div class="clear60"></div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center">
                <img src="img/logo-white.png" alt="Admin"> <br /><br />
                <form class="form-login" role="form" id="form-login" method="post" action="php/login.php" enctype="multipart/form-data">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="Usuario" name="usuario" id="usuario" type="text" autofocus required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Senha" name="senha" id="senha" type="password" value="" required>
                        </div>
                        <!-- Change this to a button or input when using this as a form -->
                        <button class="btn btn-lg btn-primary btn-block" type="submit" data-loading-text="Carregando..." autocomplete="off">Entrar</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="js/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>