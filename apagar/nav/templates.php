<?php 
$query = "SELECT * FROM templates ORDER BY templates_header,templates_footer ASC";
$templates = mysqli_query($config, $query) or die(mysqli_error());
$row_templates = mysqli_fetch_assoc($templates);
?>

<div class="row">
  <div class="col-sm-8">
    <a class="btn btn-default" href="<?php echo RAIZ_ADMIN ?>?page=templates"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar</a>
    <h1 class="titulo-templates">Templates</h1>
  </div>

  <div class="col-sm-4 text-right">
    <div class="clear20 hidden-xs"></div>
    <a class="btn btn-default" href="<?php echo RAIZ_ADMIN ?>?page=templates_home"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
    <a class="btn btn-primary" href="<?php echo RAIZ_ADMIN ?>?page=templates_cadastrar"><i class="fa fa-plus-circle"></i> Novo template</a>
    <div class="clear20 visible-xs"></div>
  </div>
</div>

<ol class="breadcrumb">
  <li><a href="<?php echo RAIZ_ADMIN ?>">Home</a></li>
  <li>Templates</li>
</ol>


<div class="clear20"></div>

<?php if($row_templates['templates_id']){ ?>
<div class="table-responsive">
  <table class="table table-hover table-templates">
    <tr>
      <th>Nome</th>
      <th>Imagem</th>
      <th>Tags</th>
      <th></th>
    </tr>
        <?php do{ ?>
        <tr>
            <td>
                <?php echo $row_templates['templates_titulo'] ?>
            </td>
            <td><img src="<?php echo RAIZ_ADMIN ?>timthumb.php?src=<?php echo RAIZ_ADMIN ?>uploads/templates/<?php echo $row_templates['templates_imagem'] ?>&zc=2&w=250&h=250" class="thumbnail"></td>
            <td>
              <?php 
                echo $row_templates['templates_tags'];
              ?>
            </td>
            <td class="text-right">       
                <a href="?page=templates_editar&id=<?php echo $row_templates['templates_id'] ?>"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i> Editar</button></a>         
                <a arquivo="templates_deletar" tabela="templates" idreg="<?php echo $row_templates['templates_id'] ?>" class="btn btn-danger bt-deletar"><i class="fa fa-trash-o"></i> Excluir</a>           
            </td>
        </tr>
        <?php }while($row_templates = mysqli_fetch_assoc($templates)); ?>
  </table>
</div>
<?php }else{ ?>
Nenhum template cadastrado. <br><br>
<a class="btn btn-primary" href="<?php echo RAIZ_ADMIN ?>?page=templates_cadastrar"><i class="fa fa-plus-circle"></i> Cadastrar primeiro template</a>
<?php }?>


<div id="retorno"></div>
