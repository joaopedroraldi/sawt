<?php 
$id = $_GET['id'];
$query = "SELECT * FROM paginas WHERE paginas_id = $id";
$paginas = mysqli_query($config, $query) or die(mysqli_error());
$row_paginas = mysqli_fetch_assoc($paginas);
$rows_paginas = mysqli_num_rows($paginas);
?>
<!-- Page Heading -->
<div class="row">
    <div class="col-sm-9">
        <h1 class="page-header">
            Editar página
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
                <a href="index.php?page=paginas">Páginas</a>
            </li>
            <li class="active">
                <i class="fa fa-plus"></i> Editar página: <?php echo $row_paginas['paginas_titulo'] ?>
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form id="paginas_editar" method="post" enctype="multipart/form-data" class="form">
            <input name="paginas_id" class="form-control" type="hidden" value="<?php echo $row_paginas['paginas_id'] ?>">
            <div class="form-group">
                <label>Titulo</label>
                <input name="paginas_titulo" class="form-control" type="text" value="<?php echo $row_paginas['paginas_titulo'] ?>">
            </div>

            <label>Campos</label>
            <div class="clear"></div>
            <label class="paginas-opcoes"><input value="0" name="paginas_categoria" type="hidden"><input value="1" <?php if($row_paginas['paginas_categoria'] == "1"){echo "checked='checked'";} ?> name="paginas_categoria" type="checkbox"> Categorias</label>
            <label class="paginas-opcoes"><input value="0" name="paginas_imagem" type="hidden"><input value="1" <?php if($row_paginas['paginas_imagem'] == "1"){echo "checked='checked'";} ?> name="paginas_imagem" type="checkbox"> Imagem destaque</label>
            <label class="paginas-opcoes"><input value="0" name="paginas_imagem2" type="hidden"><input value="1" <?php if($row_paginas['paginas_imagem2'] == "1"){echo "checked='checked'";} ?> name="paginas_imagem2" type="checkbox"> Imagem 2</label>
            <label class="paginas-opcoes"><input value="0" name="paginas_email" type="hidden"><input value="1" <?php if($row_paginas['paginas_email'] == "1"){echo "checked='checked'";} ?> name="paginas_email" type="checkbox"> E-mail</label>
            <label class="paginas-opcoes"><input value="0" name="paginas_texto" type="hidden"><input value="1" <?php if($row_paginas['paginas_texto'] == "1"){echo "checked='checked'";} ?> name="paginas_texto" type="checkbox"> Texto</label>
            <label class="paginas-opcoes"><input value="0" name="paginas_data" type="hidden"><input value="1" <?php if($row_paginas['paginas_data'] == "1"){echo "checked='checked'";} ?> name="paginas_data" type="checkbox"> Data</label>
            <label class="paginas-opcoes"><input value="0" name="paginas_link" type="hidden"><input value="1" <?php if($row_paginas['paginas_link'] == "1"){echo "checked='checked'";} ?> name="paginas_link" type="checkbox"> Link</label>
            <label class="paginas-opcoes"><input value="0" name="paginas_fotos" type="hidden"><input value="1" <?php if($row_paginas['paginas_fotos'] == "1"){echo "checked='checked'";} ?> name="paginas_fotos" type="checkbox"> Fotos</label>

            <div class="clear10"></div>
            <div class="form-group">
                <label>Template</label>
                <div class="panel panel-default">
                  <div class="panel-body">
                    <p style="font-size:12px; color:#999"><i class="fa fa-info-circle"></i> Para criar um template, apenas crie o arquivo e coloque na pasta "templates".</p>
                    
                    <?php
                    $diretorio = scandir("../templates/");
                    $pasta = "../templates/";

                    $files = glob($pasta.'/*.php');
                    natsort($files);
                    ?>
                    <select name="paginas_template" class="form-control">
                        <option selected="selected" disabled="disabled">Escolha um template</option>
                    <?php
                    foreach ($files as $key => $value) {
                        $template = explode('/', $value);
                        $template = end($template);
                        ?>
                        <option value="<?php echo $template; ?>" <?php if($row_paginas['paginas_template'] == $template){echo "selected='selected'";} ?>><?php echo $template; ?></option>
                        <?php 
                    } 
                    ?>
                </select>
                <div class="clear10"></div>
                <label class="paginas-opcoes">
                    <input name="paginas_carousel" type="hidden" value="0">
                    <input name="paginas_carousel" <?php if($row_paginas['paginas_carousel'] == '1'){echo "checked='checked'";} ?> type="checkbox" value="1">
                    Carousel / Slideshow
                </label>
                <label class="paginas-opcoes">
                    <input name="paginas_layout" type="hidden" value="0">
                    <input name="paginas_layout" <?php if($row_paginas['paginas_layout'] == '1'){echo "checked='checked'";} ?> type="checkbox" value="1">
                    Layout
                </label>
                </div>
                </div>
            </div>


            <div class="form-group">
                <label>Template exibir</label>
                <div class="panel panel-default">
                  <div class="panel-body">
                    <p style="font-size:12px; color:#999"><i class="fa fa-info-circle"></i> Para criar um template, apenas crie o arquivo e coloque na pasta "templates".</p>
                    
                    <?php
                    $diretorio = scandir("../templates/exibir/");
                    $pasta = "../templates/exibir/";

                    $files = glob($pasta.'/*.php');
                    natsort($files);
                    ?>
                    <select name="paginas_template_exibir" class="form-control">
                        <option selected="selected" disabled="disabled">Escolha um template</option>
                        <?php
                        foreach ($files as $key => $value) {
                            $template = explode('/', $value);
                            $template = end($template);
                            ?>
                            <option value="<?php echo $template; ?>" <?php if($row_paginas['paginas_template_exibir'] == $template){echo "selected='selected'";} ?>><?php echo $template; ?></option>
                            <?php 
                        } 
                        ?>
                    </select>
                    <div class="clear10"></div>
                    </div>
                </div>
            </div>
                
                

            <div class="form-group">
                <label>Ordem</label>
                <select name="paginas_ordem" class="form-control">
                    <option <?php if($row_paginas['paginas_ordem'] == "registros_id ASC"){echo "selected='selected'";} ?> value="registros_id ASC">Por cadastro ascendente</option>
                    <option <?php if($row_paginas['paginas_ordem'] == "registros_id DESC"){echo "selected='selected'";} ?> value="registros_id DESC">Por cadastro descendente</option>
                    <option <?php if($row_paginas['paginas_ordem'] == "registros_titulo ASC"){echo "selected='selected'";} ?> value="registros_titulo ASC">Alfabética</option>
                    <option <?php if($row_paginas['paginas_ordem'] == "registros_data ASC"){echo "selected='selected'";} ?> value="registros_data ASC">Por data ascendente</option>
                    <option <?php if($row_paginas['paginas_ordem'] == "registros_data DESC"){echo "selected='selected'";} ?> value="registros_data DESC">Por data descendente</option>
                    <option <?php if($row_paginas['paginas_ordem'] == "RAND()"){echo "selected='selected'";} ?> value="RAND()">Aleatória</option>
                    <option <?php if($row_paginas['paginas_ordem'] == "registros_ordem ASC"){echo "selected='selected'";} ?> value="registros_ordem ASC">Personalizada</option>
                </select>
            </div>

            <div class="form-group">
                <label>Ordem do menu</label>
                <input name="paginas_ordem_menu" class="form-control" type="text" value="<?php echo $row_paginas['paginas_ordem_menu'] ?>">
            </div>


            <div class="form-group">
                <label>Menu</label>
                <div class="clear"></div>
                <label class="paginas-opcoes">
                    <input name="paginas_menu" type="hidden" value="0">
                    <input name="paginas_menu" <?php if($row_paginas['paginas_menu'] == '1'){echo "checked='checked'";} ?> type="checkbox" value="1">
                    Aparecer no menu do site
                </label>
                <label class="paginas-opcoes">
                    <input name="paginas_menu_admin" type="hidden" value="0">
                    <input name="paginas_menu_admin" <?php if($row_paginas['paginas_menu_admin'] == '1'){echo "checked='checked'";} ?> type="checkbox" value="1">
                    Aparecer no menu admin
                </label>
            </div>
            <div class="clear10"></div>
            <div class="form-group">
                <label>Limite</label>
                <input name="paginas_limite" class="form-control" value="<?php echo $row_paginas['paginas_limite'] ?>" type="text">
            </div>

            <div class="form-group">
                <label>Meta Descrição</label>
                <input name="paginas_metadescription" class="form-control" type="text" value="<?php echo $row_paginas['paginas_metadescription'] ?>">
            </div>

            <div class="clear10"></div>
            <div class="form-group">
                <label>Url</label>
                <input name="paginas_url" class="form-control" type="text" value="<?php echo $row_paginas['paginas_url'] ?>">
            </div>

            <div class="clear20"></div>
            <input type="submit" class="btn btn-primary" value="Editar">
        </form>
    </div>
</div>
<div class="clear10"></div>

<div id="retorno"></div>