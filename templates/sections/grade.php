<style type="text/css">
<?php echo $idcss ?>{width: 100%; float: left; background: <?php echo $row_cores['cor_2'] ?>; }
<?php echo $idcss ?> h1{color: #fff; }
<?php echo $idcss ?> h3{margin-top:10px; color: #fff;}
<?php echo $idcss ?> .grade{color: #ddd; margin-bottom: 30px;}
</style>

<div class="clear"></div>
<section id="<?php echo $idCss ?>">
    <center>
        <h1><?php echo $row_templates['templates_home_titulo'] ?></h1>
    </center>
    <div class="clear40"></div>
    <div class="container">
        <div class="row">
            <?php 
            $query = "SELECT * FROM registros WHERE registros_idpg = $template_idpg ORDER BY registros_ordem ASC";
            $registros = mysqli_query($config, $query) or die(mysqli_error());
            ?>
            <?php while($row_registros = mysqli_fetch_assoc($registros)){ ?>
                <div class="col-md-4 col-sm-6" data-mh="mygroup">
                    <div class="grade">
                        <img src="<?php echo RAIZ."timthumb.php?src=".RAIZ_UP.$row_registros['registros_imagem'] ?>&zc=1&w=360&h=250" class="img-responsive img-rounded">
                        <h3><?php echo $row_registros['registros_titulo'] ?></h3>
                        <?php echo $row_registros['registros_texto'] ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

</section>