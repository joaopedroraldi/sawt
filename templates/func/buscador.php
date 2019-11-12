<style type="text/css">
	#buscador{width: 100%; }
	#buscador button{border:none;}
</style>
<?php 
if(isset($_GET['buscar'])){
$urlPaginacao = $urlPaginacao."?buscar=".$_GET['buscar'];
$busca = @$_GET['buscar'];
$query = "SELECT registros_imagem, registros_titulo, registros_url FROM registros WHERE registros_idpg = $paginas_id AND registros_titulo LIKE '%$busca%' OR registros_idpg = $paginas_id AND registros_texto LIKE '%$busca%' LIMIT $item, $limite";
$registros = mysqli_query($config, $query) or die(mysqli_error());
$rows_registros = mysqli_num_rows($registros);
$rows_registros_total = mysqli_num_rows(mysqli_query($config, "SELECT registros_imagem, registros_titulo, registros_url FROM registros WHERE registros_idpg = $paginas_id AND registros_titulo LIKE '%$busca%' OR registros_idpg = $paginas_id AND registros_texto LIKE '%$busca%'"));
}
?>
<form id="buscador" method="get" action="<?php echo RAIZ.$row_paginas['paginas_url'] ?>">
    <div class="input-group">
        <input type="text" name="buscar" placeholder="Digite o produto que você procura:" class="form-control" required="required">
        <span class="input-group-btn">
          <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </span>
    </div>
</form>
<div class="clear20"></div>
<?php if(isset($_GET['buscar'])){ ?>
Você buscou por: <strong><?php echo $_GET['buscar']; ?></strong>
<div class="clear20"></div>
<?php } ?>