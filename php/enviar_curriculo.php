<?php
error_reporting(0);
include("../gerenciador/cn/config.php");

// busca a biblioteca recaptcha
require_once "recaptchalib.php";
$query_configuracoes = "SELECT * FROM configuracoes";
$configuracoes = mysqli_query($config, $query_configuracoes);
$row_configuracoes = mysqli_fetch_assoc($configuracoes);
$emailsite = $row_configuracoes['configuracoes_email_formulario'];
$email_nome_site = $row_configuracoes['configuracoes_titulo'];
// sua chave secreta
$secret = $row_configuracoes['configuracoes_secret_key'];
 
// resposta vazia
$response = null;
 
// verifique a chave secreta
$reCaptcha = new ReCaptcha($secret);
// se submetido, verifique a resposta
if ($_POST["g-recaptcha-response"]) {
	$response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}
if($response != null && $response->success){
	extract($_POST); 
	$_POST['data'] = date("Y-m-d H:i:s");
	
	$_POST['file_curriculo'] = "<a href=http://{$_SERVER["SERVER_NAME"]}".RAIZ."uploads/curriculos/".uploadImagem('curriculo').">".uploadImagem('curriculo')."</a>";
	
	$sqlinsere = "INSERT INTO email_curriculo (";
	foreach ($_POST as $key => $value) {
		if($key != 'g-recaptcha-response'){
			$key = addslashes($key);
			$key = mysqli_real_escape_string($config, $key);
			$sqlinsere .= "$key,";
		}
	}
	$sqlinsere .= ") VALUES (";
	foreach ($_POST as $key => $value) {
		if($key != 'g-recaptcha-response'){
			$value = addslashes($value);
			$value = mysqli_real_escape_string($config, $value);
			$sqlinsere .= "'$value',";
		}
	}
	$sqlinsere .= ")";
	$sqlinsere = str_replace(',)', ')', $sqlinsere);
	$inserir = mysqli_query($config, $sqlinsere);
	if($inserir){	
		$mensagem  = '';
		$assunto = "Novo Currículo";
		foreach ($_POST as $key => $value) {
			if($key != 'g-recaptcha-response'){
				if($key == "email") $email = $value;
				if($key == "nome") $nome = $value;
				if($key == "assunto") $assunto = $value;
				if($key == "mensagem"){
					$mensagem .= "<b>".ucwords($key)."</b>:<br />$value <br />";
				} else {
					$mensagem .= "<b>".ucwords($key)."</b>: $value <br />";
				}
			}
		}
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		// Additional headers
		$headers .= "To: $email_nome_site <$emailsite>" . "\r\n";
		$headers .= "From: $nome <$email>" . "\r\n";
		$envia = mail("$emailsite", "$assunto", "$mensagem", $headers);
		
		if($envia){ ?>
				<script>	
				$('.load').hide();
				$(document).ready(function(){
					swal({
						title: "Currículo enviado!",
						type: "success",
						confirmButtonColor: "#222222"
					});
					$('.btn-enviar').text(textoBotao);
					$('.btn-enviar').attr('type','submit');
					$('.form')[0].reset();
					$('.note-editable.panel-body').html('');
				});
				</script>
		<?php
		}else{
			?>
				<script>	
				$(document).ready(function(){
					$('.load').hide();
					$('.btn-enviar').text(textoBotao);
					$('.btn-enviar').attr('type','submit');
					swal("Erro ao enviar email");
				});
				</script>
			<?php
		}
	}else{
	?>
	<script>	
	$(document).ready(function(){
		$('.load').hide();
		$('.btn-enviar').text(textoBotao);
		$('.btn-enviar').attr('type','submit');
		swal("Erro ao cadastrar mensagem");
	});
	</script>
	<?php } ?>
<?php }else{ ?>
<script>	
$(document).ready(function(){
	$('.load').hide();
	$('.btn-enviar').text(textoBotao);
	$('.btn-enviar').attr('type','submit');
	swal("Confirme que você não é um robo!");
});
</script>
<?php } ?>


<?php 
function uploadImagem($nImg){
  // Pasta onde o arquivo vai ser salvo
  $_UP['pasta'] = "../uploads/curriculos/";
  // Tamanho máximo do arquivo (em Bytes)
  $_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
  // Array com as extensões permitidas
  $_UP['extensoes'] = array('jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'ico', 'ICO', 'png', 'PNG', 'doc', 'docx', 'DOC', 'DOCX', 'pdf', 'PDF', 'txt');
  // Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
  $_UP['renomeia'] = false;
  // Array com os tipos de erros de upload do PHP
  $_UP['erros'][0] = 'Não houve erro';
  $_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
  $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
  $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
  $_UP['erros'][4] = 'Não foi feito o upload do arquivo';
  // Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
  if ($_FILES[$nImg]['error'] != 0) {
    $erro = $_UP['erros'][$_FILES[$nImg]['error']];
    ?>
    <script type="text/javascript">
      var erro = "<?php echo $erro ?>";
      $('.load').hide();
      swal("Não foi possível fazer o upload",erro);
    </script>
    <?php
    die($erro);
    // die("Não foi possível fazer o upload, erro:" . $_UP['erros'][$_FILES[$nImg]['error']]);
    exit; // Para a execução do script
  }
  // Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
  // Faz a verificação da extensão do arquivo
  $extensao = strtolower(end(explode('.', $_FILES[$nImg]['name'])));
  if (array_search($extensao, $_UP['extensoes']) === false) {
    echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
    exit;
  }
  // Faz a verificação do tamanho do arquivo
  if ($_UP['tamanho'] < $_FILES[$nImg]['size']) {
    echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
    exit;
  }
  // O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
  // Primeiro verifica se deve trocar o nome do arquivo
  if ($_UP['renomeia'] == true) {
    // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
    $nome_final = md5(time()).'.'.$extensao;
  } else {
    // Mantém o nome original do arquivo
    $nome_final = md5(time())."_".$_FILES[$nImg]['name'];
  }
  move_uploaded_file($_FILES[$nImg]['tmp_name'], $_UP['pasta'] . $nome_final);
  return $nome_final;
}

?>