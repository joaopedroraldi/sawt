<?php
if($_SERVER["HTTPS"] != "on")
{
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}
if ((strpos($_SERVER['HTTP_HOST'], 'www.') === false))
{
    header('Location: https://www.'.$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

include('cn/config.php');
session_start();
if(isset($_SESSION['login_username'])){
    $check = $_SESSION['login_username'];
    $session = mysqli_query($config, "SELECT id_usuario, nome, usuario, admin FROM usuarios WHERE usuario='$check'");
    $row = mysqli_fetch_array($session);
    $login_session = $row['usuario'];
    $login_id = $row['id_usuario'];
    $admin = $row['admin'];
    $nome_login = $row['nome'];
    if(!isset($login_session))
    {
    header("Location:login.php");
    }
}else{
    header("Location:login.php");
}


//PAGINAÇÕES
$limite = 50; // Limite por página

// Pega página atual, se houver e for válido (maior que zero!)
if( isset( $_GET['pagina'] ) && (int)$_GET['pagina'] >= 0){
    $pagina = (int)$_GET['pagina'];
}else{
    $pagina = 0;
}

// Calcula o offset
$offset = $limite * $pagina;

// Se for 0 será 15*0 que será 0, começando do inicio
// Se for 1 será 15*1 que irá começar do 15 ignorando os 15 anteriores. ;)


$query = "SELECT * FROM configuracoes";
$configuracoes = mysqli_query($config, $query) or die(mysqli_error());
$row_configuracoes = mysqli_fetch_assoc($configuracoes);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="robots" content="noindex,nofollow">
    <meta name="googlebot" content="noindex,nofollow">


    <title><?php echo $row_configuracoes['configuracoes_titulo'] ?></title>



    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">


    <!-- Junior CSS -->
    <link href="fonts/stylesheet.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css">
        <?php echo file_get_contents('css/style.php'); ?>
    </style>
    <!-- Custom Fonts -->

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="<?php echo RAIZ; ?>img/favicon.ico" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery

    <script src="js/jquery-1.11.3.min.js"></script>
-->
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
</head>



<body>

    <?php include('header.php'); ?>



    <div class="navegacao hidden-xs">

        <?php include('navegacao.php'); ?>

    </div>



    <div class="body">

        <?php

        $pastaPadrao = 'nav';
        foreach(glob("$pastaPadrao/*.php") as $file)
            $files[]=str_replace("$pastaPadrao/",'',str_replace('.php','',$file));
        if(isset($_GET['page']) && in_array($_GET['page'],$files)) {
            include("$pastaPadrao/{$_GET['page']}.php");
        } else {
            include("$pastaPadrao/home.php");
        }
        ?>

    </div>



    <script type="text/javascript">
        <?php echo file_get_contents('js/sweetalert.min.js'); ?>
        <?php echo file_get_contents('js/bootstrap.min.js'); ?>
        <?php echo file_get_contents('js/jquery.mask.min.js'); ?>
        <?php echo file_get_contents('js/jquery-ui.js'); ?>
        <?php echo file_get_contents('js/scripts.js'); ?>
    </script>
    <div class="load">
        <span>Aguarde... <div class="clear10"></div>
        <img src="<?php echo RAIZ_ADMIN ?>img/load.gif">
        </span>
    </div>

</body>
</html>
