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

	$tipo_consultoria = "";

	if($br_tipo_consultoria){
		foreach ($br_tipo_consultoria as $key => $value) {
			$tipo_consultoria .= $value. ", ";
		}
	}

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
				<td><b>Tipo de consultoria</b></td>
				<td>$tipo_consultoria</td>
			</tr>
			<tr>
				<td><b>O que é o seu negócio?</b></td>
				<td>$br_pergunta_1</td>
			</tr>
			<tr>
				<td><b>Já tem site ou redes sociais? se sim, qual o link?</b></td>
				<td>$br_pergunta_2</td>
			</tr>
			<tr>
				<td><b>Quantos anos tem a sua empresa?</b></td>
				<td>$br_pergunta_3</td>
			</tr>
			<tr>
				<td><b>Quantos funcionários?</b></td>
				<td>$br_pergunta_4</td>
			</tr>
			<tr>
				<td><b>Seu negócio é online, físico ou você vai até o cliente?</b></td>
				<td>$br_pergunta_5</td>
			</tr>
			<tr>
				<td><b>Como você descreveria seus produtos e serviços?</b></td>
				<td>$br_pergunta_6</td>
			</tr>
			<tr>
				<td><b>Quais as metas a longo prazo do seu projeto?</b></td>
				<td>$br_pergunta_7</td>
			</tr>
			<tr>
				<td><b>Por quê busca a consultoria e qual é a sua expectativa?</b></td>
				<td>$br_pergunta_8</td>
			</tr>
			<tr>
				<td><b>Quais são os seus concorrentes e se eles tiverem site ou redes sociais, liste-os</b></td>
				<td>$br_pergunta_9</td>
			</tr>
			<tr>
				<td><b>Qual o seu diferencial perante seus concorrentes?</b></td>
				<td>$br_pergunta_10</td>
			</tr>
			<tr>
				<td><b>Qual o perfil do seu público?</b></td>
				<td>$br_pergunta_11</td>
			</tr>
			<tr>
				<td><b>Como é o seu cliente?</b></td>
				<td>$br_pergunta_12</td>
			</tr>
			<tr>
				<td><b>Quais são as categorias/departamentos de produtos ou serviços que você pretende desenvolver?</b></td>
				<td>$br_pergunta_13</td>
			</tr>
			<tr>
				<td><b>Liste quais são os conteúdos que deveremos desenvolver?</b></td>
				<td>$br_pergunta_14</td>
			</tr>
			<tr>
				<td><b>Como você vende hoje?</b></td>
				<td>$br_pergunta_15</td>
			</tr>
			<tr>
				<td><b>Você tem uma equipe de vendas?</b></td>
				<td>$br_pergunta_16</td>
			</tr>
			<tr>
				<td><b>Quais serão as formas de contato para o seu cliente chegar até você?</b></td>
				<td>$br_pergunta_17</td>
			</tr>
			<tr>
				<td><b>Qual é a sua ideia e como gostaria de vender com a nossa consultoria?</b></td>
				<td>$br_pergunta_18</td>
			</tr>
			<tr>
				<td><b>Quanto está disposto a investir em anúncios mensalmente?</b></td>
				<td>$br_pergunta_19</td>
			</tr>
			<tr>
				<td><b>Quais são os adjetivos que melhor descrevem a sua empresa?</b></td>
				<td>$br_pergunta_20</td>
			</tr>
			<tr>
				<td><b>Que mensagem e qual sensação quer que os nossos conteúdos devem transmitir?</b></td>
				<td>$br_pergunta_21</td>
			</tr>
			<tr>
				<td><b>Cite pelo menos 5 empresas que você gosta, independente que seja de outro segmento, e diga o que gosta em particular de cada um:</b></td>
				<td>$br_pergunta_22</td>
			</tr>
			<tr>
				<td><b>Informações adicionais</b></td>
				<td>$br_pergunta_23</td>
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