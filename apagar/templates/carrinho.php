<div class="clear40"></div>
<?php 
    if(!isset($_SESSION['carrinho'])){
       $_SESSION['carrinho'] = array();
    }
 	
 	if(empty($_SESSION['carrinho'])){ ?>
 	<div class="container">Carrinho vazio</div>
 	<?php 
    }else{
 ?>


<div class="container">
	<table class="table table-bordered carrinho">
		<tr>
			<td><strong>Produto</strong></td>
			<td class="text-center"><strong>Quantidade</strong></td>
			<td class="text-center"><strong>Apagar</strong></td>
		</tr>	
		<?php foreach ($_SESSION['carrinho'] as $key => $value) { 
			$query_produto = "SELECT registros_titulo FROM registros WHERE registros_id = $key";
			$produto = mysqli_query($config, $query_produto);
			$row_produto = mysqli_fetch_assoc($produto);
		?>
		
		<tr>
			<td width="80%"><?php echo $row_produto['registros_titulo'] ?></td>
			<td class="text-center">
				<form class="atualiza-produto">
					<input type="hidden" name="acao" value="up">
					<input type="hidden" name="id" value="<?php echo $key ?>">
					<div class="input-group">
						<input type="text" class="form-control" style="height:auto;" name="qtd" value="<?php echo $value ?>">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-warning"><i class="fa fa-refresh"></i></button>
						</span>
					</div>
				</form>
			</td>
			<td class="text-center"><a class="btn btn-danger remove-produto" id="<?php echo $key ?>"><i class="fa fa-trash-o"></i></a></td>
		</tr>
		
		<?php } ?>
	</table>


	<div class="row">
		<div class="col-sm-3">
			<a class="btn btn-primary" href="<?php echo RAIZ ?>">Continuar orçando</a>
		</div>
		<div class="col-sm-3 col-sm-offset-6 text-right">
			<a class="btn btn-success finaliza-orcamento">Finalizar orçamento</a>
		</div>
	</div>


	<?php } ?>
	<div class="clear40"></div>

	<div id="formulario-orcamento">
		<h4>Enviar orçamento</h4>
		<div class="clear20"></div>
		<form id="enviar_orcamento" name="enviar_orcamento" enctype="multipart/form-data" role="form" class="form" method="post">
            <input name="data" type="hidden" value="<?php echo date("Y-m-d H:i:s"); ?>" />
            <div class="form-group">
                <div class="input-group">
                    <input required="required" class="form-control" name="nome" placeholder="Nome:" type="text" maxlength="100"/>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input required="required" class="form-control" type="email" name="email" placeholder="Email:" maxlength="100"/>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input required="required" class="form-control phone" name="telefone" placeholder="Telefone:" type="text" maxlength="15"/>
                </div>
            </div>
            <input name="assunto" type="hidden" value="Novo orçamento" /> 
			
			<?php 
			$produtos = "";
			$produtos .= "<table cellpadding=\'5\' border=\'1\' class=\'table table-striped\'><tr><td><strong>Produto</strong></td><td align=\'center\'><strong>Quantidade</strong></td></tr>";
			foreach ($_SESSION['carrinho'] as $key => $value) { 
				$query_produto = "SELECT registros_titulo FROM registros WHERE registros_id = $key";
				$produto = mysqli_query($config, $query_produto);
				$row_produto = mysqli_fetch_assoc($produto);
					$produtos .= "<tr><td>{$row_produto['registros_titulo']}</td><td align=\'center\'>{$value}</td></tr>";
			    }
			$produtos .= "</table>";
			?>
			<input name="produtos" type="hidden" value="<?php echo $produtos ?>"> 

            <div class="form-group">
                <div class="input-group">
                    <textarea class="form-control" name="mensagem" placeholder="Mensagem" maxlength="500" style="height:150px;"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-padrao" >Enviar formulário</button>
        </form>
		<div class="clear40"></div>
	</div>

</div>

<div id="retorno"></div>