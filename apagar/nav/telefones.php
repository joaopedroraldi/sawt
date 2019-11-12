<ul class="nav nav-pills">
  <li role="presentation"><a href="?page=contatos">Contatos</a></li>
  <li role="presentation" class="active"><a href="#">Telefones</a></li>
</ul>

<?php 
$query = "SELECT * FROM email_telefone ORDER BY data DESC LIMIT ".$limite." OFFSET ".$offset;
$contato = mysqli_query($config, $query) or die(mysqli_error());
$rows_contato = mysqli_num_rows($contato);
?>
<div class="clear40"></div>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	<?php while($row_contato = mysqli_fetch_assoc($contato)){ 
		$campodata = explode(' ', $row_contato['data']);
	    $data = $campodata[0];
	    $data = explode('-', $data);
	    $data = $data[2]."/".$data[1]."/".$data[0];
	?>
	  <div class="panel panel-default">
	    <div class="panel-heading" role="tab" id="heading<?php echo $row_contato['Id'] ?>">
	      <h4 class="panel-title">
	        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row_contato['Id'] ?>" aria-expanded="false" aria-controls="collapse<?php echo $row_contato['Id'] ?>">
	          <?php echo $row_contato['nome']; ?> <div style="float:right"><?php echo $data. " <span style='color:#999'>" .$campodata[1]. "</span>"; ?></div>
	        </a>
	      </h4>
	    </div>
	    <div id="collapse<?php echo $row_contato['Id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $row_contato['Id']; ?>">
	      <div class="panel-body">
	        <strong>Nome:</strong> <?php echo $row_contato['nome'] ?><br>
	        <strong>Telefone:</strong> <?php echo $row_contato['telefone'] ?><br>
	        <br>
	        <?php echo $data. " <span style='color:#999'>" .$campodata[1]. "</span>"; ?>
	      </div>
	    </div>
	  </div>
	<?php } ?>
</div>


<?php
if($pagina !== 0){ // Sem isto irá exibir "Página Anterior" na primeira página.
?>
<a class="btn btn-default" href="?page=telefones&pagina=<?php echo $pagina-1; ?>"><i class="fa fa-step-backward" aria-hidden="true"></i></a>
<?php
}
if($rows_contato > 0){
?>
<a class="btn btn-default" href="?page=telefones&pagina=<?php echo $pagina+1; ?>"><i class="fa fa-step-forward" aria-hidden="true"></i></a>
<?php } ?>