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
		<b>Perguntas</b>
		<table cellpadding=10>
			<tr>
				<td><b>Qual é o plano contratado?</b></td>
				<td>$br_pergunta_1</td>
			</tr>
			<tr>
				<td><b>O que é?</b></td>
				<td>$br_pergunta_2</td>
			</tr>
			<tr>
				<td><b>Tem site ou redes sociais? se sim, qual o link?</b></td>
				<td>$br_pergunta_3</td>
			</tr>
			<tr>
				<td><b>Qual nome e elementos deverão compor o logo?</b></td>
				<td>$br_pergunta_4</td>
			</tr>
			<tr>
				<td><b>Como você descreveria seus produtos e serviços?</b></td>
				<td>$br_pergunta_5</td>
			</tr>
			<tr>
				<td><b>Quais as metas a longo prazo do seu projeto?</b></td>
				<td>$br_pergunta_6</td>
			</tr>
			<tr>
				<td><b>Por quê busca um novo logotipo e quais as sensações deverão ser passadas através dele?</b></td>
				<td>$br_pergunta_7</td>
			</tr>
			<tr>
				<td><b>Quais são os seus concorrentes e se eles tiverem site, liste-os</b></td>
				<td>$br_pergunta_8</td>
			</tr>
			<tr>
				<td><b>Qual o seu diferencial perante seus concorrentes?</b></td>
				<td>$br_pergunta_9</td>
			</tr>
			<tr>
				<td><b>Qual o perfil do seu público?</b></td>
				<td>$br_pergunta_10</td>
			</tr>
			<tr>
				<td><b>Possui algum slogan?</b></td>
				<td>$br_pergunta_11</td>
			</tr>
			<tr>
				<td><b>Qual é a sua ideia ou algo que gostaria que tivesse no logotipo?</b></td>
				<td>$br_pergunta_12</td>
			</tr>
			<tr>
				<td><b>Possui preferencia de cor?</b></td>
				<td>$br_pergunta_13</td>
			</tr>
			<tr>
				<td><b>Existe alguma cor que não gostaria?</b></td>
				<td>$br_pergunta_14</td>
			</tr>
			<tr>
				<td><b>Algum ícone gostaria de ter?</b></td>
				<td>$br_pergunta_15</td>
			</tr>
			<tr>
				<td><b>Quais são os adjetivos que melhor descrevem o seu logotipo?</b></td>
				<td>$br_pergunta_16</td>
			</tr>
			<tr>
				<td><b>Que mensagem e qual sensação quer que o logotipo transmita?</b></td>
				<td>$br_pergunta_17</td>
			</tr>
			<tr>
				<td><b>Cite pelo menos 5 logotipos que você gosta</b></td>
				<td>$br_pergunta_18</td>
			</tr>
			<tr>
				<td><b>Como você deseja que apareça a tipografia?</b></td>
				<td>$br_pergunta_19</td>
			</tr>
			<tr>
				<td><b>Onde usará o logotipo?</b></td>
				<td>$br_pergunta_20</td>
			</tr>
			<tr>
				<td><b>Informações adicionais</b></td>
				<td>$br_pergunta_21</td>
			</tr>

		</table>";
	
	$sqlinsere = "INSERT INTO registros (registros_titulo, registros_cliente, registros_idpg, registros_texto) VALUES ('$briefing_nome', $cliente_id, 56, '$mensagem')";

	$inserir = mysqli_query($config, $sqlinsere);
	if($inserir){
		$assunto = "Briefing de Arte Gráfica | $cliente_nome";
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