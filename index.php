<?php 
// header("Location: briefing");
session_start(); 
include('gerenciador/cn/config.php');
include('gerenciador/php/funcoes.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php 
    $query = "SELECT registros_url, registros_link FROM registros WHERE registros_idpg = 51";
    $configuracoesLayout = mysqli_query($config, $query) or die(mysqli_error());
    $arrConfig = array();
    while($row_configuracoesLayout = mysqli_fetch_assoc($configuracoesLayout)){
        $arrConfig[$row_configuracoesLayout['registros_url']] = $row_configuracoesLayout['registros_link'];
    }

    $query = "SELECT * FROM configuracoes";
    $configuracoes = mysqli_query($config, $query) or die(mysqli_error());
    $row_configuracoes = mysqli_fetch_assoc($configuracoes);

    $titulo = $row_configuracoes['configuracoes_titulo'];

    $query = "SELECT * FROM cores";
    $cores = mysqli_query($config, $query) or die(mysqli_error());
    $row_cores = mysqli_fetch_assoc($cores);
    $cor1 = $row_cores['cor_1'];
    $cor2 = $row_cores['cor_2'];
    $cor3 = $row_cores['cor_3'];

    if(isset($_GET['paginas_url'])){
        $paginas_url = $_GET['paginas_url'];
        $query = "SELECT * FROM paginas WHERE paginas_url = '$paginas_url'";
        $paginas = mysqli_query($config, $query) or die(mysqli_error());
        $row_paginas = mysqli_fetch_assoc($paginas);

        $titulo = $row_configuracoes['configuracoes_titulo'] . " | " . $row_paginas['paginas_titulo'];
        $metadescriptiontag = $row_paginas['paginas_metadescription'];


        $url = $_GET['paginas_url'];
        $url = explode('/', $url);


        if(isset($url[1])){

            $url = $url[1];
            $query = "SELECT categorias_titulo, categorias_metadescription FROM categorias WHERE categorias_url = '$url'";
            $metadescription = mysqli_query($config, $query) or die(mysqli_error());
            $row_metadescription = mysqli_fetch_assoc($metadescription);
            $rows_categoria = mysqli_num_rows($metadescription);

            if($rows_categoria > 0){

                if(isset($row_metadescription['categorias_metadescription'])){
                    $metadescriptiontag = $row_metadescription['categorias_metadescription'];
                }

                $titulo = $row_configuracoes['configuracoes_titulo'] . " | " . $row_metadescription['categorias_titulo'];
                $titulo2 = $row_metadescription['categorias_titulo'];
            }else{

                $query = "SELECT registros_titulo, registros_imagem, registros_metadescription FROM registros WHERE registros_url = '$url'";
                $metadescription = mysqli_query($config, $query) or die(mysqli_error());
                $row_metadescription = mysqli_fetch_assoc($metadescription);
                $metadescriptiontag = $row_metadescription['registros_metadescription'];
                $titulo = $row_configuracoes['configuracoes_titulo'] . " | " . $row_metadescription['registros_titulo'];
                $titulo2 = $row_metadescription['registros_titulo'];

                $name_img = str_replace(' ', '%20', $row_metadescription['registros_imagem']);

                echo "<meta property='og:image' content='http://{$_SERVER["SERVER_NAME"]}/gerenciador/uploads/{$name_img}'>";
            }

        }

    }else{

        $metadescriptiontag = $row_configuracoes['configuracoes_metadescription'];

    }

   
    ?>

        


    <meta property="og:locale" content="pt_BR">
    <meta property="og:title" content="<?php echo $titulo ?>">
    <meta property="og:description" content="<?php echo $metadescriptiontag; ?>">
    <meta property="og:url" content="<?php echo RAIZ; ?>">

    

    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="<?php echo $titulo ?>">


    <meta name="description" content="<?php echo $metadescriptiontag; ?>">
    <meta name="author" content="Web Thomaz">
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow" />

    <title><?php echo $titulo ?></title>

    <link rel="shortcut icon" href="<?=RAIZ;?>gerenciador/uploads/<?=$row_configuracoes['configuracoes_favicon'];?>" />

    <base href="<?php echo RAIZ ?>" />

    <!-- CSS -->
    <style type="text/css">
    <?php echo file_get_contents('css/bootstrap.min.css'); ?>
    <?php echo file_get_contents('css/font-awesome/css/font-awesome.min.css'); ?>
    <?php echo file_get_contents('css/light-gallery/lightgallery.min.css'); ?>
    <?php echo file_get_contents('css/lightslider.min.css'); ?>
    <?php echo file_get_contents('css/sweetalert.css'); ?>
    <?php echo file_get_contents('js/summernote/summernote.css'); ?>
    </style>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700,900&display=swap" rel="stylesheet">
    <?php include('css/style.php'); ?>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php echo $row_configuracoes['configuracoes_analytics']; ?>

    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript">
        <?php echo file_get_contents('js/jquery-2.1.3.min.js'); ?>
    </script>
</head>

<body>
    <?php include('header.php'); ?>
    <?php include('nav/paginas.php'); ?>
    <?php include('footer.php'); ?>
        
     <!--  Scripts-->
    <script type="text/javascript">
        <?php echo file_get_contents('js/bootstrap.min.js'); ?>
        <?php echo file_get_contents('js/jquery.matchHeight-min.js'); ?>
        <?php echo file_get_contents('js/lightslider.min.js'); ?>
        <?php echo file_get_contents('js/light-gallery/lightgallery.min.js'); ?>
        <?php echo file_get_contents('js/light-gallery/lg-zoom.min.js'); ?>
        <?php echo file_get_contents('js/jquery.mousewheel.min.js'); ?>
        <?php echo file_get_contents('js/sweetalert.min.js'); ?>
        <?php echo file_get_contents('js/parallax.min.js'); ?>
        <?php echo file_get_contents('js/summernote/summernote.js'); ?>
        <?php echo file_get_contents('js/jquery.mask.min.js'); ?>
        <?php echo file_get_contents('js/scripts.js'); ?>
    </script>
</body>

</html>
