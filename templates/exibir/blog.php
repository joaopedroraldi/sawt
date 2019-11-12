<div id="fb-root"></div>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.9&appId=907529542669975";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="clear40"></div>
<div class="container">
	<?php 
	$dataNoticia = explode('-', $row_registro['registros_data']);
	?>
	<h5 style="color:#777; font-size:12px;"><?php echo  "Publicado em: " .$dataNoticia[2]."/".$dataNoticia[1]."/".$dataNoticia[0]; ?></h5>
	<hr>
	<div class="row">
		<div class="col-sm-8">
			<div id="texto">
			<?php
			$texto = $row_registro['registros_texto'];
			$texto = str_replace('<img src="uploads/', '<img src="'.RAIZ_ADMIN.'uploads/', $texto);
			echo $texto;
			?>
			</div>
			<div class="clear20"></div>

		</div>
		<div class="col-sm-4" id="fotoDestaque">
			<div data-src="<?php echo RAIZ_ADMIN ?>uploads/<?php echo $row_registro['registros_imagem'] ?>">
				<img src="<?php echo RAIZ_ADMIN ?>uploads/<?php echo $row_registro['registros_imagem'] ?>" alt="<?php echo $row_registro['registros_titulo'] ?>" class="img-responsive">
			</div>
		</div>
	</div>
	<div class="clear40"></div>

	<div class="row" id="galeria">
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
	<script type="text/javascript">
	$(document).ready(function(){
		$('#texto img').each(function(){
			srcImg = $(this).attr('src');
			$(this).replaceWith("<div data-src='"+srcImg+"'><img src='"+srcImg+"' width='100%'></div>");
		});

		$('#texto p').lightGallery({
	   	 	showThumbByDefault: false
		}); 
		
		$('#galeria').lightGallery({
	   	 	showThumbByDefault: false
		}); 

		$('#fotoDestaque').lightGallery({
	   	 	showThumbByDefault: false
		}); 

	});
	</script>
	<style type="text/css">
		#galeria img{margin-bottom: 30px;}
		table, table td, table tr{padding: 0 !important; border: none !important;}
	</style>

	<div class="clear40"></div>
	<div class="fb-like" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
	<div class="clear40"></div>
	<div class="fb-comments" data-width="100%" data-numposts="5"></div>
</div>


<div class="clear40"></div>