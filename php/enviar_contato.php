<?php
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

	$sqlinsere = "INSERT INTO email_contato (";
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
		$assunto = "Contato via WebSite";

		foreach ($_POST as $key => $value) {

			if($key == "email") $email = $value;
			if($key == "nome") $nome = $value;
			if($key == "assunto") $assunto = $value;

			if($key == "mensagem"){
				$mensagem .= "<b>".ucwords($key)."</b>:<br />$value <br />";
			} else {
				$mensagem .= "<b>".ucwords($key)."</b>: $value <br />";
			}
		}

		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

		// Additional headers
		$headers .= "To: $email_nome_site <$emailsite>" . "\r\n";
		$headers .= "From: $nome <$email>" . "\r\n";

		$envia = mail("$emailsite", "$assunto", "$mensagem", $headers);
		
		if($envia){ ?>
				<script>	
				$('.load').hide();
				$(document).ready(function(){
					swal({
						title: "Mensagem enviada!",
						type: "success",
						confirmButtonColor: "#222222"
					});
					$('.btn-padrao').text(textoBotao);
					$('.btn-padrao').attr('type','submit');
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
					$('.btn-padrao').text(textoBotao);
					$('.btn-padrao').attr('type','submit');
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
		$('.btn-padrao').text(textoBotao);
		$('.btn-padrao').attr('type','submit');
		swal("Erro ao cadastrar mensagem");
	});
	</script>
	<?php } ?>
<?php }else{ ?>
<script>	
$(document).ready(function(){
	$('.load').hide();
	$('.btn-padrao').text(textoBotao);
	$('.btn-padrao').attr('type','submit');
	swal("Confirme que você não é um robo!");

});
</script>
<?php } ?>