<?php 
include('../cn/config.php');

$id = $_POST['id'];
$busca = $_POST['busca'];

$query = "SELECT paginas_titulo, paginas_fotos, paginas_categoria, paginas_ordem FROM paginas WHERE paginas_id = $id";
$paginas = mysqli_query($config, $query) or die(mysqli_error());
$row_paginas = mysqli_fetch_assoc($paginas);
$registros_ordem = $row_paginas['paginas_ordem'];

$query = "SELECT 
    registros_id, registros_titulo, registros_imagem, registros_texto, registros_notificacao, registros_cliente_key,
    (select p.registros_titulo from registros as p where p.registros_id = r.registros_plano) as registros_plano,
    (select c.registros_titulo from registros as c where c.registros_id = r.registros_cliente) as registros_cliente
    FROM registros as r WHERE registros_idpg = {$id} and registros_titulo LIKE '%$busca%' ORDER BY $registros_ordem";

// $query = "SELECT registros_id, registros_titulo, registros_imagem FROM registros WHERE registros_idpg = $id and registros_titulo LIKE '%$busca%' ORDER BY $registros_ordem";
$registros = mysqli_query($config, $query) or die(mysqli_error());
$row_registros = mysqli_fetch_assoc($registros);
?>
<div class="table-responsive" id="table-registros">
  <table class="table table-hover table-registros">
    <tr>
      <?php if($id == 55){ ?>
      <th>Nº contrato</th>
      <th>Plano</th>
      <th>Cliente</th>
      <?php }else{ ?>
      <th>Nome</th>
      <?php } ?>
      <th><?php if($row_registros['registros_imagem']){ ?>Imagem<?php } ?></th>
      <th><?php if($row_paginas['paginas_categoria'] == 1){ ?>Categoria<?php } ?></th>
      <th></th>
    </tr>
        <?php do{ ?>
        <tr style="width:100%">
           <?php if($id == 55){ ?>
            <td>#<?php echo $row_registros['registros_id'] ?></td>
            <td><?php echo $row_registros['registros_plano'] ?></td>
            <td><?php echo $row_registros['registros_cliente'] ?></td>
            <?php }elseif($id == 56){ ?>
            <td>
                <?php echo $row_registros['registros_cliente'] . "  |  " .$row_registros['registros_titulo'] ?>
            </td>
            <?php }else{ ?>
            <td>
                <?php echo $row_registros['registros_titulo'] ?>
            </td>
            <?php } ?>
            <?php if($id == 52){ ?><td><a target="_blank" href="<?php echo RAIZ."briefing?c=".$row_registros['registros_cliente_key'] ?>">Link para Briefing </a></td><td><?php echo $row_registros['registros_cliente_key'] ?></td><?php } ?>
            <td>
            <?php if($row_registros['registros_imagem']){ ?>
              <?php echo "https://$_SERVER[HTTP_HOST]".RAIZ_UP.$row_registros['registros_imagem'] ?>
              <!-- <img src="<?php echo RAIZ_ADMIN ?>timthumb.php?src=<?php echo RAIZ_ADMIN ?>uploads/<?php echo $row_registros['registros_imagem'] ?>&zc=2&w=100&h=100" class="thumbnail"> -->
            <?php } ?>
            </td>

            <?php if($row_paginas['paginas_categoria'] == 1){ ?>
            <td>
                <?php 
                $query = "SELECT (select c.categorias_titulo from categorias as c where r.categorias_id = c.categorias_id) as categorias_titulo, categorias_id FROM registros_categorias as r WHERE r.registros_id = {$row_registros['registros_id']}";
                $multiescolhas = mysqli_query($config, $query) or die(mysqli_error());
                ?>
                <div id="multiescolhas">
                    <?php while($row_multiescolhas = mysqli_fetch_assoc($multiescolhas)){ ?>
                        <a href="?page=registros&id=<?php echo $id ?>&cat=<?php echo $row_multiescolhas['categorias_id'] ?>" class="label label-default"><?php echo $row_multiescolhas['categorias_titulo'] ?></a>
                    <?php  } ?>
                </div>
            </td>
            <?php } ?>

            <td class="text-right">
            <?php if($id == 55){ ?>
                <?php if($row_registros['registros_texto']){ ?>
                <a href="?page=contratogerado&id=<?php echo $row_registros['registros_id'] ?>"><button type="button" class="btn btn-xs btn-success"><?php if($row_registros['registros_notificacao'] > 0){echo '<i class="fa fa-envelope"></i>';} ?> <i class="fa fa-check"></i> Contrato gerado</button></a>       
                <?php } ?>
                <a href="?page=contrato&id=<?php echo $row_registros['registros_id'] ?>"><button type="button" class="btn btn-xs btn-default"><i class="fa fa-file"></i> Gerar contrato</button></a>       
            <?php } ?>
            <?php if($id == 52){ ?>
                <a href="?page=registros&id=56&cliente=<?php echo $row_registros['registros_id'] ?>"><button type="button" class="btn btn-xs btn-default"><i class="fa fa-list" aria-hidden="true"></i>Briefing</button></a>       
                <a href="?page=registros&id=55&cliente=<?php echo $row_registros['registros_id'] ?>"><button type="button" class="btn btn-xs btn-default"><i class="fa fa-file"></i> Contratos</button></a>       
            <?php } ?>
            <?php if($row_paginas['paginas_fotos'] == 1){ ?>       
                <a href="?page=registros_fotos&id=<?php echo $row_registros['registros_id'] ?>"><button type="button" class="btn btn-xs btn-default"><i class="fa fa-camera"></i> Fotos</button></a>       
            <?php } ?>
            <?php if($id == 56){ ?>
            <a href="?page=briefing&id=<?php echo $row_registros['registros_id'] ?>"><button type="button" class="btn btn-xs btn-primary"> Visualizar</button></a>
            <?php }else{ ?>
                <a href="?page=registros_editar&id=<?php echo $row_registros['registros_id'] ?>"><button type="button" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o"></i> Editar</button></a>         
                <a arquivo="registros_deletar" tabela="registros" idreg="<?php echo $row_registros['registros_id'] ?>" class="btn btn-xs btn-danger bt-deletar"><i class="fa fa-trash-o"></i> Excluir</a>           
            <?php } ?>
            </td>
        </tr>
        <?php }while($row_registros = mysqli_fetch_assoc($registros)); ?>
  </table>
</div>