<style type="text/css">

#header{color: #777; padding-bottom: 30px}
#header i{color: <?php echo $cor2 ?>; margin-right: 5px;}
#header .menu li{list-style: none; display: inline-block;}
#header .menu li a{padding: 20px 20px; color: #777; float: left; font-size: 14px; font-weight: bold; text-transform: uppercase;}
#header .menu{width: 100%; float: left; margin-top: 10px}
#header .menu li a:hover{color: <?php echo $cor1?>}
.info-topo{font-size: 14px; padding: 20px 0; float: left; margin-right:40px;}

.navbar{margin-bottom: 0}
</style>
<header id="header" class="hidden-xs hidden-sm">
    <div class="container">
        <?php 
        $query = "SELECT * FROM registros WHERE registros_idpg = 21 ORDER BY registros_ordem ASC";
        $registros = mysqli_query($config, $query) or die(mysqli_error());
        ?>
        <?php while($row_registros = mysqli_fetch_assoc($registros)){ ?>
        <div class="info-topo">
            <?php echo $row_registros['registros_texto'] ?>
        </div>
        <?php } ?>
        <?php 
        $query = "SELECT * FROM registros WHERE registros_idpg = 24 ORDER BY registros_ordem ASC";
        $registros = mysqli_query($config, $query) or die(mysqli_error());
        $row_registros = mysqli_fetch_assoc($registros);
        $num_rows = mysqli_num_rows($registros);
        if($num_rows > 0){
        ?>
        <div class="info-topo" style="float:right; margin-right:0">
            <?php do{ ?>
                <a href="<?php echo $row_registros['registros_link'] ?>" target="_blank"><?php echo $row_registros['registros_texto'] ?></a>
            <?php }while($row_registros = mysqli_fetch_assoc($registros)); ?>
        </div>
        <?php } ?>
        <div class="clear"></div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <div class="clear20"></div>
                <a href="<?php echo RAIZ ?>">
                    <img src="<?php echo RAIZ ?>gerenciador/uploads/<?php echo $row_configuracoes['configuracoes_logo'] ?>" class="img-responsive">
                </a>
            </div>
            <div class="col-sm-9">
                <?php 
                $query = "SELECT paginas_id, paginas_titulo, paginas_url FROM paginas WHERE paginas_menu = 1 ORDER BY paginas_ordem_menu ASC";
                $paginas = mysqli_query($config, $query) or die(mysqli_error());
                ?>
                <ul class="menu">
                    <?php include('templates/func/menu.php'); ?>
                </ul>
            </div>
        </div>
    </div>
</header> 
<?php include('header2-mobile.php'); ?>
