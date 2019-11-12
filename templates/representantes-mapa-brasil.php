<div class="clear40"></div>
<section class="container">
    <div class="row">
        <?php while($row_registros = mysqli_fetch_assoc($registros)){ ?>
        <div class="col-sm-6">
        	<h2><?php echo $row_registros['registros_titulo'] ?></h2>
            <?php echo $row_registros['registros_texto'] ?>
        </div>
        <div class="col-sm-6">
        	<div style="width: 100%; float: left; min-height:600px; background: url(img/bg-mapa.png) center center no-repeat; background-size:100%; text-align: center;">
	            <img src="<?php echo RAIZ ?>timthumb.php?src=<?php echo RAIZ_ADMIN ?>uploads/<?php echo $row_configuracoes['configuracoes_logo'] ?>&zc=2&w=150&h=150" class="img-responsive" style="display:inline-block; margin-top:40%; margin-left:50px;">
        	</div>
        </div>
        <?php } ?>
    </div>
</section>
