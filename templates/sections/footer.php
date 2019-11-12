<style type="text/css">
/*rodape*/
footer{width: 100%;float: left; height: auto; padding: 0 0 100px; background: url(<?php echo RAIZ ?>img/bg-footer.jpg) center center fixed;}

#footer-bar{background: rgba(0,0,0,.9); color: #fff; padding: 60px 0; font-style: 14px; font-weight: 300}
#footer-bar h3{font-size: 16px; margin-top: 0; color: #fff}
#footer-bar a{color: #fff; margin: 5px;}
</style>
<footer>
	<div id="footer-bar">
		<div class="container">
			<div class="row">
	            <?php 
	            $query = "SELECT * FROM registros WHERE registros_idpg = 22 ORDER BY registros_ordem ASC";
	            $registros = mysqli_query($config, $query) or die(mysqli_error());
	            ?>
	            <?php while($row_registros = mysqli_fetch_assoc($registros)){ ?>
	            <div class="col-sm-3 info-footer">
	                <h3><?php echo $row_registros['registros_titulo'] ?></h3>
	                <?php echo $row_registros['registros_texto'] ?>
	            </div>
	            <?php } ?>


	            <?php 
	            $query = "SELECT * FROM registros WHERE registros_idpg = 24 ORDER BY registros_ordem ASC";
	            $registros = mysqli_query($config, $query) or die(mysqli_error());
	            $row_registros = mysqli_fetch_assoc($registros);
	            $num_rows = mysqli_num_rows($registros);
	            if($num_rows > 0){
	            ?>
	            <div class="col-sm-3 info-footer">
	                <h3>Redes sociais</h3>
		            <?php do{ ?>
		                <a href="<?php echo $row_registros['registros_link'] ?>" target="_blank"><?php echo $row_registros['registros_texto'] ?></a>
		            <?php }while($row_registros = mysqli_fetch_assoc($registros)); ?>
	            </div>
	            <?php } ?>
	        </div>
		</div>
	</div>
</footer>