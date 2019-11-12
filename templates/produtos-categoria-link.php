<style type="text/css">
.categoria-pai{border-color:<?php echo $row_cores['cor_1'] ?>; background: <?php echo $row_cores['cor_1'] ?>; color: #fff !important; }
.categoria-pai:hover{background: <?php echo $row_cores['cor_2'] ?> !important; color: #fff;}
.grid-item{background: #fff; border:solid 1px #eee; margin-bottom: 30px;}
.grid-item h3{font-size: 14px; color: #444; margin: 10px 0; font-weight: bold; }
.grid-item .text{padding: 15px; text-align: left;}
</style>
<div class="container">
	<div class="clear10"></div>
	<?php include('templates/func/buscador.php'); ?>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<div class="list-group">
				<?php 
				$query = "SELECT categorias_id, categorias_titulo, categorias_url FROM categorias WHERE categorias_idpg = $paginas_id and categorias_pai = 0";
				$categorias = mysqli_query($config, $query) or die(mysqli_error());
			    while($row_categorias = mysqli_fetch_assoc($categorias)){
				?>
					<a class="list-group-item categoria-pai" href="<?php echo RAIZ.$url[0]."/".$row_categorias['categorias_url'] ?>"><?php echo $row_categorias['categorias_titulo'] ?></a>
					<?php 
					$catpai = $row_categorias['categorias_id'];
					$query = "SELECT categorias_titulo, categorias_url FROM categorias WHERE categorias_idpg = $paginas_id and categorias_pai = $catpai";
					$subcategorias = mysqli_query($config, $query) or die(mysqli_error());
				    while($row_subcategorias = mysqli_fetch_assoc($subcategorias)){
					?>
					<a class="list-group-item subcategoria" href="<?php echo RAIZ.$url[0]."/".$row_subcategorias['categorias_url'] ?>"> - <?php echo $row_subcategorias['categorias_titulo'] ?></a>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
		<div class="col-sm-9">
			<div class="row">
				<?php while($row_registros = mysqli_fetch_assoc($registros)){ ?>
					<div class="col-lg-4 col-md-6 col-xs-6 text-center">
						<a href="<?php echo RAIZ . $row_paginas['paginas_url'] ?>/<?php echo $row_registros['registros_url'] ?>">
							<div class="grid-item transition">
								<img src="<?php echo RAIZ ?>timthumb.php?src=<?php echo RAIZ_ADMIN ?>uploads/<?php echo $row_registros['registros_imagem'] ?>&zc=1&w=323&h=300" class="img-responsive transition" >
								<div class="text">
									<h3><?php echo $row_registros['registros_titulo'] ?></h3>
								</div>
							</div>
						</a>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

