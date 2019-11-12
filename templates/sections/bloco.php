<style type="text/css">
	<?php echo $idcss ?>{}
</style>

<?php 
$query = "SELECT * FROM registros WHERE registros_idpg = $template_idpg ORDER BY registros_ordem ASC LIMIT 1";
$registros = mysqli_query($config, $query) or die(mysqli_error());
$row_registros = mysqli_fetch_assoc($registros);
?>
<div class="clear"></div>
<section id="<?php echo $idCss ?>">
	<div class="container">
		<h1><?php echo $row_templates['templates_home_titulo'] ?></h1>
		<div class="row">
			<?php if(!empty($row_registros['registros_imagem'])){ ?>
			<div class="col-sm-6">
				<?php echo $row_registros['registros_texto'] ?>
			</div>
			<div class="col-sm-6">
				<img src="<?php echo RAIZ_UP.$row_registros['registros_imagem'] ?>" class="img-responsive">
			</div>
			<?php }else{ ?>
			<div class="col-sm-12">
				<?php echo $row_registros['registros_texto'] ?>
			</div>
			<?php } ?>
		</div>
	</div>
</section>
<div class="clear"></div>