<!-- include summernote css/js-->
<link href="js/summernote/summernote.css" rel="stylesheet">
<script src="js/summernote/summernote.js"></script>

<?php 
$id = $_GET['id'];
$query = "SELECT * FROM registros WHERE registros_id = $id";
$registros = mysqli_query($config, $query) or die(mysqli_error());
$row_registros = mysqli_fetch_assoc($registros);

$idcliente = $row_registros['registros_cliente'];
$queryCliente = "SELECT registros_titulo, registros_cliente_key FROM registros WHERE registros_id = $idcliente";
$cliente = mysqli_query($config, $queryCliente) or die(mysqli_error());
$row_cliente = mysqli_fetch_assoc($cliente);
?>
<!-- Page Heading -->
<div class="row">
    <div class="col-sm-9">
        <h1 class="page-header">
            Contrato #<?php echo $id ?>
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
               Contrato #<?php echo $id ?>
            </li>
        </ol>
    </div>
</div>

<!-- /.row -->
<div id="imprimir">
    <style type="text/css">
    .hollow{background: #eee;}
    .table th{background: #eee;}
    @media print {
        #contrato{padding: 20px; font-family: Arial; font-size:13px;}
        #contrato h4{font-size: 16px;}
        #contrato table{font-size: 14px;}
    }
    </style>
    <div id="contrato">
        <?php echo $row_registros['registros_texto']; ?>
    </div>
</div>
<div class="clear20"></div>
<form id="notificar" method="post" enctype="multipart/form-data" >
    <input type="hidden" value="<?php echo $_GET['id'] ?>" name="idcontrato">
    <textarea style="display:none" name="contrato_texto">
        <?php echo $row_registros['registros_texto']; ?>

        <br><br><br>  
        Para ver detalhes de seus contratos e briefings acesse https://webthomaz.com/sawt e entre com sua chave: <?php echo $row_cliente['registros_cliente_key'] ?>
    </textarea>
    <button type="submit" class="btn btn-success">Notificar por e-mail</button>
    <button onclick="imprimir()" type="button" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</button>
</form>

<div id="retorno"></div>
<div class="clear20"></div>

<script type="text/javascript">

    function imprimir(){
        var conteudo = $('#imprimir').html();
        tela_impressao = window.open('about:blank');
        tela_impressao.document.write(conteudo);
        tela_impressao.window.print();
        tela_impressao.window.close();
    }

</script>