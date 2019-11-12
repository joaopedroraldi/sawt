<div class="clear40"></div>
<div class="container" id="videos">
	<div class="row">
		<?php 
        while($row_registros = mysqli_fetch_assoc($registros)){
        $urlVideo = $row_registros['registros_link'];
        $youtube = explode('/',$urlVideo);
        ?>
        <div class="col-sm-4">
            <a class="video transition" video="<?php echo end($youtube); ?>" href="<?php echo $row_paginas['paginas_url'] ?>/<?php echo $row_registros['registros_url'] ?>">
                <div class="pelicula"></div>
                <img src="http://i1.ytimg.com/vi/<?php echo end($youtube); ?>/hqdefault.jpg" width="370" alt="<?php echo $row_registros['registros_titulo']; ?>" class="img-responsive" />
                
                <div class="content">
                    <i class="fa fa-youtube-play" aria-hidden="true"></i>
                    <h3 class="bold"><?php echo $row_registros['registros_titulo'] ?></h3>
                </div>
            </a>
        </div>
        <?php } ?>
	</div>
</div>

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
	#videos .video{position: relative; text-align: center; float: left; cursor: pointer; margin-bottom: 30px; }
	#videos .video .pelicula{position:absolute; top: 0; left: 0; width: 100%; height: 100%; background:rgba(0,0,0,0.8); z-index: 0}
	#videos .content{position:absolute; top: 0; left: 0; width: 100%; height: 100%;  z-index: 1;}
	#videos i{color: #E65F52; display: inline-block; font-size: 90px; margin-top: 20%;}
	#videos h1{color:#E65F52;}
	#videos h3{font-size: 14px; color: #fff;}
	#videos .btn{color:#E65F52}
	#videos .videos:hover .video{opacity: 0.6;}
	#videos .video:hover {opacity:1 !important;}
</style>