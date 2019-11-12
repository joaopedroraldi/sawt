<section class="container" >
	<div class="row">
    	<?php while ($row_registros = mysqli_fetch_assoc($registros)) { ?>
    		<div class="col-sm-4" data-mh="my-group">
    			<div class="segura-registros text-center">
    				<center>
    					<?php if(!empty($row_registros['registros_imagem'])){ ?><img src="<?php echo RAIZ ?>timthumb.php?src=<?php echo RAIZ ?>gerenciador/uploads/<?php echo $row_registros['registros_imagem'] ?>&zc=2&h=150&w=120"><?php } ?>
    				</center>
    				<div class="clear20"></div>
    				<h2><?php echo $row_registros['registros_titulo']; ?></h2>
    				<div class="clear20"></div>
    				<?php echo $row_registros['registros_texto']; ?>
    			</div>
    			<div class="clear20"></div>
    		</div>
    	<?php } ?>
    </div>
</section>
