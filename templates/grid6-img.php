<section class="container">
    <div class="row">
        <?php while($row_registros = mysqli_fetch_assoc($registros)){ ?>
        <div class="col-sm-2" data-mh="my-group">
        	<div class="clientes">
	            <img src="<?php echo RAIZ ?>timthumb.php?src=<?php echo RAIZ_ADMIN ?>uploads/<?php echo $row_registros['registros_imagem'] ?>&zc=2&w=285&h=150" class="img-responsive">
        	</div>
        </div>
        <?php } ?>
    </div>
</section>

<style type="text/css">
	.clientes{padding:20px; margin-bottom: 30px; border: solid 1px #eee }
</style>