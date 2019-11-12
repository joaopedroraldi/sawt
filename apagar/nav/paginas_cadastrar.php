<!-- Page Heading -->
<div class="row">
    <div class="col-sm-9">
        <h1 class="page-header">
            Cadastrar páginas
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
                <i class="fa fa-plus"></i> Cadastrar páginas
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form id="paginas_cadastrar" method="post" enctype="multipart/form-data" class="form">
            <div class="form-group">
                <label>Titulo</label>
                <input name="paginas_titulo" class="form-control" type="text">
            </div>

            <label>Campos</label>
            <div class="clear"></div>
            <label class="paginas-opcoes"><input value="0" name="paginas_categoria" type="hidden"><input value="1" name="paginas_categoria" type="checkbox"> Categorias</label>
            <label class="paginas-opcoes"><input value="0" name="paginas_imagem" type="hidden"><input value="1" name="paginas_imagem" type="checkbox"> Imagem destaque</label>
            <label class="paginas-opcoes"><input value="0" name="paginas_imagem2" type="hidden"><input value="1" name="paginas_imagem2" type="checkbox"> Imagem 2</label>
            <label class="paginas-opcoes"><input value="0" name="paginas_email" type="hidden"><input value="1" name="paginas_email" type="checkbox"> E-mail</label>
            <label class="paginas-opcoes"><input value="0" name="paginas_texto" type="hidden"><input value="1" name="paginas_texto" type="checkbox"> Texto</label>
            <label class="paginas-opcoes"><input value="0" name="paginas_data" type="hidden"><input value="1" name="paginas_data" type="checkbox"> Data</label>
            <label class="paginas-opcoes"><input value="0" name="paginas_link" type="hidden"><input value="1" name="paginas_link" type="checkbox"> Link</label>
            <label class="paginas-opcoes"><input value="0" name="paginas_fotos" type="hidden"><input value="1" name="paginas_fotos" type="checkbox"> Fotos</label>

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
                        <option value="<?php echo $template; ?>"><?php echo $template; ?></option>
                        <?php 
                    } 
                    ?>
                </select>
                <div class="clear10"></div>
                <label class="paginas-opcoes">
                    <input name="paginas_carousel" type="hidden" value="0">
                    <input name="paginas_carousel" type="checkbox" value="1"> Carousel / Slideshow
                </label>
                <label class="paginas-opcoes">
                    <input name="paginas_layout" type="hidden" value="0">
                    <input name="paginas_layout" type="checkbox" value="1"> Layout
                </label>
                </div>
                </div>
            </div>

            <div class="clear"></div>
            
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
                                <option value="<?php echo $template; ?>"><?php echo $template; ?></option>
                                <?php 
                            } 
                            ?>
                            </select>
                        <div class="clear10"></div>
                    </div>
                </div>
            </div>

            <div class="clear"></div>

            <div class="form-group">
                <label>Ordem</label>
                <select name="paginas_ordem" class="form-control">
                    <option value="registros_id ASC">Por cadastro ascendente</option>
                    <option value="registros_id DESC">Por cadastro descendente</option>
                    <option value="registros_titulo ASC">Alfabética</option>
                    <option value="registros_data ASC">Por data ascendente</option>
                    <option value="registros_data DESC">Por data descendente</option>
                    <option value="RAND()">Aleatória</option>
                    <option value="registros_ordem ASC">Personalizada</option>
                </select>
            </div>

            <div class="form-group">
                <label>Ordem do menu</label>
                <input name="paginas_ordem_menu" class="form-control" type="text">
            </div>


            <div class="form-group">
                <label>Menu</label>
                <div class="clear"></div>
                <label class="paginas-opcoes">
                    <input name="paginas_menu" type="hidden" value="0">
                    <input name="paginas_menu" type="checkbox" value="1"> Aparecer no menu do site
                </label>
                
                <label class="paginas-opcoes">
                    <input name="paginas_menu_admin" type="hidden" value="0">
                    <input name="paginas_menu_admin" type="checkbox" value="1"> Aparecer no menu admin
                </label>
            </div>   

            <div class="clear10"></div>

            <div class="form-group">
                <label>Limite</label>
                <input name="paginas_limite" class="form-control" type="text">
            </div>

            <div class="form-group">
                <label>Meta Descrição</label>
                <input name="paginas_metadescription" class="form-control" type="text">
            </div>
            
            <div class="clear10"></div>
            <div class="form-group">
                <label>Url</label>
                <input name="paginas_url" class="form-control" type="text">
            </div>

            <div class="clear20"></div>
            <input type="submit" class="btn btn-primary" value="Cadastrar">
        </form>
    </div>
</div>
<div class="clear10"></div>

<div id="retorno"></div>