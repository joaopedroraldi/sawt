<?php 
$template_id = $_GET['id'];
$query = "SELECT * FROM templates WHERE templates_id = $template_id";
$templates = mysqli_query($config, $query) or die(mysqli_error());
$row_templates = mysqli_fetch_assoc($templates);
?>
<!-- include summernote css/js-->
<link href="js/summernote/summernote.css" rel="stylesheet">
<script src="js/summernote/summernote.js"></script>

<!-- Page Heading -->
<div class="row">
    <div class="col-sm-9">
        <h1 class="page-header">
            Editar template <?php echo $row_templates['templates_titulo'] ?>
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
                <a href="index.php?page=templates">Templates</a>
            </li>
            <li class="active">
               Editar template <?php echo $row_templates['templates_titulo'] ?>
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form id="templates_editar" method="post" enctype="multipart/form-data" class="form">
            <input name="templates_id" type="hidden" value="<?php echo $row_templates['templates_id'] ?>">
            <div class="form-group">
                <label>Titulo</label>
                <input name="templates_titulo" class="form-control texto-titulo" type="text" value="<?php echo $row_templates['templates_titulo'] ?>">
            </div>

            <div class="form-group">
                <label>Imagem Destaque</label>
                <div class="clear"></div>
                <?php if(!empty($row_templates['templates_imagem'])){ ?>
                <div class="thumbnail" style="float:left;padding:10px; width:150px; height:150px;"><img src="<?php echo RAIZ_ADMIN ?>timthumb.php?src=<?php echo RAIZ_ADMIN ?>uploads/templates/<?php echo $row_templates['templates_imagem'] ?>&zc=2&w=150&h=150"></div>
                <input name="templates_imagem" class="form-control" value="<?php echo $row_templates['templates_imagem'] ?>" type="hidden">
                <?php }?>
                <input name="templates_imagem_nova" class="form-control" type="file">
            </div>

            <div class="form-group">
                <label>Arquivo</label>
                <div class="panel panel-default">
                  <div class="panel-body">
                    <p style="font-size:12px; color:#999"><i class="fa fa-info-circle"></i> Para criar um template, apenas crie o arquivo e coloque na pasta "templates".</p>
                    
                    <?php
                    $diretorio = scandir("../templates/sections/");
                    $pasta = "../templates/sections/";

                    $files = glob($pasta.'/*.php');
                    natsort($files);
                    ?>
                    <select name="templates_arquivo" class="form-control">
                        <option selected="selected" disabled="disabled">Escolha um template</option>
                        <?php
                        foreach ($files as $key => $value) {
                            $template = explode('/', $value);
                            $template = end($template);
                            ?>
                            <option value="<?php echo $template; ?>" <?php if($row_templates['templates_arquivo'] == $template){echo "selected='selected'";} ?>><?php echo $template; ?></option>
                            <?php 
                        } 
                        ?>
                    </select>
                    <div class="clear10"></div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Tags</label>
                <input name="templates_tags" class="form-control" type="text" value="<?php echo $row_templates['templates_tags'] ?>">
            </div>

            <div class="clear20"></div>
            <input type="submit" class="btn btn-primary" value="Cadastrar">
        </form>
    </div>
</div>
<div class="clear10"></div>


<div id="retorno"></div>
