<!-- include summernote css/js-->
<link href="js/summernote/summernote.css" rel="stylesheet">
<script src="js/summernote/summernote.js"></script>

<?php 
$id = $_GET['id'];
$query = "SELECT * FROM categorias WHERE categorias_id = $id";
$categorias = mysqli_query($config, $query) or die(mysqli_error());
$row_categorias = mysqli_fetch_assoc($categorias);

$idpg = $row_categorias['categorias_idpg'];
$query = "SELECT * FROM paginas WHERE paginas_id = $idpg";
$paginas = mysqli_query($config, $query) or die(mysqli_error());
$row_paginas = mysqli_fetch_assoc($paginas);
?>
<!-- Page Heading -->
<div class="row">
    <div class="col-sm-9">
        <h1 class="page-header">
            Editar categoria <?php echo $row_categorias['categorias_titulo'] ?>
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
                <a class="titulo-categorias" href="index.php?page=categorias&id=<?php echo $idpg ?>">Categorias de <?php echo $row_paginas['paginas_titulo'] ?></a>
            </li>
            <li class="active">
               Editar categoria <?php echo $row_categorias['categorias_titulo'] ?>
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form id="categorias_editar" method="post" enctype="multipart/form-data" class="form">
            <input name="categorias_id" class="form-control" type="hidden" value="<?php echo $id ?>">
            <input name="categorias_idpg" class="form-control" type="hidden" value="<?php echo $idpg ?>">
            <div class="form-group">
                <label>Titulo</label>
                <input name="categorias_titulo" class="form-control" type="text" value="<?php echo $row_categorias['categorias_titulo'] ?>">
            </div>
            <div class="form-group">
                <label>Subcategoria de</label>
                <?php 
                $query = "SELECT * FROM categorias WHERE categorias_idpg = $idpg and categorias_pai = 0";
                $categorias_select = mysqli_query($config, $query) or die(mysqli_error());
                ?>
                <select class="form-control" name="categorias_pai" >
                    <option selected="selected"><div>Está é a categoria pai</div></option>
                    <?php while($row_categorias_select = mysqli_fetch_assoc($categorias_select)){ ?>
                        <option <?php if($row_categorias_select['categorias_id'] == $row_categorias['categorias_pai']){echo "selected='selected'";} ?> value="<?php echo $row_categorias_select['categorias_id'] ?>" titulo="<?php echo $row_categorias_select['categorias_titulo'] ?>"><?php echo $row_categorias_select['categorias_titulo'] ?></option>
                    <?php } ?>
                </select>
            
            </div>
            <div class="form-group">
                <label>Imagem</label>
                <div class="clear"></div>
                <?php if(!empty($row_categorias['categorias_imagem'])){ ?>
                <div class="thumbnail" style="float:left;padding:10px; width:150px; height:150px;"><img src="<?php echo RAIZ_ADMIN ?>timthumb.php?src=<?php echo RAIZ_ADMIN ?>uploads/<?php echo $row_categorias['categorias_imagem'] ?>&zc=2&w=150&h=150"></div>
                <input name="categorias_imagem" class="form-control" value="<?php echo $row_categorias['categorias_imagem'] ?>" type="hidden">
                <?php } ?>
                <input name="categorias_imagem_nova" class="form-control" type="file">
            </div>

            <div class="form-group">
                <label>Imagem 2</label>
                <div class="clear"></div>
                <?php if(!empty($row_categorias['categorias_imagem2'])){ ?>
                <div class="thumbnail" style="float:left;padding:10px; width:150px; height:150px;"><img src="<?php echo RAIZ_ADMIN ?>timthumb.php?src=<?php echo RAIZ_ADMIN ?>uploads/<?php echo $row_categorias['categorias_imagem2'] ?>&zc=2&w=150&h=150"></div>
                <input name="categorias_imagem2" class="form-control" value="<?php echo $row_categorias['categorias_imagem2'] ?>" type="hidden">
                <?php } ?>
                <input name="categorias_imagem2_nova" class="form-control" type="file">
            </div>

            <div class="clear10"></div>
            
            <label class="paginas-opcoes">
                <input name="categorias_menu" value="1" type="checkbox" <?php if($row_categorias['categorias_menu'] == 1){echo "checked='checked'";} ?>> Aparecer no menu
            </label>
            <div class="clear10"></div>
            
            <div class="form-group">
                <label>Descrição</label>
                <textarea name="categorias_texto" id="categorias_texto" class="form-control"><?php echo $row_categorias['categorias_texto'] ?></textarea>
            </div>
            
            <div class="form-group">
                <label>Url amigável</label>
                 <p style="font-size:12px; color:#999"><i class="fa fa-info-circle"></i> Caso não digitar nada a url será criada automaticamente.</p>
                <input name="categorias_url" class="form-control texto-url" type="text" placeholder="<?php echo $row_categorias['categorias_url'] ?>">
            </div>
            
            <div class="form-group">
                <label>Ordem</label>
                <input name="categorias_ordem" class="form-control" type="text" value="<?php echo $row_categorias['categorias_ordem'] ?>">
            </div>

            <div class="form-group">
                <label>Meta Descrição</label>
                <input name="categorias_metadescription" class="form-control" type="text" value="<?php echo $row_categorias['categorias_metadescription'] ?>">
            </div>

            <button type="submit" class="btn btn-warning bt-text-cadastrar">Editar</button>
            <div class="clear20"></div>
            <div id="errocadastro"></div>
          </div>
         </form>
    </div>
</div>
<div class="clear10"></div>
<div id="retorno"></div>

<script>
    $(document).ready(function(){  
        $('#categorias_texto').summernote({height: 300});
    });
</script>