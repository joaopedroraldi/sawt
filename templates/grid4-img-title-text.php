<div class="clear40"></div>
<div class="container">
	<div class="row">
	<?php while($row_registros = mysqli_fetch_assoc($registros)){ ?>
		<div class="col-sm-3" data-mh="my-group">
			<div class="grid-item">
				<img src="<?php echo RAIZ ?>timthumb.php?src=<?php echo RAIZ_ADMIN ?>uploads/<?php echo $row_registros['registros_imagem'] ?>&zc=1&w=250&h=250" class="img-responsive img-circle">
				<h3><?php echo $row_registros['registros_titulo'] ?></h3>
				<?php echo $row_registros['registros_texto'] ?>
			</div>
		</div>
	<?php } ?>
	</div>
</div>

<div class="clear40"></div>