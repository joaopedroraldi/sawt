<style type="text/css">
.navbar{margin-bottom: 0}

#header{color: #777; background: #fff}
#header h3{font-size: 14px; color: #444; font-weight: bold; text-transform: uppercase;}
#header li{list-style: none; display: inline-block;}
#header li a{padding: 20px 30px; color: #fff; float: left; font-size: 14px; font-weight: bold; text-transform: uppercase;}
#header ul{width: 100%; float: left; text-align: center; background: <?php echo $row_cores['cor_1'] ?>;}

</style>
<header id="header" class="hidden-xs hidden-sm">
    <?php 
    $query = "SELECT paginas_id, paginas_titulo, paginas_url FROM paginas WHERE paginas_menu = 1 ORDER BY paginas_ordem_menu ASC";
    $paginas = mysqli_query($config, $query) or die(mysqli_error());
    ?>
    <ul class="menu">
        <?php include('templates/func/menu.php'); ?>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 text-right">
                <div class="clear40"></div>
                <?php 
                $query = "SELECT * FROM registros WHERE registros_idpg = 21 ORDER BY registros_ordem ASC LIMIT 0,1";
                $registros = mysqli_query($config, $query) or die(mysqli_error());
                ?>
                <?php while($row_registros = mysqli_fetch_assoc($registros)){ ?>
                    <?php echo $row_registros['registros_texto'] ?>
                <?php } ?>
            </div>
            <div class="col-sm-4 text-center">
                <div class="clear40"></div>
                <a href="<?php echo RAIZ ?>">
                    <img src="<?php echo RAIZ ?>gerenciador/uploads/<?php echo $row_configuracoes['configuracoes_logo'] ?>" class="img-responsive" style="display:inline-block">
                </a>
            </div>
            <div class="col-sm-4">
                <div class="clear40"></div>
                <?php 
                $query = "SELECT * FROM registros WHERE registros_idpg = 21 ORDER BY registros_ordem ASC LIMIT 1,3";
                $registros = mysqli_query($config, $query) or die(mysqli_error());
                ?>
                <?php while($row_registros = mysqli_fetch_assoc($registros)){ ?>
                    <?php echo $row_registros['registros_texto'] ?>
                    <div class="clear10"></div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="clear20"></div>
</header> 

<?php include('header2-mobile.php'); ?>
