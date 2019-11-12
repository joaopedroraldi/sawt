<style type="text/css">
    .logo-mobile{height:30px; margin-top: 8px;}
    .navbar-default{background-color: #fff; padding:8px 10px; border: none;}
    .navbar-default li a{text-transform: uppercase; font-weight: 700}
    .navbar-default li:hover a{color: <?php echo $row_cores['cor_1'] ?>;}
    
    #header2{display: none; position: fixed; background-color: #fff; top:0; left: 0; width: 100%; z-index: 999;}
    #header2 .menu{float: right;}
    @media(max-width: 767px){
        .logo-mobile{height:30px; margin-top: 0px;}
        .navbar-default .navbar-toggle{margin: 0}
        #header2 .menu{float: none; margin-top: 10px;}
    }

    #header-mobile .menu{margin-top: 10px; float: none; }
    #header-mobile .logo{max-width: 230px;}
</style>

<div id="header2">
    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="<?php echo RAIZ ?>">
                    <img src="<?php echo RAIZ_UP. $row_configuracoes['configuracoes_logo'] ?>" class="img-responsive logo-mobile">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse menu" id="bs-example-navbar-collapse-2">
                <?php 
                $query = "SELECT paginas_id, paginas_titulo, paginas_url FROM paginas WHERE paginas_menu = 1 ORDER BY paginas_ordem_menu ASC";
                $paginas = mysqli_query($config, $query) or die(mysqli_error());
                ?>
                <ul class="nav navbar-nav">
                    <?php include('templates/func/menu.php'); ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
</div>  

<div id="header-mobile" class="visible-xs visible-sm">
    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="<?php echo RAIZ ?>">
                    <img src="<?php echo RAIZ_UP . $row_configuracoes['configuracoes_logo'] ?>" class="img-responsive logo-mobile">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse menu" id="bs-example-navbar-collapse-1">
                <?php 
                $query = "SELECT paginas_id, paginas_titulo, paginas_url FROM paginas WHERE paginas_menu = 1 ORDER BY paginas_ordem_menu ASC";
                $paginas = mysqli_query($config, $query) or die(mysqli_error());
                ?>
                <ul class="nav navbar-nav">
                    <?php include('templates/func/menu.php'); ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
</div>  
<div class="clear"></div>