<?php 

session_start();

include_once "php/connect.php";

date_default_timezone_set('America/Sao_Paulo');

$admin = 0;
if(isset($_SESSION["admin"])){ $admin = $_SESSION["admin"];
}else{ $_SESSION['admin'] = $admin; }

if($admin == 0){
    header("Location: login.php");
}

$menu = 'home';
if(isset($_GET['menu'])){ $menu = strip_tags(trim(utf8_decode($_GET['menu']))); }

$submenu = 'home';
if(isset($_GET['submenu'])){ $submenu = strip_tags(trim(utf8_decode($_GET['submenu']))); }

$chat = 0;

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
    
    <title>S.A.W.T.
        <?php if($submenu !== 'home'){ echo $submenu; }else{ echo $menu; } ?>
    </title>

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- android lollipop --> 
    <link rel="icon" type="image/png" sizes="192x192" href="img/192px.jpg">
    <!-- iPhone -->
    <link rel="apple-touch-icon" type="image/png" sizes="144x144" href="144px.png">

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="dist/css/timeline.css" rel="stylesheet">

    <!-- Social Buttons CSS -->
    <link href="bower_components/bootstrap-social/bootstrap-social.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->
    <link href="css/estilo.css" rel="stylesheet" type="text/css">

    <!-- formvalidation -->
    <link rel="stylesheet" href="css/formValidation.min.css">

    <!-- DataTable -->
    <?php
    //if($menu == "example-tables" or $submenu == "usuario-tabela" or $submenu == "responsavel-tabela" or $submenu == "empresa-tabela"){
    if (strpos($submenu, 'tabela')){
        ?>
        <link rel="stylesheet" href="bower_components/datatables/media/css/dataTables.bootstrap.css">
        <link rel="stylesheet" href="bower_components/datatables/media/css/dataTables.colVis.css">
        <link rel="stylesheet" href="bower_components/datatables/media/css/dataTables.colReorder.css">
        <link rel="stylesheet" href="bower_components/datatables/media/css/dataTables.tableTools.css">
        <link rel="stylesheet" href="bower_components/datatables/media/css/dataTables.responsive.css">
        <?php
    }
    ?>
    
    <!-- Masonrye height grid responsive -->
    <link href="css/masonry.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <!-- navbar-top-links -->
            <?php include "pages/partes/topo.php"; ?>
            <!-- /.navbar-top-links -->
            <?php include "pages/partes/navigation.php"; ?>
        </nav>
        <!-- /#Navigation -->

        <!-- page-wrapper -->
        <div id="page-wrapper">


        <?php 
        //inclui migalhas de pão
        //include "/pages/partes/breadcrumb.php"; 
        ?>
            <br>

        <?php
        //inclui conteudo da página
        if($submenu !== 'home'){
            $page = "pages/".$submenu.".php";
            if(file_exists($page)){
                include $page;
            }else{
                ?>
                <img class="error404" src="img/Error404.png">
                <?php
            }
        }else{
            $page = "pages/".$menu.".php";
            if(file_exists($page)){
                include $page;
            }else{
                ?>
                <img class="error404" src="img/Error404.png">
                <?php
            }
        }
        ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

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
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    
    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>
    
    <!-- Number format -->
    <script src="js/jquery.number.min.js"></script>

    <!-- formvalidation -->
    <script src="js/formValidation.min.js"></script>
    <script src="js/formValidationBootstrap.min.js"></script>

    <!-- Include Mask plugin -->
    <script src="js/jquery.mask.min.js"></script>

    <!-- Include Jquery cookie -->
    <script src="js/jquery.cookie.js"></script>
    
    <script src="js/bootstrap-filestyle.min.js"></script>
    <script>
        $(":file").filestyle({placeholder: "Vazio"});
    </script>

    <!-- Morris Charts JavaScript -->
    <?php
    if($menu == "home" or $menu == "morris" or $submenu == "morris"){
        ?>
        <script src="bower_components/raphael/raphael-min.js"></script>
        <script src="bower_components/morrisjs/morris.min.js"></script>
        <script src="js/morris-data.js"></script>
        <?php
    }
    ?>

    <!-- Flot Charts JavaScript -->
    <?php
    if($menu == "example-flot" or $submenu == "example-flot"){
        ?>
        <script src="bower_components/flot/excanvas.min.js"></script>
        <script src="bower_components/flot/jquery.flot.js"></script>
        <script src="bower_components/flot/jquery.flot.pie.js"></script>
        <script src="bower_components/flot/jquery.flot.resize.js"></script>
        <script src="bower_components/flot/jquery.flot.time.js"></script>
        <script src="bower_components/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
        <script src="js/flot-data.js"></script>
        <?php
    }
    ?>

    <!-- DataTables JavaScript -->
    <?php
    //if($menu == "example-tables" or $submenu == "usuario-tabela" or $submenu == "responsavel-tabela" or $submenu == "empresa-tabela"){
    if (strpos($submenu, 'tabela')){
        ?>
        <script src="bower_components/datatables/media/js/jquery.dataTables.js"></script>
        <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
        <script src="bower_components/datatables/media/js/dataTables.colVis.js"></script>
        <script src="bower_components/datatables/media/js/dataTables.colReorder.js"></script>
        <script src="bower_components/datatables/media/js/dataTables.tableTools.js"></script>
        <script src="bower_components/datatables/media/js/dataTables.responsive.js"></script>
        <script src="bower_components/datatables/media/js/dataTabe.funcoes.js"></script>
        <?php
    }
    ?>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <!-- DataTables JavaScript -->
    
    <?php
    if($menu == "example-masonry" or $submenu == "servicos-relatorio"){
        ?>
        <!-- Masonry height grid responsive 
        <script src="js/masonry.pkgd.min.js"></script>-->
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/masonry.scripts.js"></script>
        <?php
    }
    ?>

    <!-- Page-Level Demo Scripts - Notifications - Use for reference -->
    <?php
    if($menu == "notifications" or $submenu == "notifications"){
        ?>
        <script>
            // tooltip demo
            $('.tooltip-demo').tooltip({
                selector: "[data-toggle=tooltip]",
                container: "body"
            })
            // popover demo
            $("[data-toggle=popover]").popover()
        </script>
        <?php
    }
    ?>

    <!-- Meu ajax -->
    <script src="js/ajax.js"></script>
    
    <?php
    if($chat == 1){
        ?>
        <script src="js/chat.cesar.js"></script>
        <?php
    }
    ?>

</body>

</html>
<?php
mysqli_close($con);
?>