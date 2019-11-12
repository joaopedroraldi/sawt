<!-- include summernote css/js-->
<link href="js/summernote/summernote.css" rel="stylesheet">
<script src="js/summernote/summernote.js"></script>

<?php 
$id = $_GET['id'];
$query = "SELECT * FROM registros WHERE registros_id = $id";
$registros = mysqli_query($config, $query) or die(mysqli_error());
$row_registros = mysqli_fetch_assoc($registros);

$idpg = $row_registros['registros_idpg'];
$query = "SELECT * FROM paginas WHERE paginas_id = $idpg";
$paginas = mysqli_query($config, $query) or die(mysqli_error());
$row_paginas = mysqli_fetch_assoc($paginas);

?>
<!-- Page Heading -->
<div class="row">
    <div class="col-sm-9">
        <h1 class="page-header">
            Editar registro <?php echo $row_registros['registros_titulo'] ?>
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
                <a href="index.php?page=registros&id=<?php echo $idpg ?>"><?php echo $row_paginas['paginas_titulo'] ?></a>
            </li>
            <li class="active">
                Editar registro <?php echo $row_registros['registros_titulo'] ?>
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form id="registros_editar" method="post" enctype="multipart/form-data" class="form">
            <input name="registros_id" class="form-control" type="hidden" value="<?php echo $_GET['id'] ?>">
            <input name="registros_idpg" class="form-control" type="hidden" value="<?php echo $idpg ?>">
            <?php if($row_paginas['paginas_id'] != '55'){ ?>
            <div class="form-group">
                <label>Nome</label>
                <input name="registros_titulo" class="form-control" type="text" value="<?php echo $row_registros['registros_titulo'] ?>">
            </div>
            <?php } ?>

            <?php if($row_paginas['paginas_email'] == '1'){ ?>
            <div class="form-group">
                <label>E-mail</label>
                <input name="registros_email" class="form-control" type="text" value="<?php echo $row_registros['registros_email'] ?>">
            </div>
            <?php } ?>

            <?php if($row_paginas['paginas_imagem'] == '1'){ ?>
            <div class="form-group">
                <label>Imagem Destaque</label>
                <div class="clear"></div>
                <?php if(!empty($row_registros['registros_imagem'])){ ?>
                <div class="thumbnail" style="float:left;padding:10px; width:150px; height:150px;"><img src="<?php echo RAIZ_ADMIN ?>timthumb.php?src=<?php echo RAIZ_ADMIN ?>uploads/<?php echo $row_registros['registros_imagem'] ?>&zc=2&w=150&h=150"></div>
                <input name="registros_imagem" class="form-control" value="<?php echo $row_registros['registros_imagem'] ?>" type="hidden">
                <?php }?>
                <input name="registros_imagem_nova" class="form-control" type="file">
            </div>
            <?php } ?>

            <?php if($row_paginas['paginas_imagem2'] == '1'){ ?>
            <div class="form-group">
                <label>Imagem 2</label>
                <div class="clear"></div>
                <?php if(!empty($row_registros['registros_imagem2'])){ ?>
                <div class="thumbnail" style="float:left;padding:10px; width:150px; height:150px;"><img src="<?php echo RAIZ_ADMIN ?>timthumb.php?src=<?php echo RAIZ_ADMIN ?>uploads/<?php echo $row_registros['registros_imagem2'] ?>&zc=2&w=150&h=150"></div>
                <input name="registros_imagem2" class="form-control" value="<?php echo $row_registros['registros_imagem2'] ?>" type="hidden">
                <?php }?>
                <input name="registros_imagem2_nova" class="form-control" type="file">
            </div>
            <?php } ?>

            <?php if($row_paginas['paginas_categoria'] == '1'){ ?>
            <div class="clear10"></div>
            <div class="form-group">
                <label>Categoria</label>
                <?php
                $query = "SELECT * FROM categorias WHERE categorias_idpg = $idpg and categorias_pai = 0";
                $categorias = mysqli_query($config, $query) or die(mysqli_error());
                ?>
                <select class="form-control" id="multiescolha">
                    <option selected="selected" disabled="disabled"><div>Selecione uma categoria</div></option>
                    <?php while($row_categorias = mysqli_fetch_assoc($categorias)){ ?>
                        <option style="font-size:14px; color:#222;" value="<?php echo $row_categorias['categorias_id'] ?>" titulo="<?php echo $row_categorias['categorias_titulo'] ?>"><?php echo $row_categorias['categorias_titulo'] ?></option>
                        <?php 
                        $idpai = $row_categorias['categorias_id'];
                        $query_sub = "SELECT * FROM categorias WHERE categorias_idpg = $idpg and categorias_pai = $idpai";
                        $subcategorias = mysqli_query($config, $query_sub) or die(mysqli_error());
                        ?>
                        <?php while($row_subcategorias = mysqli_fetch_assoc($subcategorias)){ ?>
                        <option style="font-size:12px; color:#555; font-style:italic" value="<?php echo $row_subcategorias['categorias_id'] ?>" titulo="<?php echo $row_subcategorias['categorias_titulo'] ?>"> - <?php echo $row_subcategorias['categorias_titulo'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
                <div class="clear10"></div>
                <?php 
                $query = "SELECT (select c.categorias_titulo from categorias as c where r.categorias_id = c.categorias_id) as categorias_titulo, categorias_id FROM registros_categorias as r WHERE r.registros_id = $id";
                $multiescolhas = mysqli_query($config, $query) or die(mysqli_error());
                ?>
                <div id="multiescolhas">
                    <?php while($row_multiescolhas = mysqli_fetch_assoc($multiescolhas)){ ?>
                        <div class="checkEscolha"><?php echo $row_multiescolhas['categorias_titulo'] ?> <input type="checkbox" name="multiescolha[]" value="<?php echo $row_multiescolhas['categorias_id'] ?>" checked="checked"></div>
                    <?php  } ?>
                </div>
                <div class="clear10"></div>
                
            </div>
            <?php } ?>

            <?php if($row_paginas['paginas_data'] == '1'){ 
                $dia = substr($row_registros['registros_data'], 8,2);
                $mes = substr($row_registros['registros_data'], 5,2);
                $ano = substr($row_registros['registros_data'], 0,4);
            ?>
            <div class="form-group">
                <label>Data</label>
                <input name="registros_data" class="form-control registrodata" type="text" value="<?php echo $dia . '/' . $mes . '/' . $ano?>">
            </div>
            <?php } ?>

            <?php if($row_paginas['paginas_link'] == '1'){ ?>
            <div class="form-group">
                <label>Link</label>
                <input name="registros_link" class="form-control" type="text" value="<?php echo $row_registros['registros_link'] ?>">
            </div>
            <?php } ?>

            <?php if($row_paginas['paginas_texto'] == '1'){ ?>
            <div class="form-group">
                <label>Texto</label>
                <div class="panel panel-default">
                    <div class="panel-heading">Icones</div>
                    <div class="panel-body">  
                        <i onclick="copyToClipboard('#icon-phone')" class="fa fa-phone btn btn-default"></i>
                        <div id="icon-phone" class="hidden">&lt;i class="fa fa-phone" &gt;&lt;/i&gt;</div>
                        
                        <i onclick="copyToClipboard('#icon-whatsapp')" class="fa fa-whatsapp btn btn-default"></i>
                        <div id="icon-whatsapp" class="hidden">&lt;i class="fa fa-whatsapp" &gt;&lt;/i&gt;</div>
                        
                        <i onclick="copyToClipboard('#icon-map')" class="fa fa-map-marker btn btn-default"></i>
                        <div id="icon-map" class="hidden">&lt;i class="fa fa-map-marker" &gt;&lt;/i&gt;</div>
                        
                        <i onclick="copyToClipboard('#icon-envelope')" class="fa fa-envelope btn btn-default"></i>
                        <div id="icon-envelope" class="hidden">&lt;i class="fa fa-envelope" &gt;&lt;/i&gt;</div>
                        
                        <i onclick="copyToClipboard('#icon-facebook')" class="fa fa-facebook-official btn btn-default"></i>
                        <div id="icon-facebook" class="hidden">&lt;i class="fa fa-facebook-official" &gt;&lt;/i&gt;</div>
                        
                        <i onclick="copyToClipboard('#icon-instagram')" class="fa fa-instagram btn btn-default"></i>
                        <div id="icon-instagram" class="hidden">&lt;i class="fa fa-instagram" &gt;&lt;/i&gt;</div>
                        
                        <i onclick="copyToClipboard('#icon-youtube')" class="fa fa-youtube-play btn btn-default"></i>
                        <div id="icon-youtube" class="hidden">&lt;i class="fa fa-youtube-play" &gt;&lt;/i&gt;</div>
                    </div>
                </div>
                <textarea name="registros_texto" id="registros_texto" style="height:250px !important;"><?php echo $row_registros['registros_texto'] ?></textarea>
            </div>
            <?php } ?>

            <?php if($row_paginas['paginas_id'] == '52'){ ?>
            <div class="form-group">
                <label>CNPJ / CPF</label>
                <input name="registros_cnpj" class="form-control" type="text" value="<?php echo $row_registros['registros_cnpj'] ?>">
            </div>
            <div class="form-group">
                <label>Nome do Responsável</label>
                <input name="registros_nome_responsavel" class="form-control" type="text" value="<?php echo $row_registros['registros_nome_responsavel'] ?>">
            </div>
            <div class="form-group">
                <label>Endereço</label>
                <input name="registros_endereco" class="form-control" type="text" value="<?php echo $row_registros['registros_endereco'] ?>">
            </div>
            <div class="form-group">
                <label>Cidade</label>
                <input name="registros_cidade" class="form-control" type="text" value="<?php echo $row_registros['registros_cidade'] ?>">
            </div>
            <div class="form-group">
                <label>Estado</label>
                <input name="registros_estado" class="form-control" type="text" value="<?php echo $row_registros['registros_estado'] ?>">
            </div>
            <div class="form-group">
                <label>CEP</label>
                <input name="registros_cep" class="form-control" type="text" value="<?php echo $row_registros['registros_cep'] ?>">
            </div>
            <div class="form-group">
                <label>Fone Fixo</label>
                <input name="registros_fone_fixo" class="form-control fixo" type="text" value="<?php echo $row_registros['registros_fone_fixo'] ?>">
            </div>
            <div class="form-group">
                <label>Whatsapp</label>
                <input name="registros_whatsapp" class="form-control cel" type="text" value="<?php echo $row_registros['registros_whatsapp'] ?>">
            </div>
            <?php } ?>

            <?php if($row_paginas['paginas_id'] == '55'){ ?>
            <div class="form-group">
                <label>Cliente</label>
                <select name="registros_cliente" class="form-control">
                    <?php 
                    $query = "SELECT registros_id, registros_titulo FROM registros WHERE registros_idpg = 52";
                    $clientes = mysqli_query($config, $query);
                    while($row_clientes = mysqli_fetch_assoc($clientes)){
                    ?>
                    <option <?php if($row_clientes['registros_id'] == $row_registros['registros_cliente']){echo "selected='selected'";} ?> value="<?php echo $row_clientes['registros_id'] ?>"><?php echo $row_clientes['registros_titulo'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Plano</label>
                <select name="registros_plano" class="form-control">
                    <?php
                    $query = "SELECT categorias_id, categorias_titulo FROM categorias WHERE categorias_idpg = 53";
                    $categorias = mysqli_query($config, $query);
                    while($row_categorias = mysqli_fetch_assoc($categorias)){
                        $query = "SELECT 
                          (select r.registros_titulo from registros as r where r.registros_id = rc.registros_id) as registros_titulo, 
                          (select r.registros_id from registros as r where r.registros_id = rc.registros_id) as registros_id
                          FROM 
                          registros_categorias as rc
                          WHERE 
                          categorias_id = {$row_categorias['categorias_id']}";
                        $planos = mysqli_query($config, $query) or die(mysqli_error());
                        while($row_planos = mysqli_fetch_assoc($planos)){
                    ?>
                            <option <?php if($row_planos['registros_id'] == $row_registros['registros_plano']){echo "selected='selected'";} ?> value="<?php echo $row_planos['registros_id'] ?>"><?php echo $row_categorias['categorias_titulo'] ?> - <?php echo $row_planos['registros_titulo'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Valor</label>
                <input name="registros_valor" class="form-control" type="text" value="<?php echo $row_registros['registros_valor'] ?>">
            </div>
            <div class="form-group">
                <label>Condições</label>
                <textarea name="registros_condicoes" class="form-control"><?php echo $row_registros['registros_condicoes'] ?></textarea>
            </div>
            <div class="form-group">
                <label>Prazo</label>
                <input name="registros_prazo" class="form-control" type="text" value="<?php echo $row_registros['registros_prazo'] ?>">
            </div>
            <?php } ?>

            <?php if($row_paginas['paginas_id'] != '52' && $row_paginas['paginas_id'] != 55){ ?>
            <div class="form-group">
                <label>Url amigável</label>
                 <p style="font-size:12px; color:#999"><i class="fa fa-info-circle"></i> Caso não digitar nada a url será criada automaticamente.</p>
                <input name="registros_url" class="form-control texto-url" type="text" placeholder="<?php echo $row_registros['registros_url'] ?>">
            </div>

            <div class="form-group">
                <label>Ordem</label>
                <input name="registros_ordem" class="form-control" type="text" value="<?php echo $row_registros['registros_ordem'] ?>">
            </div>

            <div class="form-group">
                <label>Meta Descrição</label>
                <input name="registros_metadescription" class="form-control" type="text" value="<?php echo $row_registros['registros_metadescription']; ?>">
            </div>
            <?php } ?>
            <div class="clear20"></div>
            <input type="submit" class="btn btn-primary" value="Editar">
        </form>
    </div>
</div>
<div class="clear10"></div>

<div id="retorno"></div>

<script>
    $(document).ready(function(){  
       $('#registros_texto').summernote({
            height: 300,
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