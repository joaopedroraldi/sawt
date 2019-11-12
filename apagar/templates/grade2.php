<style type="text/css">
#grade2{width: 100%; float: left;}
#grade2 h1{color: #fff; }
#grade2 h3{margin-top:10px; color:<?php echo $cor2 ?>;}
#grade2 .grade2{color: #777; text-align: justify; margin-bottom: 30px; float: left;}
</style>

<div class="clear"></div>
<section id="grade2">
    <div class="container">
        <div class="row">
            <?php while($row_registros = mysqli_fetch_assoc($registros)){ ?>
                <div class="col-md-3 col-sm-6" data-mh="mygroup">
                    <a href="<?php echo RAIZ.$row_paginas['paginas_url']."/".$row_registros['registros_url'] ?>" class="grade2">
                        <img src="<?php echo RAIZ."timthumb.php?src=".RAIZ_UP.$row_registros['registros_imagem'] ?>&zc=1&w=360&h=250" class="img-responsive img-rounded">
                        <h3><?php echo $row_registros['registros_titulo'] ?></h3>
                        <?php echo preg_replace('/(<[^>]+) style=".*?"/i', '$1', abreviaString($row_registros['registros_texto'], '140')); ?>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>