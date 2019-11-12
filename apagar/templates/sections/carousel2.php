<style type="text/css">
	<?php echo $idcss ?>{}
	<?php echo $idcss ?> h1{color:<?php echo $row_cores['cor_1'] ?>; font-weight: bold; text-transform: uppercase; position: relative;}
	<?php echo $idcss ?> h1:before{content:""; width: 290px; height: 30px; background: #eee; position: absolute; bottom:-15px; left:50%; margin-left: -145px;  z-index: -2; }
	<?php echo $idcss ?> .post{text-align: center; margin-bottom: 50px; background: #fff; border: solid 1px <?php echo $row_cores['cor_1'] ?>; color: #777; padding: 20px 0}
	<?php echo $idcss ?> .post h2{color: <?php echo $row_cores['cor_1'] ?>; padding: 15px 0; text-align: center;}
	<?php echo $idcss ?> .text{padding: 15px; color: #777;}
</style>

<section id="<?php echo $idCss ?>">
	<div class="container">
		<center>
			<h1><?php echo $row_templates['templates_home_titulo'] ?></h1>
			<div class="clear40"></div>
		</center>
		<div class="carousel2" class="row">
			<?php
			$query = "SELECT * FROM registros WHERE registros_idpg = $template_idpg LIMIT 12";
			$registros = mysqli_query($config, $query) or die(mysqli_error());
			while ($row_registros = mysqli_fetch_assoc($registros)) { ?>
				<div class="col-sm-4 text-center">
					<div class="post">
						<a href="<?=RAIZ;?><?php echo $row_templates['paginas_url'] ?>/<?=$row_registros['registros_url'];?>">
							<img src="<?php echo RAIZ ?>timthumb.php?src=<?php echo RAIZ ?>gerenciador/uploads/<?php echo $row_registros['registros_imagem'] ?>&zc=1&w=370&h=300" class="img-responsive">
							<h2>
								<?php echo $row_registros['registros_titulo'];?>
							</h2>
							<div class="text">
							<?php echo preg_replace('/(<[^>]+) style=".*?"/i', '$1', abreviaString($row_registros['registros_texto'], '200')); ?>
							</div>
							<div class="clear20"></div>
							<button class="btn btn-padrao2">Ver mais</button>
						</a>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>

<script type="text/javascript">
$(document).ready(function(){
	$('.carousel2').lightSlider({
        // gallery:true,
        item:3,
        thumbItem:0,
        slideMargin: 0,
        speed:500,
        pause:5000,
        pauseOnHover:true,
        auto:true,
        loop:true,
        responsive : [
            {
                breakpoint:800,
                settings: {
                    item:3,
                    slideMove:1,
                    slideMargin:6,
                  }
            },
            {
                breakpoint:480,
                settings: {
                    item:2,
                    slideMove:1
                  }
            }
        ]
    });
});
</script>