<!-- include summernote css/js-->
<link href="js/summernote/summernote.css" rel="stylesheet">
<script src="js/summernote/summernote.js"></script>

<?php 
$id = $_GET['id'];
$query = "SELECT * FROM paginas WHERE paginas_id = $id";
$paginas = mysqli_query($config, $query) or die(mysqli_error());
$row_paginas = mysqli_fetch_assoc($paginas);
?>
<!-- Page Heading -->
<div class="row">
    <div class="col-sm-9">
        <h1 class="page-header">
            Cadastrar categoria para <?php echo $row_paginas['paginas_titulo'] ?>
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
                <a href="index.php?page=registros&id=<?php echo $id ?>"><?php echo $row_paginas['paginas_titulo'] ?></a>
            </li>
            <li>
                <a href="index.php?page=categorias&id=<?php echo $id ?>">Categorias de <?php echo $row_paginas['paginas_titulo'] ?></a>
            </li>
            <li class="active">
               Cadastrar categoria
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form id="categorias_cadastrar" method="post" enctype="multipart/form-data" class="form">
            <input name="categorias_idpg" class="form-control" type="hidden" value="<?php echo $id ?>">
            <div class="form-group">
                <label>Titulo</label>
                <input name="categorias_titulo" class="form-control" type="text">
            </div>
            <div class="form-group">
                <label>Subcategoria de</label>
                <?php 
                $query = "SELECT * FROM categorias WHERE categorias_idpg = $id and categorias_pai = 0";
                $categorias = mysqli_query($config, $query) or die(mysqli_error());
                ?>
                <select class="form-control" name="categorias_pai" >
                    <option selected="selected"><div>Está é a categoria pai</div></option>
                    <?php while($row_categorias = mysqli_fetch_assoc($categorias)){ ?>
                        <option value="<?php echo $row_categorias['categorias_id'] ?>" titulo="<?php echo $row_categorias['categorias_titulo'] ?>"><?php echo $row_categorias['categorias_titulo'] ?></option>
                    <?php } ?>
                </select>
            
            </div>
            <div class="form-group">
                <label>Imagem</label>
                <input name="categorias_imagem" class="form-control" type="file">
            </div>

            <div class="clear10"></div>
            <div class="form-group">
                <label>Imagem 2</label>
                <input name="categorias_imagem2" class="form-control" type="file">
            </div>
            <div class="clear10"></div>
            
            <label class="paginas-opcoes">
                <input name="categorias_menu" value="1" type="checkbox"> Aparecer no menu
            </label>
            <div class="clear10"></div>
            
            <div class="form-group">
                <label>Descrição</label>
                <textarea name="categorias_texto" id="categorias_texto" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Url amigável</label>
                 <p style="font-size:12px; color:#999"><i class="fa fa-info-circle"></i> Caso não digitar nada a url será criada automaticamente.</p>
                <input name="categorias_url" class="form-control texto-url" type="text">
            </div>
            
            <div class="form-group">
                <label>Ordem</label>
                <input name="categorias_ordem" class="form-control" type="text">
            </div>

            <div class="form-group">
                <label>Meta Descrição</label>
                <input name="categorias_metadescription" class="form-control" type="text">
            </div>

            <button type="submit" class="btn btn-primary bt-text-cadastrar">Cadastrar</button>
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