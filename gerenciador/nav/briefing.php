<!-- include summernote css/js-->
<link href="js/summernote/summernote.css" rel="stylesheet">
<script src="js/summernote/summernote.js"></script>

<?php 
$id = $_GET['id'];
$query = "SELECT * FROM registros WHERE registros_id = $id";
$registros = mysqli_query($config, $query) or die(mysqli_error());
$row_registros = mysqli_fetch_assoc($registros);
?>
<!-- Page Heading -->
<div class="row">
    <div class="col-sm-9">
        <h1 class="page-header">
            Briefing #<?php echo $id ?>
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
                <a href="index.php?page=registros&id=56">briefings</a>
            </li>
            <li class="active">
               Briefing #<?php echo $id ?>
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
        #briefing{padding: 20px; font-family: Arial; font-size:13px;}
        #briefing h4{font-size: 16px;}
        #briefing table{font-size: 14px;}
    }
    </style>
    <div id="briefing">
        <?php echo $row_registros['registros_texto']; ?>
    </div>
</div>
<div class="clear20"></div>

<button onclick="imprimir()" type="button" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</button>


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