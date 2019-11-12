<div class="clear40"></div>
<div class="container">
	<?php while($row_registros = mysqli_fetch_assoc($registros)){ ?>
		<div class="row">
			<?php if(!empty($row_registros['registros_imagem'])){ ?>
				<div class="col-sm-8">
					<h3><?php echo $row_registros['registros_titulo'] ?></h3>
					<?php echo $row_registros['registros_texto'] ?>
				</div>
				<div class="col-sm-4">
					<img src="<?php echo RAIZ_ADMIN ?>uploads/<?php echo $row_registros['registros_imagem'] ?>" class="img-responsive">
				</div>
			<?php }else{ ?>
				<div class="col-sm-12">
					<h3><?php echo $row_registros['registros_titulo'] ?></h3>
					<?php echo $row_registros['registros_texto'] ?>
				</div>
			<?php } ?>
		</div>
	<?php } ?>
</div>
<div class="clear40"></div>