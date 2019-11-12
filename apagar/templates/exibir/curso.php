<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="clear40"></div>

<section id="produto" class="container" >
	
	<div class="row">
		<div class="col-sm-6">
			<div id="imagemProduto">
				<div class="img-produto" data-src="<?php echo RAIZ_ADMIN ?>uploads/<?php echo $row_registro['registros_imagem'] ?>">
					<img src="<?php echo RAIZ ?>timthumb.php?src=<?php echo RAIZ_ADMIN ?>uploads/<?php echo $row_registro['registros_imagem'] ?>&zc=2&w=555" class="img-responsive transition">
				</div>
			</div>
			<div class="clear30"></div>
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
				        <div class="col-sm-4 fotos" data-src="<?php echo RAIZ.$pasta.$foto ?>">
					       <img src="<?php echo RAIZ."timthumb.php?src=".RAIZ.$pasta.$foto ?>&zc=1&w=263&h=263" class="img-responsive">
				        </div>
				        <?php 
				    } 
				} 
			    ?>
			</div>

		</div>
		<div class="col-sm-6">
			<h2><?php echo $row_registro['registros_titulo'] ?></h2>
			<?php
			$texto = $row_registro['registros_texto'];
			$texto = str_replace('<img src="uploads/', '<img src="'.RAIZ_ADMIN.'uploads/', $texto);
			echo $texto;
			?>
		</div>
	</div>
	<div class="clear40"></div>
	<hr>
	<div class="fb-like" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
</section>


<div class="clear40"></div>
<script type="text/javascript">
$(document).ready(function(){
	$('#lightGallery').lightGallery({
   	 	showThumbByDefault: false
	}); 

	$('#imagemProduto').lightGallery({
   	 	showThumbByDefault: false
	}); 
});
</script>	