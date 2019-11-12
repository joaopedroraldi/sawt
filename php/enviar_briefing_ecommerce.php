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
	if($_FILES['br_doc']['name'] != ""){$_POST['br_doc'] = "<a href=http://{$_SERVER["SERVER_NAME"]}".RAIZ."/uploads/".uploadImagem('br_doc').">".uploadImagem('br_doc')."</a>";}
	if($_FILES['br_doc_verso']['name'] != ""){$_POST['br_doc_verso'] = "<a href=http://{$_SERVER["SERVER_NAME"]}".RAIZ."/uploads/".uploadImagem('br_doc_verso').">".uploadImagem('br_doc_verso')."</a>";}
	if($_FILES['br_doc_selfie']['name'] != ""){$_POST['br_doc_selfie'] = "<a href=http://{$_SERVER["SERVER_NAME"]}".RAIZ."/uploads/".uploadImagem('br_doc_selfie').">".uploadImagem('br_doc_selfie')."</a>";}
	if($_FILES['br_doc_cresidencia']['name'] != ""){$_POST['br_doc_cresidencia'] = "<a href=http://{$_SERVER["SERVER_NAME"]}".RAIZ."/uploads/".uploadImagem('br_doc_cresidencia').">".uploadImagem('br_doc_cresidencia')."</a>";}
	
	extract($_POST); 
	
	$query_cliente = "SELECT registros_titulo, registros_email FROM registros WHERE registros_id = $cliente_id";
	$sqlcliente = mysqli_query($config, $query_cliente);
	$row_sqlcliente = mysqli_fetch_assoc($sqlcliente);
	$cliente_nome = $row_sqlcliente['registros_titulo']; 
	$cliente_email = $row_sqlcliente['registros_email']; 

	$br_politica_entrega = addslashes(htmlspecialchars($br_politica_entrega));
	$br_contrato_de_compra = addslashes(htmlspecialchars($br_contrato_de_compra));
	$br_condicoes_de_troca = addslashes(htmlspecialchars($br_condicoes_de_troca));
	$br_duvidas_frequentes = addslashes(htmlspecialchars($br_duvidas_frequentes));

	$mensagem = "
		<b>Dados de contato do responsável</b>
		<br><br>
		<table cellpadding=10>
			<tr>
				<td><b>Nome completo</b></td>
				<td>$br_nome_completo</td>
			</tr>
			<tr>
				<td><b>CPF</b></td>
				<td>$br_cpf</td>
			</tr>
			<tr>
				<td><b>Data de nascimento</b></td>
				<td>$br_data_nascimento</td>
			</tr>
			<tr>
				<td><b>Celular</b></td>
				<td>$br_celular</td>
			</tr>
			<tr>
				<td><b>E-mail</b></td>
				<td>$br_email</td>
			</tr>
		</table>
		<br>
		<b>Endereço do responsável</b>
		<br><br>
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
				<td>$br_endereco</td>
			</tr>
			<tr>
				<td><b>Número</b></td>
				<td>$br_numero</td>
			</tr>
		</table>
		<br>
		<b>Documentos do Responsável</b>
		<table cellpadding=10>
		";
		if(isset($br_doc)){
		$mensagem .="
			<tr>
				<td><b>CNH ou RG Frente</b></td>
				<td>$br_doc</td>
			</tr>
			";
		}
		if(isset($br_doc_verso)){
			$mensagem .="
			<tr>
				<td><b>CNH ou RG Verso</b></td>
				<td>$br_doc_verso</td>
			</tr>
		";
		}
		if(isset($br_doc_selfie)){
			$mensagem .="
			<tr>
				<td><b>Selfie do responsável segurando o documento</b></td>
				<td>$br_doc_selfie</td>
			</tr>
		";
		}
		if(isset($br_doc_cresidencia)){
			$mensagem .="
			<tr>   
				<td><b>Comprovante de residência</b></td>
				<td>$br_doc_cresidencia</td>
			</tr>
		";
		}
		$mensagem .="
		</table>
		<br><br>
		<b>Dados de contato que deverão constar no site</b>";

	if($br_contatos_site != 1){
		$mensagem .="
		<table cellpadding=10>
			<tr>
				<td><b>Razão social</b></td>
				<td>$br_loja_razao_social</td>
			</tr>
			<tr>
				<td><b>CNPJ</b></td>
				<td>$br_loja_cnpj</td>
			</tr>
			<tr>
				<td><b>CEP</b></td>
				<td>$br_loja_cep</td>
			</tr>
			<tr>
				<td><b>Cidade</b></td>
				<td>$br_loja_cidade</td>
			</tr>
			<tr>
				<td><b>Estado</b></td>
				<td>$br_loja_estado</td>
			</tr>
			<tr>
				<td><b>Bairro</b></td>
				<td>$br_loja_bairro</td>
			</tr>
			<tr>
				<td><b>Endereço</b></td>
				<td>$br_loja_endereco, $br_loja_numero</td>
			</tr>
			<tr>
				<td><b>Telefone</b></td>
				<td>$br_loja_telefone</td>
			</tr>
			<tr>
				<td><b>E-mail</b></td>
				<td>$br_loja_email</td>
			</tr>
		</table>";
	}
	
	$mensagem .="	
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
				<td><b>Qual é o nome do seu negócio?</b></td>
				<td>$br_nome</td>
			</tr>
			<tr>
				<td><b>Que produtos serão vendidos na loja virtual?</b></td>
				<td>$br_pergunta_1</td>
			</tr>
			<tr>
				<td><b>Já tem um domínio? Se não, qual será o domínio?</b></td>
				<td>$br_pergunta_2</td>
			</tr>
			<tr>
				<td><b>Se possível, informe os departamentos que serão divididos os produtos</b></td>
				<td>$br_pergunta_3</td>
			</tr>
		</table>
		<br><b>Forma de pagamento</b>
	";

	if($temcontamp == 1){
		$mensagem .="
		<table cellpadding=10>
			<tr>
				<td><b>Tem conta mercado pago</b></td>
				<td>$br_conta_mp</td>
			</tr>
		</table>
		";
	}elseif($temcontamp == 2){
		$mensagem .="
		<table cellpadding=10>
			<tr>
				<td><b>Tem conta mercado pago?</b></td>
				<td>Eu não tenho conta no mercado pago, mas autorizo a Web Thomaz a criar uma com meus dados</td>
			</tr>
		</table>";
	}elseif($temcontamp == 3){
		$mensagem .="
		<table cellpadding=10>
			<tr>
				<td><b>Não tem conta mercado pago, quer usar outro</b></td>
				<td>$br_conta_outra</td>
			</tr>
		</table>";
	}

	$mensagem .="
	<table cellpadding=10>
		<tr>
			<td><b>Política de entrega</b></td>
			<td>$br_politica_entrega</td>
		</tr>
		<tr>
			<td><b>Condições de troca e devolução</b></td>
			<td>$br_condicoes_de_troca</td>
		</tr>
		<tr>
			<td><b>Contrato de compra</b></td>
			<td>$br_contrato_de_compra</td>
		</tr>
		<tr>
			<td><b>Dúvidas Frequentes (FAQ)</b></td>
			<td>$br_duvidas_frequentes</td>
		</tr>
		<tr>
			<td><b>Informações Adicionais</b></td>
			<td>$br_pergunta_10</td>
		</tr>
	</table>";

	$sqlinsere = "INSERT INTO registros (registros_titulo, registros_cliente, registros_idpg, registros_texto) VALUES ('$briefing_nome', $cliente_id, 56, '$mensagem')";

	$inserir = mysqli_query($config, $sqlinsere);
	if($inserir){
		$assunto = "Briefing de E-commerce | $cliente_nome";
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

<?php 
function uploadImagem($nImg){
  // Pasta onde o arquivo vai ser salvo
  $_UP['pasta'] = "../uploads/";
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
  $nomeArquivo = $_FILES[$nImg]['name'];
  $nomeArquivo = explode('.', $nomeArquivo);
  $extensao = end($nomeArquivo);
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

  echo $nome_final;
}

?>