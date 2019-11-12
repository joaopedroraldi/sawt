<style type="text/css">
	.breadcrumbs{display: none;}
	table td{padding: 10px; border:solid 1px #eee;}
	table{width: 100%; margin-top: 10px;}	
</style>

<div class="container">
<div class="clear30"></div>
<a class="btn btn-default" href="<?php echo RAIZ ?>?conta=visualizar"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</a>
<div class="clear30"></div>
<?php 
$query = "SELECT registros_texto FROM registros WHERE registros_id = {$url[1]}"; 
$visualizar = mysqli_query($config, $query);
$row_visualizar = mysqli_fetch_assoc($visualizar);
echo $row_visualizar['registros_texto'];
?>
</div>