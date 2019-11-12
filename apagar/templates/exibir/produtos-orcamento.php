<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="clear40"></div>
<div class="clear40"></div>

<div id="produto" class="container" >
	
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
			<div class="clear40"></div>
			<div class="row">
				<div class="col-sm-6">
					<form id="adiciona_carrinho" class="adiciona_carrinho" >
						<input type="hidden" name="acao" value="add"/>
						<input type="hidden" name="id" value="<?php echo $row_registro['registros_id'] ?>"/>
						<div class="input-group">
					      <input name="qtd" id="qtd" value="1" placeholder="Quantidade" class="form-control">
					      <span class="input-group-btn">
					        <button type="submit" class="btn btn-primary" style="height: 55px;"> Orçar</button>
					      </span>
					    </div><!-- /input-group -->
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- <hr> -->
	<div class="fb-like" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
</div>


<!-- Modal Adicionar carrinho-->
<div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <a class="btn btn-default" href="<?php echo RAIZ ?>carrinho">Ir para o carrinho</a>
        <a class="btn btn-primary" data-dismiss="modal">Fechar</a>
      </div>
    </div>
  </div>
</div>

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

<div class="clear40"></div>