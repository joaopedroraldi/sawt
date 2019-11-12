<?php // include('gerenciador/php/funcoes.php'); ?>
<div class="clear40"></div>
<section class="container">
	<div class="row blog">
		<?php $cont=0; while ($row_registros = mysqli_fetch_assoc($registros)) { ?>
			<div class="col-sm-6">
				<div class="post">
					<a href="<?=RAIZ;?><?php echo $row_paginas['paginas_url'] ?>/<?=$row_registros['registros_url'];?>">
						<h2>
							<?php echo $row_registros['registros_titulo'];?>
						</h2>
						<img src="<?php echo RAIZ ?>timthumb.php?src=<?php echo RAIZ ?>gerenciador/uploads/<?php echo $row_registros['registros_imagem'] ?>&zc=1&w=650&h=500" class="img-responsive">
						<div class="clear10"></div>
						<strong>Publicado em:</strong> 
						<?php 
						$dataBlog = $row_registros['registros_data']; 
						$dataBlog = explode('-', $dataBlog);
						echo " ".$dataBlog[2] . "/" . $dataBlog[1] . "/" . $dataBlog[0];
						?>
						<div class="clear10"></div>
						<?php echo preg_replace('/(<[^>]+) style=".*?"/i', '$1', abreviaString($row_registros['registros_texto'], '300')); ?>
						<div class="clear20"></div>
						<a class="bt-blog" href="<?=RAIZ;?><?php echo $row_paginas['paginas_url'] ?>/<?=$row_registros['registros_url'];?>">Leia mais</a>
					</a>
				</div>
			</div>
		<?php if($cont == 1){
    			echo "<div class='clear'></div>";
    			} ?>
    	<?php $cont++;
    	if($cont == 2){
    		$cont = 0;
    	 } 
    	}?>
	</div>
</section>

<div class="container text-center">
	<div class="clear40"></div>
<?php
if($pagina !== 0){ // Sem isto irá exibir "Página Anterior" na primeira página.
?>
<a class="btn btn-default" href="<?php echo RAIZ.$urlPaginacao ?>?pagina=<?php echo $pagina-1; ?>"><i class="fa fa-step-backward" aria-hidden="true"></i> Anterior</a>
<?php
}
if($rows_registros > 0){
?>
<a class="btn btn-default" href="<?php echo RAIZ.$urlPaginacao ?>?pagina=<?php echo $pagina+1; ?>"><i class="fa fa-step-forward" aria-hidden="true"></i> Próxima</a>
<?php } ?>
</div>
<div class="clear40"></div>

<style type="text/css">
	.post{text-align: justify; margin-bottom: 50px;}
	.post a{color: #777;}
	.post h2{color: #555; margin-bottom: 20px; text-align: left;}
</style>