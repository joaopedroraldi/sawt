<?php 
$query = "SELECT paginas_titulo FROM paginas WHERE paginas_id = {$_GET['id']}";
$paginas = mysqli_query($config, $query) or die(mysqli_error());
$row_paginas = mysqli_fetch_assoc($paginas);

$query = "SELECT * FROM categorias WHERE categorias_idpg = {$_GET['id']} and categorias_pai = 0 LIMIT ".$limite." OFFSET ".$offset;
$categorias = mysqli_query($config, $query) or die(mysqli_error());
$rows_categorias = mysqli_num_rows($categorias);
$row_categorias = mysqli_fetch_assoc($categorias);
?>

<div class="row">
  <div class="col-sm-8">
    <a class="btn btn-default" href="<?php echo RAIZ_ADMIN ?>?page=registros&id=<?php echo $_GET['id'] ?>"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar</a>
    <h1 class="titulo-categorias">Categorias de <?php echo $row_paginas['paginas_titulo'] ?></h1>
  </div>

  <div class="col-sm-4 text-right">
    <div class="clear20 hidden-xs"></div>
    <a class="btn btn-success" href="<?php echo RAIZ_ADMIN ?>?page=categorias_cadastrar&id=<?php echo $_GET['id'] ?>"><i class="fa fa-plus-circle"></i> Nova categoria</a>
    <div class="clear20 visible-xs"></div>
  </div>
</div>

<ol class="breadcrumb">
  <li><a href="<?php echo RAIZ_ADMIN ?>">Home</a></li>
  <li><a href="<?php echo RAIZ_ADMIN ?>?page=registros&id=<?php echo $_GET['id'] ?>"><?php echo $row_paginas['paginas_titulo'] ?></a></li>
  <li>Categorias de <?php echo $row_paginas['paginas_titulo'] ?></li>
</ol>


<div class="clear20"></div>

<?php if($row_categorias['categorias_id']){ ?>
<div class="table-responsive">
  <table class="table table-hover table-categorias">
    <tr>
      <th>Nome</th>
      <th></th>
    </tr>
        <?php do{ ?>
        <tr>
            <td>
                <?php echo $row_categorias['categorias_titulo'] ?>
            </td>
            <td class="text-right">       
                <a href="?page=categorias_editar&id=<?php echo $row_categorias['categorias_id'] ?>"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i> Editar</button></a>         
                <a arquivo="categorias_deletar" tabela="categorias" idreg="<?php echo $row_categorias['categorias_id'] ?>" class="btn btn-danger bt-deletar"><i class="fa fa-trash-o"></i> Excluir</a>           
            </td>
        </tr>
              <?php 
              $idpai = $row_categorias['categorias_id'];
              $query_sub = "SELECT * FROM categorias WHERE categorias_idpg = {$_GET['id']} and categorias_pai = $idpai";
              $subcategorias = mysqli_query($config, $query_sub) or die(mysqli_error());
              ?>
              <?php while($row_subcategorias = mysqli_fetch_assoc($subcategorias)){ ?>
                  <tr>
                      <td style="font-size:13px; color:#888; padding-left:20px; font-style:italic;">
                          - <?php echo $row_subcategorias['categorias_titulo'] ?>
                      </td>
                      <td class="text-right">       
                          <a href="?page=categorias_editar&id=<?php echo $row_subcategorias['categorias_id'] ?>"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i> Editar</button></a>         
                          <a arquivo="categorias_deletar" tabela="categorias" idreg="<?php echo $row_subcategorias['categorias_id'] ?>" class="btn btn-danger bt-deletar"><i class="fa fa-trash-o"></i> Excluir</a>           
                      </td>
                  </tr>
              <?php } ?>
        <?php }while($row_categorias = mysqli_fetch_assoc($categorias)); ?>
  </table>
</div>
<?php }else{ ?>
Nenhum registro cadastrado. <br><br>
<a class="btn btn-success" href="<?php echo RAIZ_ADMIN ?>?page=categorias_cadastrar&id=<?php echo $_GET['id'] ?>"><i class="fa fa-plus-circle"></i> Cadastrar primeira categoria</a>
<?php }?>


<?php
if($pagina !== 0){ // Sem isto irá exibir "Página Anterior" na primeira página.
?>
<a class="btn btn-default" href="?page=categorias&pagina=<?php echo $pagina-1; ?>&id=<?php echo $_GET['id']; ?>"><i class="fa fa-step-backward" aria-hidden="true"></i></a>
<?php
}
if($rows_categorias > 0){
?>
<a class="btn btn-default" href="?page=categorias&pagina=<?php echo $pagina+1; ?>&id=<?php echo $_GET['id']; ?>"><i class="fa fa-step-forward" aria-hidden="true"></i></a>
<?php } ?>

<div id="retorno"></div>
