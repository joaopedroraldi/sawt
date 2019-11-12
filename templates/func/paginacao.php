<style type="text/css">
  .pagination .page-link{color: #999}
  .pagination .page-item.active a{color:#fff; background: <?php echo $cor1 ?>; border-color: <?php echo $cor1 ?>}
</style>
<?php 
	$num_registros = ceil($rows_registros_total/$limite);
	if($num_registros > 1){
?>
<div class="clear30"></div>
<center>
<nav aria-label="Paginação">
  <ul class="pagination">
    <li class="page-item <?php if($_GET['pg'] == 0){echo "disabled";} ?>">
      <a class="page-link" <?php if($_GET['pg'] != 0){ ?>href="<?php echo $urlPaginacao ?>&pg=<?php echo $_GET['pg']-1; ?>" <?php } ?> tabindex="-1">Anterior</a>
    </li>
    <?php for($i=0;$i<$num_registros;$i++){ 
      $estilo = "";
      if($pg == $i){
        $estilo = 'active';
      }
    ?>
    <li class="page-item <?php echo $estilo ?>"><a class="page-link" href="<?php echo $urlPaginacao ?>&pg=<?php echo $i ?>"><?php echo $i+1; ?></a></li>
    <?php } ?>
    <li class="page-item">
      <a class="page-link" <?php if($_GET['pg'] < $num_registros-1){ ?>href="<?php echo $urlPaginacao ?>&pg=<?php echo $_GET['pg']+1;?>" <?php } ?>>Próximo</a>
    </li>
  </ul>
</nav>
</center>
<?php }  ?>
<div class="clear40"></div>