<style type="text/css">
	.item-home{text-transform: uppercase;}
</style>
<h1>Dashboard</h1>

<ol class="breadcrumb">
  <li><a href="<?php echo RAIZ_ADMIN ?>">Home</a></li>
  <li><a href="<?php echo RAIZ_ADMIN ?>">Dashboard</a></li>
</ol>

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

	<?php if($admin == 1) { ?>
	<!-- usuarios -->
	<div class="col-md-3 col-sm-6 home-item">
		<a href="?page=usuarios">
			<div class="item-home transition">
				<i class="fa fa-user"></i>
				<h3>Usuarios</h3>
			</div>
		</a>
	</div>
	<!-- usuarios -->
	<?php } ?>
</div>
