<style type="text/css">
	#slideshow li{position: relative; background: #000}
	#slideshow li .texto{color: #fff; font-size:30px; line-height: 32px;  text-align: center; width: 100%; position: absolute; left:0; top: 40%;  transform:translate3d(0px, 40px, 0px); opacity: 0}
	#slideshow li .texto.textoActive{opacity: 1; transform:translate3d(0px, 0px, 0px);}
	#slideshow li .texto h2{color: #fff; font-size:50px; line-height: 45px; font-weight: bold;}
	@media(max-width: 1250px){
    	#slideshow li .texto h2{font-size: 40px; line-height: 40px;}
	}
	@media(max-width: 767px){
		#slideshow li .texto{top:15%; }
    	#slideshow li .texto h2{font-size: 20px; line-height: 20px;}
    	#slideshow li .texto{font-size: 16px; line-height: 16px;}
	}
</style>
<?php 
$query = "SELECT * FROM registros WHERE registros_idpg = $template_idpg";
$slideshow = mysqli_query($config, $query) or die(mysqli_error());
?>
<div id="<?php echo $idCss ?>">
	<ul id="slideshow">
		<?php while($row_slideshow = mysqli_fetch_assoc($slideshow)){ ?>
	    <li>
	    	<img src="<?php echo RAIZ_UP . $row_slideshow['registros_imagem'] ?>" class="img-responsive">
	    	<div class="texto transition">
	    	<h2><?php echo $row_slideshow['registros_titulo'] ?></h2>
	    	<?php echo $row_slideshow['registros_texto'] ?>
	    	</div>
	    </li>
	    <?php } ?>
	</ul>
</div>

<script type="text/javascript">
$(document).ready(function(){
	

});
</script>