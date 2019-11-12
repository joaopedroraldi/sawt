<div id="header">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 logo">
				<a href="<?php echo RAIZ_ADMIN ?>"><img src="<?php echo RAIZ_ADMIN ?>img/logo-topo.png"></a>
			</div>
			<div class="col-sm-8 text-right">
				<div class="top-usuario">
					Vendas sempre são bem-vindas
					<!-- Bem vindo <span><?php echo $nome_login ?></span> -->
				</div>
				<a href="<?php echo RAIZ_ADMIN ?>?page=usuarios_editar&id=<?php echo $login_id ?>" class="top-link transition"><i class="fa fa-user"></i> Meu perfil</a>
				<a href="php/logout.php" class="top-link transition"><i class="fa fa-sign-out"></i> Sair</a>
			</div>
		</div>
	</div>

	<div class="visible-xs">
		<div class="clear10"></div>
		<i class="fa fa-bars"></i>
		<div class="clear10"></div>
		<div class="navegacao-mobile">
			<?php include('navegacao.php'); ?>
		</div>
	</div>

</div>