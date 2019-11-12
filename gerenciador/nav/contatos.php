<?php 
include('menu-mensagens.php');
$table = 'email_contato';
$query = "SELECT * FROM $table WHERE apagada = 0 ORDER BY Id DESC LIMIT ".$limite." OFFSET ".$offset;
$contato = mysqli_query($config, $query) or die(mysqli_error());
$rows_contato = mysqli_num_rows($contato);
?>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	<?php while($row_contato = mysqli_fetch_assoc($contato)){ 
		$campodata = explode(' ', $row_contato['data']);
	    $data = $campodata[0];
	    $data = explode('-', $data);
	    $data = $data[2]."/".$data[1]."/".$data[0];
	?>
	  <div class="panel panel-default">
	    <div class="panel-heading <?php if($row_contato['visualizada'] == 1){echo 'opacity05';}else{echo 'opacity1';} ?>" role="tab" id="heading<?php echo $row_contato['Id'] ?>">
	      <h4 class="panel-title">
	        <a class="collapsed visualizar" table="<?php echo $table ?>" mensagemId="<?php echo $row_contato['Id'] ?>" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row_contato['Id'] ?>" aria-expanded="false" aria-controls="collapse<?php echo $row_contato['Id'] ?>">
	          <span class="icone"><?php if($row_contato['visualizada'] == 1){?><i class="fa fa-envelope-open"></i><?php }else{ ?><i class="fa fa-envelope"></i><?php } ?> </span>
	          <?php echo $row_contato['nome']; ?> <div style="float:right"><?php echo $data. " <span style='color:#999'>" .$campodata[1]. "</span>"; ?></div>
	        </a>
	      </h4>
	    </div>
	    <div id="collapse<?php echo $row_contato['Id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $row_contato['Id']; ?>">
	      <div class="panel-body">
	        <strong>Nome:</strong> <?php echo $row_contato['nome'] ?><br>
	        <strong>E-mail:</strong> <?php echo $row_contato['email'] ?><br>
	        <strong>Telefone:</strong> <?php echo $row_contato['telefone'] ?><br>
	        <strong>Whatsapp:</strong> <?php echo $row_contato['whatsapp'] ?><br>
	        <strong>Cidade:</strong> <?php echo $row_contato['cidade'] ?><br>
	        <strong>Mensagem:</strong> <br> <?php echo $row_contato['mensagem'] ?><br>
	        <br>
	        <?php echo $data. " <span style='color:#999'>" .$campodata[1]. "</span>"; ?>
	        <div class="clear30"></div>
        	<div class="row">
        		<div class="col-sm-6">
		        	<a table="<?php echo $table ?>" mensagemId="<?php echo $row_contato['Id'] ?>" class="label label-default naolida"><i class="fa fa-envelope"></i> Marcar como não lida</a>
        		</div>
        		<div class="col-sm-6 text-right">
			        <a class="label label-danger mensagemDeletar" table="<?php echo $table ?>" mensagemId="<?php echo $row_contato['Id'] ?>"><i class="fa fa-trash-alt"></i> Apagar</a>
        		</div>
        	</div>
	      </div>
	    </div>
	  </div>
	<?php } ?>
</div>
<?php
if($pagina !== 0){ // Sem isto irá exibir "Página Anterior" na primeira página.
?>
<a class="btn-paginacao btn btn-default" href="?page=<?php echo $_GET['page'] ?>&pagina=<?php echo $pagina-1; ?>"><i class="fa fa-step-backward" aria-hidden="true"></i></a>
<?php
}
if($rows_contato > 0){
?>
<a class="btn-paginacao btn btn-default" href="?page=<?php echo $_GET['page'] ?>&pagina=<?php echo $pagina+1; ?>"><i class="fa fa-step-forward" aria-hidden="true"></i></a>
<?php } ?>