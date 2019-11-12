<?php 
error_reporting(0);
function uploadImagem($pasta, $nImg){
  // Pasta onde o arquivo vai ser salvo
  $_UP['pasta'] = "$pasta";
    // $_UP['pasta'] = "../uploads/";
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
    $nome_final = md5(time()).'.jpg';
  } else {
    // Mantém o nome original do arquivo
    $nome_final = $_FILES[$nImg]['name'];
  }
  move_uploaded_file($_FILES[$nImg]['tmp_name'], $_UP['pasta'] . $nome_final);
}



//REMOVE CARACTERES ESPECIAIS, ACENTOS E ESPAÇOS
function removeAcentos($string, $slug = '-') {

  // Caracteres a serem mantidos so que decodificados
  $table = array(
  'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'Ž'=>'Z', '.'=>' ',
  'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
  'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
  'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
  'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
  'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
  'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
  'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
  'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
  'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
  'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
  'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
  'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
  'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
  'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r',
  );

  // Traduz os caracteres em $string, baseado no vetor $table
  $string = strtr($string, $table);

  // Converte para minúsculo
  $string = strtolower($string);

  // Remove caracteres indesejáveis (que não estão no padrão)
  $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);

  // Remove múltiplas ocorrências de hífens ou espaços
  $string = preg_replace("/[\s-]+/", " ", $string);

  // Faz a retirada de espaços multiplos no texto para evitar que a url fique com mais de uma hifen entre os espaçamentos
  $string = trim($string);

  // Transforma espaços e underscores em $slug
  $string = preg_replace("/[\s_]/", $slug, $string);

  // retorna a string
  return $string;
}



function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false){
  $lmin = 'abcdefghijklmnopqrstuvwxyz';
  $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $num = '1234567890';
  $simb = '!@#$%*-';
  $retorno = '';
  $caracteres = '';
  $caracteres .= $lmin;
  if ($maiusculas) $caracteres .= $lmai;
  if ($numeros) $caracteres .= $num;
  if ($simbolos) $caracteres .= $simb;
  $len = strlen($caracteres);
  for ($n = 1; $n <= $tamanho; $n++) {
  $rand = mt_rand(1, $len);
  $retorno .= $caracteres[$rand-1];
  }

  return $retorno;
}


function delTree($dir) { 
  $files = array_diff(scandir($dir), array('.','..')); 
  foreach ($files as $file) { 
    (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
  } 
  return rmdir($dir); 
}


function abreviaString($texto, $limite, $tres_p = '...'){
    $totalCaracteres = 0;
    $texto = somenteTexto($texto);
    $vetorPalavras = explode(" ",$texto);
    if(strlen($texto) <= $limite):
        $tres_p = "";
        $novoTexto = $texto;
    else:
        $novoTexto = "";
        for($i = 0; $i <count($vetorPalavras); $i++):
            $totalCaracteres += strlen(" ".$vetorPalavras[$i]);
            if($totalCaracteres <= $limite)
                $novoTexto .= ' ' . $vetorPalavras[$i];
            else break;
        endfor;
    endif;
    return $novoTexto . $tres_p;
}

function somenteTexto($string){
    $trans_tbl = get_html_translation_table(HTML_ENTITIES);
    $trans_tbl = array_flip($trans_tbl);
    return trim(strip_tags(strtr($string, $trans_tbl)));
}
?>
