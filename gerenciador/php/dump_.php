<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Plupload - Form dump</title>
</head>
<body style="font: 13px Verdana; background: #eee; color: #333">
	
<h1>Post dump</h1>

<p>Shows the form items posted.</p>

<table>
	<tr>
		<th>Name</th>
		<th>Value</th>
	</tr>
	<?php $count = 0; foreach ($_POST as $name => $value) { ?>
	<tr class="<?php echo $count % 2 == 0 ? 'alt' : ''; ?>">
		<td><?php echo htmlentities(stripslashes($name)) ?></td>
		<td><?php echo nl2br(htmlentities(stripslashes($value))) ?></td>
	</tr>
	<?php } ?>
</table>

</body>
</html>

<?php 

#Analisa cada arquivo

 $count = 0; foreach ($_POST as $name => $value) {

	//uploadImagem();



 	$_UP['extensoes'] = array('jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'png', 'PNG');

	$_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb





 	$extensao = strtolower(end(explode('.', $_FILES['anuncio_fotos']['name'][$i])));

 	if (array_search($extensao, $_UP['extensoes']) === false) {

	    echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";

	    exit;

	}

	

	// Faz a verificação do tamanho do arquivo

	if ($_UP['tamanho'] < $_FILES["anuncio_fotos"]['size'][$i]) {

	  echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";

	  exit;

	}	 



	# Definir o diretório onde salvar os arquivos.

	$destino = "/uploads_teste/". $_FILES["anuncio_fotos"]["name"][$i];



	#Move o arquivo para o diretório de destino

	move_uploaded_file($_FILES["anuncio_fotos"]["tmp_name"][$i], $destino);



	// echo $_FILES['anuncio_fotos']["name"][$i];



    #Próximo arquivo a ser analisado

    $i++;

}

?>