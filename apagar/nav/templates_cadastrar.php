<!-- include summernote css/js-->
<link href="js/summernote/summernote.css" rel="stylesheet">
<script src="js/summernote/summernote.js"></script>

<!-- Page Heading -->
<div class="row">
    <div class="col-sm-9">
        <h1 class="page-header">
            Cadastrar template
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
               Cadastrar template
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form id="templates_cadastrar" method="post" enctype="multipart/form-data" class="form">
            <div class="form-group">
                <label>Titulo</label>
                <input name="templates_titulo" class="form-control texto-titulo" type="text">
            </div>

            <div class="form-group">
                <label>Imagem destaque</label>
                <input name="templates_imagem" class="form-control" type="file">
            </div>
            <div class="clear10"></div>
            <div class="form-group">
                <label class="paginas-opcoes"><input value="0" name="templates_header" type="hidden"><input value="1" name="templates_header" type="checkbox"> Header</label>
                <label class="paginas-opcoes"><input value="0" name="templates_footer" type="hidden"><input value="1" name="templates_footer" type="checkbox"> Footer</label>
            </div>
            <div class="clear10"></div>

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
                            <option value="<?php echo $template; ?>"><?php echo $template; ?></option>
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
                <input name="templates_tags" class="form-control" type="text">
            </div>

            <div class="clear20"></div>
            <input type="submit" class="btn btn-primary" value="Cadastrar">
        </form>
    </div>
</div>
<div class="clear10"></div>


<div id="retorno"></div>
