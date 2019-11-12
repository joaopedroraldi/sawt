<?php
include("../gerenciador/cn/config.php");
// busca a biblioteca recaptcha
// require_once "recaptchalib.php";

$query_configuracoes = "SELECT * FROM configuracoes";
$configuracoes = mysqli_query($config, $query_configuracoes);
$row_configuracoes = mysqli_fetch_assoc($configuracoes);
$emailsite = $row_configuracoes['configuracoes_email_formulario'];
$email_nome_site = $row_configuracoes['configuracoes_titulo'];

// sua chave secreta
// $secret = $row_configuracoes['configuracoes_secret_key'];
 
// resposta vazia
// $response = null;
 
// verifique a chave secreta
// $reCaptcha = new ReCaptcha($secret);

// se submetido, verifique a resposta
// if ($_POST["g-recaptcha-response"]) {
// 	$response = $reCaptcha->verifyResponse(
//         $_SERVER["REMOTE_ADDR"],
//         $_POST["g-recaptcha-response"]
//     );
// }

// if($response != null && $response->success){
	extract($_POST); 

	$query_cliente = "SELECT registros_titulo, registros_email FROM registros WHERE registros_id = $cliente_id";
	$sqlcliente = mysqli_query($config, $query_cliente);
	$row_sqlcliente = mysqli_fetch_assoc($sqlcliente);
	$cliente_nome = $row_sqlcliente['registros_titulo']; 
	$cliente_email = $row_sqlcliente['registros_email']; 

	$mensagem = "
		<b>Cliente</b>
		$cliente_nome
		<br><br>
		<b>Dados de contato do responsável</b>
		<table cellpadding=10>
			<tr>
				<td><b>Nome responsável</b></td>
				<td>$br_nome_responsavel</td>
			</tr>
			<tr>
				<td><b>Telefone</b></td>
				<td>$br_telefone</td>
			</tr>
			<tr>
				<td><b>E-mail</b></td>
				<td>$br_email</td>
			</tr>
		</table>
		<br>
		<b>Assinaturas</b>
		<table cellpadding=10>
			<tr>
				<td><b>Modelo</b></td>
				<td>$br_modelo</td>
			</tr>
		</table>
		<br>
		$br_assinaturas
		";
	
	$sqlinsere = "INSERT INTO registros (registros_titulo, registros_cliente, registros_idpg, registros_texto) VALUES ('$briefing_nome', $cliente_id, 56, '$mensagem')";

	$inserir = mysqli_query($config, $sqlinsere);
	if($inserir){
		$assunto = "Briefing de Assinaturas | $cliente_nome";
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

		// Additional headers
		$headers .= "To: $email_nome_site <$emailsite>" . "\r\n";
		$headers .= "From: $cliente_nome <$cliente_email>" . "\r\n";

		$envia = mail("$emailsite", "$assunto", "$mensagem", $headers);
		
		if($envia){ ?>
				<script>	
				$('.load').hide();
				$('#briefing').hide();
				$('#obrigado').fadeIn();
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
<?php //}else{ ?>
// <script>	
// $(document).ready(function(){
// 	$('.load').hide();
// 	$('.btn-padrao').text(textoBotao);
// 	$('.btn-padrao').attr('type','submit');
// 	swal("Confirme que você não é um robo!");

// });
// </script>
<?php // } ?>