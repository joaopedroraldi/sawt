<div class="clear40"></div>

<div class="container" >
	<?php echo $row_registro['registros_texto']; ?>
	<div class="row" id="lightGallery">
		<?php
		$registro_id = $row_registro['registros_id'];
	    $pasta = "gerenciador/uploads/fotos/".$registro_id."/";
	    if(is_dir($pasta)){
		    $diretorio = scandir("gerenciador/uploads/fotos/".$registro_id."/");

		    $files = glob($pasta.'/*');
		    natsort($files);
		    
		    foreach ($files as $key => $value) {
		        $foto = explode('/', $value);
		        $foto = end($foto);
		        ?>
		        <div class="col-md-3 col-sm-4 col-xs-6 fotos" data-src="<?php echo RAIZ.$pasta.$foto ?>">
			       <img src="<?php echo RAIZ."timthumb.php?src=".RAIZ.$pasta.$foto ?>&zc=1&w=263&h=263" class="img-responsive">
		        </div>
		        <?php 
		    } 
		}
		?>
	</div>
</div>

<div class="clear40"></div>
<script type="text/javascript">
$(document).ready(function(){
	$('#lightGallery').lightGallery({
   	 	showThumbByDefault: false
	}); 
});
</script>

<style type="text/css">
	#lightGallery img{margin-bottom: 30px;}
</style>