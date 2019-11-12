<style type="text/css">
/*PRODUTOS*/
.grid-item{
	padding: 15px;
	border: solid 1px #eee;
	margin-bottom: 30px;
	min-height: 350px;
}
.grid-item h3{font-size: 14px; font-weight: bold; color: #222}

.grid-item:hover{
	outline: 8px solid #ddd;
}
</style>
<div class="clear40"></div>
<div class="container">
	<div class="row">
	<?php while($row_registros = mysqli_fetch_assoc($registros)){ ?>
		<div class="col-sm-3" data-mh="my-group">
			<a href="<?php echo RAIZ . $row_paginas['paginas_url'] ?>/<?php echo $row_registros['registros_url'] ?>">
				<div class="grid-item">
					<img src="<?php echo RAIZ ?>timthumb.php?src=<?php echo RAIZ_ADMIN ?>uploads/<?php echo $row_registros['registros_imagem'] ?>&zc=1&w=262&h=250" class="img-responsive">
					<h3><?php echo $row_registros['registros_titulo'] ?></h3>
				</div>
			</a>
		</div>
	<?php } ?>
	</div>
</div>