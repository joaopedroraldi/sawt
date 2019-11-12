<style type="text/css">
</style>
<!-- include summernote css/js-->
<link href="js/summernote/summernote.css" rel="stylesheet">
<script src="js/summernote/summernote.js"></script>

<?php 
$id = $_GET['id'];
$query = "SELECT * FROM registros WHERE registros_id = $id";
$registros = mysqli_query($config, $query) or die(mysqli_error());
$row_registros = mysqli_fetch_assoc($registros);
$idcliente = $row_registros['registros_cliente'];
$idplano = $row_registros['registros_plano'];
$idpg = $row_registros['registros_idpg'];

$query = "SELECT * FROM registros WHERE registros_id = $idcliente";
$cliente = mysqli_query($config, $query) or die(mysqli_error());
$row_cliente = mysqli_fetch_assoc($cliente);

$query = "SELECT registros_titulo, registros_texto FROM registros WHERE registros_id = $idplano";
$plano = mysqli_query($config, $query) or die(mysqli_error());
$row_plano = mysqli_fetch_assoc($plano);
?>
<!-- Page Heading -->
<div class="row">
    <div class="col-sm-9">
        <h1 class="page-header">
            Gerar Contrato #<?php echo $id ?>
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
            </li>
            <li>
                <a href="index.php?page=registros&id=55">Contratos</a>
            </li>
            <li class="active">
              Gerar Contrato #<?php echo $id ?>
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<form id="contrato_editar" method="post" enctype="multipart/form-data" class="form">
    <input name="registros_id" class="form-control" type="hidden" value="<?php echo $_GET['id'] ?>">
    <input name="registros_idpg" class="form-control" type="hidden" value="<?php echo $idpg ?>">
    <div class="form-group">
        <textarea name="registros_texto" id="contrato_texto">
            <br><br>
            <img src="https://webthomaz.com.br/img/logo-thomaz.png">
            <br><br>
            <h3><b>CONTRATO DE PRESTAÇÃO DE SERVIÇOS</b></h3>
            <h6><?php 
            $dataContrato = explode('-', $row_registros['registros_data']);
            echo $dataContrato = "Cascavel, ". $dataContrato[2]."/".$dataContrato[1]."/".$dataContrato[0]
            ?></h6>
            <br>
            <h3>Contratada</h3>
            <table width="100%">
                <tr>
                    <th style="padding:5px; text-align:left" bgcolor="#eee">Nome fantasia</th>
                    <th style="padding:5px; text-align:left" bgcolor="#eee">RAZÃO SOCIAL</th>
                    <th style="padding:5px; text-align:left" bgcolor="#eee">CNPJ / CPF</th>
                </tr>
                <tr>
                    <td style="padding:5px; text-align:left">WEB THOMAZ</td>
                    <td style="padding:5px; text-align:left">HENDRY THOMAZ HERINGER NEGÓCIOS DIGITAIS ME</td>
                    <td style="padding:5px; text-align:left">14.582.628/0001-57</td>
                </tr>
                <tr>
                    <th style="padding:5px; text-align:left" bgcolor="#eee">Endereço</th>
                    <th style="padding:5px; text-align:left" bgcolor="#eee">Cidade / UF</th>
                    <th style="padding:5px; text-align:left" bgcolor="#eee">CEP</th>
                </tr>
                <tr>
                    <td style="padding:5px; text-align:left">RUA 7 DE SETEMBRO 1954</td>
                    <td style="padding:5px; text-align:left">CASCAVEL / PR</td>
                    <td style="padding:5px; text-align:left">85802-100</td>
                </tr>
            </table>
            <h3>Contratante</h3>
            <table width="100%">
                <tr>
                    <th style="padding:5px; text-align:left" bgcolor="#eee">Nome fantasia</th>
                    <th style="padding:5px; text-align:left" bgcolor="#eee">CNPJ / CPF</th>
                    <th style="padding:5px; text-align:left" bgcolor="#eee">Nome do responsável</th>
                </tr>
                <tr>
                    <td style="padding:5px; text-align:left"><?php echo $row_cliente['registros_titulo'] ?></td>
                    <td style="padding:5px; text-align:left"><?php echo $row_cliente['registros_cnpj'] ?></td>
                    <td style="padding:5px; text-align:left"><?php echo $row_cliente['registros_nome_responsavel'] ?></td>
                </tr>
                <tr>
                    <th style="padding:5px; text-align:left" bgcolor="#eee">Endereço</th>
                    <th style="padding:5px; text-align:left" bgcolor="#eee">Cidade</th>
                    <th style="padding:5px; text-align:left" bgcolor="#eee">Estado</th>
                </tr>
                <tr>
                    <td style="padding:5px; text-align:left"><?php echo $row_cliente['registros_endereco'] ?></td>
                    <td style="padding:5px; text-align:left"><?php echo $row_cliente['registros_cidade'] ?></td>
                    <td style="padding:5px; text-align:left"><?php echo $row_cliente['registros_estado'] ?></td>
                </tr>
                <tr>
                    <th style="padding:5px; text-align:left" bgcolor="#eee">CEP</th>
                    <th style="padding:5px; text-align:left" bgcolor="#eee">Fone Fixo</th>
                    <th style="padding:5px; text-align:left" bgcolor="#eee">Whatsapp</th>
                </tr>
                <tr>
                    <td style="padding:5px; text-align:left"><?php echo $row_cliente['registros_cep'] ?></td>
                    <td style="padding:5px; text-align:left"><?php echo $row_cliente['registros_fone_fixo'] ?></td>
                    <td style="padding:5px; text-align:left"><?php echo $row_cliente['registros_whatsapp'] ?></td>
                </tr>
            </table>
            <h3>Condições e pagamento</h3>
            <table width="100%">
                <tr>
                    <th style="padding:5px; text-align:left" bgcolor="#eee">Valor do negócio</th>
                    <th style="padding:5px; text-align:left" bgcolor="#eee">Formato de pagamento</th>
                </tr>
                <tr>
                    <td style="padding:5px; text-align:left"><?php echo $row_registros['registros_valor'] ?></td>
                    <td style="padding:5px; text-align:left"><?php echo $row_registros['registros_condicoes'] ?></td>
                </tr>
            </table>
            <h3>Serviço Contratado</h3>
            <h4><?php echo $row_plano['registros_titulo'] ?></h4>
            <?php echo $row_plano['registros_texto']; ?>
            <br><br>
            <?php echo $dataContrato; ?>
        </textarea>
    </div>
    <div class="clear20"></div>
    <input type="submit" class="btn btn-primary" value="Salvar e gerar contrato">
</form>
<div id="retorno"></div>


<script>
    $(document).ready(function(){  
       $('#contrato_texto').summernote({
            height: 800,
            callbacks: {
                onImageUpload : function(files, editor, welEditable) {

                     for(var i = files.length - 1; i >= 0; i--) {
                             sendFile(files[i], this);
                    }
                }
            }
        });

        function sendFile(file, el) {
            var form_data = new FormData();
            form_data.append('file', file);
            $.ajax({
                data: form_data,
                type: "POST",
                url: 'php/uploader.php',
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    $(el).summernote('editor.insertImage', url);
                }
            });
        }
    });
    function copyToClipboard(element) {
      var $temp = $("<input>");
      $("body").append($temp);
      $temp.val($(element).text()).select();
      document.execCommand("copy");
      $temp.remove();
    }
</script>