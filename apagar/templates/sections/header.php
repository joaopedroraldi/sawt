<style type="text/css">
#header h3{font-size: 14px; color: <?php echo $cor1 ?>; font-weight: bold; text-transform: uppercase;}
#header .menu li{list-style: none; display: inline-block;}
#header .menu li:first-child a{padding-left: 0}
#header .menu li a{padding: 20px 20px; color: #444; float: left; font-weight: bold; text-transform: uppercase;}
#header .menu li a:hover{color: <?php echo $cor1 ?>}
#header .menu{margin-top: 30px; width: 100%; float: left; padding-left: 0; border-top: solid 1px #eee; margin-bottom: 0}
#header .logo{margin-top:60px; float: left;}
.navbar{margin-bottom: 0}

.info-topo{font-size: 12px; color: #777; display: inline-block; vertical-align: top; margin:0 50px 0 15px;}
</style>
<header id="header" class="hidden-xs hidden-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <a href="<?php echo RAIZ ?>" class="logo">
                    <img src="<?php echo RAIZ ?>gerenciador/uploads/<?php echo $row_configuracoes['configuracoes_logo'] ?>" class="img-responsive">
                </a>
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <?php 
                    $query = "SELECT * FROM registros WHERE registros_idpg = 21 ORDER BY registros_ordem ASC";
                    $registros = mysqli_query($config, $query) or die(mysqli_error());
                    ?>
                    <?php while($row_registros = mysqli_fetch_assoc($registros)){ ?>
                    <div class="info-topo">
                        <h3><?php echo $row_registros['registros_titulo'] ?></h3>
                        <?php echo $row_registros['registros_texto'] ?>
                    </div>
                    <?php } ?>
                </div>
                <?php 
                $query = "SELECT paginas_id, paginas_titulo, paginas_url FROM paginas WHERE paginas_menu = 1 ORDER BY paginas_ordem_menu ASC";
                $paginas = mysqli_query($config, $query) or die(mysqli_error());
                ?>
                <ul class="menu">
                    <?php include('templates/func/menu.php') ?>
                </ul>
            </div>
        </div>
    </div>
</header> 
<?php include('header2-mobile.php'); ?>
