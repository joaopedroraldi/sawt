<?php 
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
  if ($_FILES['file']['error'] != 0) {
    $erro = $_UP['erros'][$_FILES['file']['error']];
    ?>
    <script type="text/javascript">
      var erro = "<?php echo $erro ?>";
      $('.load').hide();
      swal("Não foi possível fazer o upload",erro);
    </script>
    <?php
    die($erro);
    // die("Não foi possível fazer o upload, erro:" . $_UP['erros'][$_FILES['file']['error']]);
    exit; // Para a execução do script
  }
  // Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
  // Faz a verificação da extensão do arquivo
  // $nomeArquivo = $_FILES['file']['name'];
  // $extensao = strtolower(end(explode('.', $nomeArquivo)));

  // if (array_search($extensao, $_UP['extensoes']) === false) {
  //   echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
  //   exit;
  // }
  // Faz a verificação do tamanho do arquivo
  if ($_UP['tamanho'] < $_FILES['file']['size']) {
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
    $nome_final = time()."_".$_FILES['file']['name'];
  }
  move_uploaded_file($_FILES['file']['tmp_name'], $_UP['pasta'] . $nome_final);

  // echo $_UP['pasta'] . $nome_final;
  echo 'uploads/' . $nome_final;
?>