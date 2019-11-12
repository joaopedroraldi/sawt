<?php 
if(!isset($_GET['paginas_url']) or $_GET['paginas_url'] == "home"){
	include('nav/home.php');
}else{

	$url = $_GET['paginas_url'];
	$url = explode('/', $url);
	$paginas_url = $url[0];
	$urlraiz = RAIZ;

	$query = "SELECT * FROM paginas WHERE paginas_url = '$paginas_url'";
	$paginas = mysqli_query($config, $query) or die(mysqli_error());
	$rows_paginas = mysqli_num_rows($paginas);
	if ($rows_paginas == 0) {
		echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$urlraiz.'404">';
	}
	$row_paginas = mysqli_fetch_assoc($paginas);
	$paginas_id = $row_paginas['paginas_id'];
	$pagina_titulo = $row_paginas['paginas_titulo'];
	$template = $row_paginas['paginas_template'];
	$template_exibir = $row_paginas['paginas_template_exibir'];
	$paginas_ordem = $row_paginas['paginas_ordem'];
	$urlPaginacao = $row_paginas['paginas_url'];

	//PAGINAÇÕES
	if( isset( $_GET['pg'] ) && (int)$_GET['pg'] >= 0){
    $pg = (int)$_GET['pg'];
	}else{
	    $pg = 0;
	    $_GET['pg'] = 0;
	}
	$limite = $row_paginas['paginas_limite'];
	$item = $pg * $limite;

	$query = "SELECT * FROM registros WHERE registros_idpg = '$paginas_id' ORDER BY $paginas_ordem LIMIT $item, $limite";
	$registros = mysqli_query($config, $query) or die(mysqli_error());
	$rows_registros = mysqli_num_rows($registros);
	$rows_registros_total = mysqli_num_rows(mysqli_query($config, "SELECT * FROM registros WHERE registros_idpg = '$paginas_id'"));

	//se existe 2 niveis de url.
	// Ex1: Página > categoria: produtos/mouses
	// Ex2: Página > produto:   produtos/mouse-cobra
	if(isset($url[1])){
		$registros_url = $url[1];
		$query = "SELECT * FROM categorias WHERE categorias_url = '$registros_url'";
		$categoria = mysqli_query($config, $query) or die(mysqli_error());	
		$row_categoria = mysqli_fetch_assoc($categoria);	
		$rows_categoria = mysqli_num_rows($categoria);
		$idcat = $row_categoria['categorias_id'];
		$urlPaginacao = $row_paginas['paginas_url'] . "/" . $row_categoria['categorias_url'];

		// se essa página contem categoria (Ex1)
		if($rows_categoria > 0){
			$query = "SELECT 
			  (select r.registros_titulo from registros as r where r.registros_id = rc.registros_id) as registros_titulo, 
			  (select r.registros_imagem from registros as r where r.registros_id = rc.registros_id) as registros_imagem, 
			  (select r.registros_url from registros as r where r.registros_id = rc.registros_id) as registros_url,
			  (select r.registros_ordem from registros as r where r.registros_id = rc.registros_id) as registros_ordem
			  FROM 
			  registros_categorias as rc
			  WHERE 
			  categorias_id = $idcat
			  ORDER BY
			  $paginas_ordem
			  LIMIT $item, $limite";
			  ;
			$registros = mysqli_query($config, $query) or die(mysqli_error());

			$rows_registros_total = mysqli_num_rows(mysqli_query($config, "SELECT 
			  (select r.registros_titulo from registros as r where r.registros_id = rc.registros_id) as registros_titulo, 
			  (select r.registros_imagem from registros as r where r.registros_id = rc.registros_id) as registros_imagem, 
			  (select r.registros_url from registros as r where r.registros_id = rc.registros_id) as registros_url,
			  (select r.registros_ordem from registros as r where r.registros_id = rc.registros_id) as registros_ordem
			  FROM 
			  registros_categorias as rc
			  WHERE 
			  categorias_id = $idcat"));
		// se não contém categoria (Ex2)
		}else{
			$query = "SELECT * FROM registros WHERE registros_idpg = '$paginas_id' and registros_url = '$registros_url'";
			$registro = mysqli_query($config, $query) or die(mysqli_error());	
			$row_registro = mysqli_fetch_assoc($registro);	
		}
	}
?>
	
<header class="breadcrumbs" style="background:<?php echo $row_cores['cor_2'] ?>">
	<div class="container text-center">
		<!-- <ul>
			<li>Você está em: Home</li>
			<li> / </li>
			<li><a href="<?php echo RAIZ ?><?php echo $row_paginas['paginas_url'] ?>"><?php echo $row_paginas['paginas_titulo'] ?></a></li>
			<?php if(isset($url[1])){ ?>
			<li> / </li>
			<li><?php echo $titulo2 ?></li>
			<?php } ?>
		</ul> -->
		<?php if(isset($url[1])){ ?>
		<h1><?php echo $titulo2 ?></h1>
		<?php }else{ ?>
		<h1><?php echo $pagina_titulo ?></h1>
		<?php } ?>
	</div>
</header>

<article>
	<?php 
		if(isset($url[1])){
			if($rows_categoria > 0){
				include("templates/".$template);
			}else{	
				include("templates/exibir/".$template_exibir);
			}
		}else{	
			if($template != ''){	
				include("templates/".$template);
			}else{
				include('errors/404.php');
			}
		}
	?>
	<div class="container">
		<?php include('templates/func/paginacao.php'); ?>
	</div>
</article>
<?php } ?>