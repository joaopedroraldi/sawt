<style type="text/css">
.tarja{width: 100%; float: left; padding:200px 0 ; text-align: center; color: #fff; font-size: 20px;}
.tarja h1{color: #fff; font-size: 40px;}
.tarja h3{margin-top:20px; color: #fff; font-weight: bold;}
</style>
<?php 
$query = "SELECT * FROM registros WHERE registros_idpg = $template_idpg ORDER BY registros_ordem ASC";
$registros = mysqli_query($config, $query) or die(mysqli_error());
$row_registros = mysqli_fetch_assoc($registros);
?>
<div class="clear"></div>
<section class="tarja parallax-window" data-parallax="scroll" data-image-src="<?php echo RAIZ_UP.$row_registros['registros_imagem'] ?>">
    <div class="clear40"></div>
    <div class="container">
        <h1><?php echo $row_registros['registros_titulo'] ?></h1>
        <?php echo $row_registros['registros_texto'] ?>
        <div class="clear20"></div>
        <a class="btn btn-padrao" href="<?php echo RAIZ.$row_registros['registros_link'] ?>">Acessar</a>
    </div>
</section>