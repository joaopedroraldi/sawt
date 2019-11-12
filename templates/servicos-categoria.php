<?php 
//registros
    $query_categorias = "SELECT * FROM categorias WHERE categorias_idpg=17 ORDER BY categorias_id ASC";
    $categorias = mysqli_query($config, $query_categorias);
	while ($row_categorias = mysqli_fetch_assoc($categorias)) { ?>
	
	<section class="container">
	<div class="clear20"></div>
	<h2><?php echo $row_categorias['categorias_titulo'] ?></h2>
	<div class="clear20"></div>
	<?php echo $row_categorias['categorias_texto'] ?>
	</section>

	<div class="clear40"></div>

	<?php 
	//registros
	$idcat = $row_categorias['categorias_id'];
	    $query_registros = "SELECT 
		  (select r.registros_titulo from registros as r where r.registros_id = rc.registros_id) as registros_titulo, 
		  (select r.registros_imagem from registros as r where r.registros_id = rc.registros_id) as registros_imagem, 
		  (select r.registros_texto from registros as r where r.registros_id = rc.registros_id) as registros_texto
		  FROM 
		  registros_categorias as rc
		  WHERE 
		  categorias_id = $idcat
		  ORDER BY
		  $paginas_ordem
		  LIMIT ".$limite." OFFSET ".$offset
		  ;
	    $registros = mysqli_query($config, $query_registros);
	?>

	<section class="container" >
		<div class="row">

	    	<?php $cont=0; while ($row_registros = mysqli_fetch_assoc($registros)) { ?>
	    		<div class="col-sm-6">
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
	<hr>
<?php } ?>
