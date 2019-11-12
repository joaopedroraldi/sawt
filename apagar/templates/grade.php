<style type="text/css">
#grade{width: 100%; float: left;}
#grade h1{color: #fff; }
#grade h3{margin-top:10px; color:<?php echo $cor2 ?>;}
#grade .grade{color: #777; text-align: justify; margin-bottom: 30px;}
</style>

<div class="clear"></div>
<section id="grade">
    <div class="container">
        <div class="row">
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