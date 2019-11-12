<style type="text/css">
	.content{padding: 40px 0}
	nav ul{list-style: none; margin-top: 40px; float: left; }
	nav ul li {float: left;}
	nav ul li a{color: #777; background: #eee; padding: 15px;}
</style>
<div class="container content">
	<header>
		<h3>Olá, <?php echo $row_cliente['registros_titulo'] ?></h3>
		Acesse seus contratos e briefings
	</header>
	<nav>
		<ul>
			<li>
				<a href="<?php echo RAIZ ?>?conta=contratos">Meus contratos</a>
				<a href="<?php echo RAIZ ?>?conta=briefings">Meus briefings</a>
				<a href="<?php echo RAIZ ?>?conta=sair">Sair</a>
			</li>
		</ul>
	</nav>
	<div class="clear"></div>

	<div class="content">
		<?php if(isset($_GET['conta'])){
			include('templates/conta_cliente/'.$_GET['conta'].'.php');
		} ?>
	</div>
</div>