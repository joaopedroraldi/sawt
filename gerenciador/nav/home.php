<style type="text/css">
	.item-home{text-transform: uppercase;}
	.ferramentas{display: inline-block; margin-right: 40px; margin-bottom: 20px; padding: 10px; border-radius: 5px; }
	.ferramentas img{filter:grayscale(100%); opacity: 0.6}
	.ferramentas:hover img{filter:grayscale(0%); opacity: 1}
</style>
<div class="row">
	<?php 
	$query = "SELECT paginas_id, paginas_titulo FROM paginas WHERE paginas_menu_admin = 1 and paginas_carousel = 0 and paginas_layout = 0 ORDER BY paginas_ordem_menu ASC";
	$paginas = mysqli_query($config, $query) or die(mysqli_error());
	while($row_paginas = mysqli_fetch_assoc($paginas)){
	?>
	<div class="col-md-3 col-sm-6 home-item">
		<a href="?page=registros&id=<?php echo $row_paginas['paginas_id'] ?>">
			<div class="item-home transition">
				<i class="fa fa-file-text-o" aria-hidden="true"></i>
				<h3><?php echo $row_paginas['paginas_titulo'] ?></h3>
			</div>
		</a>
		<div class="clear30"></div>
	</div>
	<?php } ?>


	<?php if($admin == 2) { ?>
	<!-- usuarios -->
	<div class="col-md-3 col-sm-6 home-item">
		<a href="?page=usuarios">
			<div class="item-home transition">
				<i class="fa fa-user"></i>
				<h3>Usuários</h3>
			</div>
		</a>
	</div>
	<!-- usuarios -->
	<?php } ?>
</div>

<div class="clear40"></div>
<hr>
<div class="clear10"></div>
<?php 
	$query = "SELECT registros_imagem, registros_link FROM registros WHERE registros_idpg = 58";
	$ferramentas = mysqli_query($config, $query) or die(mysqli_error());
	while($row_ferramentas = mysqli_fetch_assoc($ferramentas)){
	?>
	
	<div class="ferramentas">
		<a href="<?php echo $row_ferramentas['registros_link'] ?>" target="_blank">
			<img src="<?php echo RAIZ_ADMIN ?>timthumb.php?src=<?php echo RAIZ_UP.$row_ferramentas['registros_imagem'] ?>&zc=2&w=150&h=50" class="img-responsive">
		</a>
	</div>
	
<?php } ?>

