<?php if($admin > 0){ }else{exit();}?>
<div class="row">
  <div class="col-sm-8">
    <h1>Usuários</h1>
  </div>
  <div class="col-sm-4 text-right">
    <div class="clear20 hidden-xs"></div>
    <a class="btn btn-primary" href="<?php echo RAIZ_ADMIN ?>?page=usuarios_cadastrar"><i class="fa fa-plus-circle"></i> Novo usuário</a>
    <div class="clear20 visible-xs"></div>
  </div>
</div>
<ol class="breadcrumb">
  <li><a href="<?php echo RAIZ_ADMIN ?>">Home</a></li>
  <li><a href="<?php echo RAIZ_ADMIN ?>?page=usuarios">Usuários</a></li>
</ol>


<?php 
$query = "SELECT * FROM usuarios ORDER BY nome ASC";
$usuarios = mysqli_query($config, $query) or die(mysqli_error());
$row_usuarios = mysqli_fetch_assoc($usuarios);
?>

<div class="table-responsive">
  <table class="table">
    <?php do{ ?>
    <tr>
        <td>
            <?php echo $row_usuarios['nome'] ?>
        </td>
        <td class="text-right">
            <a href="?page=usuarios_editar&id=<?php echo $row_usuarios['id_usuario'] ?>"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i> Editar</button></a>         
            <a arquivo="usuarios_deletar" tabela="usuarios" idreg="<?php echo $row_usuarios['id_usuario'] ?>" class="btn btn-danger bt-deletar"><i class="fa fa-trash-o"></i> Excluir</a>           
        </td>
    </tr>
    <?php }while($row_usuarios = mysqli_fetch_assoc($usuarios)); ?> 
  </table>
</div>

<div id="retorno"></div>