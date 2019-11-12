<section class="container">
	<?php 
	$urlVideo = $row_registro['registros_link'];
	$youtube = explode('/',$urlVideo);
	?>
		<iframe width="100%" height="600" src="https://www.youtube.com/embed/<?php echo end($youtube); ?>" frameborder="0" allowfullscreen></iframe>
		<div class="clear40"></div>
	<?php echo $row_registro['registros_texto']; ?>
	<a class="btn btn-padrao" href="<?php echo RAIZ ?>videos">Voltar para os vídeos</a>
</section>	