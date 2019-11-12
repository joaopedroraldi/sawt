<?php
error_reporting(0);
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
  return $nome_final;
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