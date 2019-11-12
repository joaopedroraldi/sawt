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
		<b>Nome do negócio: </b>$br_nome
		<br><br>
		<b>Dados de contato que deverão constar no site</b>
		<table cellpadding=10>
			<tr>
				<td><b>CEP</b></td>
				<td>$br_cep</td>
			</tr>
			<tr>
				<td><b>Cidade</b></td>
				<td>$br_cidade</td>
			</tr>
			<tr>
				<td><b>Estado</b></td>
				<td>$br_estado</td>
			</tr>
			<tr>
				<td><b>Bairro</b></td>
				<td>$br_bairro</td>
			</tr>
			<tr>
				<td><b>Endereço</b></td>
				<td>$br_endereco, $br_numero</td>
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
		<b>Redes sociais</b>
		<table cellpadding=10>
			<tr>
				<td><b>Facebook</b></td>
				<td>$br_facebook</td>
			</tr>
			<tr>
				<td><b>Instagram</b></td>
				<td>$br_instagram</td>
			</tr>
			<tr>
				<td><b>Whatsapp</b></td>
				<td>$br_whatsapp</td>
			</tr>
			<tr>
				<td><b>Linkedin</b></td>
				<td>$br_linkedin</td>
			</tr>
			<tr>
				<td><b>Youtube</b></td>
				<td>$br_youtube</td>
			</tr>
		</table>
		<br>
		<br>
		
		<table cellpadding=10>
			<tr>
				<td><b>Tipo de site</b></td>
				<td>$br_tipo_site</td>
			</tr>
			<tr>
				<td><b>Já tem um site? Se sim, qual é o link?</b></td>
				<td>$br_pergunta_1</td>
			</tr>
			<tr>
				<td><b>Já tem um domínio? Se não, qual será o domínio?</b></td>
				<td>$br_pergunta_2</td>
			</tr>
			<tr>
				<td><b>Fale sobre seu negócio:</b></td>
				<td>$br_pergunta_3</td>
			</tr>
			<tr>
				<td><b>Qual é o seu objetivo com o site?</b></td>
				<td>$br_pergunta_4</td>
			</tr>
			<tr>
				<td><b>Cite alguns concorrentes, se possível liste os sites deles:</b></td>
				<td>$br_pergunta_5</td>
			</tr>
			<tr>
				<td><b>Qual é o perfil do seu público?</b></td>
				<td>$br_pergunta_6</td>
			</tr>
			<tr>
				<td><b>Que páginas o site deverá ter?</b></td>
				<td>$br_pergunta_7</td>
			</tr>
			<tr>
				<td><b>Qual será o estilo e cores?</b></td>
				<td>$br_pergunta_8</td>
			</tr>
			<tr>
				<td><b>Existe algum ou alguns sites que você tem como referência? Liste os links.</b></td>
				<td>$br_pergunta_9</td>
			</tr>
			<tr>
				<td><b>Descreva abaixo qualquer informação adicional que queria nos passar para que seu site fique completo.</b></td>
				<td>$br_pergunta_10</td>
			</tr>
		</table>
	";
	
	$sqlinsere = "INSERT INTO registros (registros_titulo, registros_cliente, registros_idpg, registros_texto) VALUES ('$briefing_nome', $cliente_id, 56, '$mensagem')";

	$inserir = mysqli_query($config, $sqlinsere);
	if($inserir){
		$assunto = "Briefing de WebSite | $cliente_nome";
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