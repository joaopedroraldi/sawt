<style type="text/css">
<?php echo $idcss ?>{width: 100%; float: left; }
<?php echo $idcss ?> h1{color: <?php echo $cor1 ?>; }
<?php echo $idcss ?> h3{margin:15px 0; color:<?php echo $cor1 ?>; font-weight: bold; font-size: 16px;}
<?php echo $idcss ?> .grade2{color: #777; margin-bottom: 30px; padding: 15px; border:solid 1px #eee; float: left; font-size: 12px;}
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
            $query = "SELECT * FROM registros WHERE registros_idpg = $template_idpg ORDER BY registros_ordem ASC LIMIT 8";
            $registros = mysqli_query($config, $query) or die(mysqli_error());
            ?>
            <?php while($row_registros = mysqli_fetch_assoc($registros)){ ?>
                <div class="col-lg-3 col-md-4 col-sm-6" data-mh="mygroup">
                    <a href="<?php echo RAIZ.$row_templates['paginas_url']."/".$row_registros['registros_url'] ?>" class="grade2">
                        <img src="<?php echo RAIZ."timthumb.php?src=".RAIZ_UP.$row_registros['registros_imagem'] ?>&zc=1&w=360&h=250" class="img-responsive img-rounded">
                        <h3><?php echo $row_registros['registros_titulo'] ?></h3>
                        <?php echo preg_replace('/(<[^>]+) style=".*?"/i', '$1', abreviaString($row_registros['registros_texto'], '140')); ?>
                    </a>
                </div>
            <?php } ?>
        </div>
        <div class="clear40"></div>
        <a class="btn btn-padrao transition" href="<?php echo RAIZ.$row_templates['paginas_url'] ?>">Ver todos</a>
    </div>
</section>