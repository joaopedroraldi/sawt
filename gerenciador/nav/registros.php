<?php 
   $id = $_GET['id'];
  $query = "SELECT paginas_titulo, paginas_fotos, paginas_categoria, paginas_ordem FROM paginas WHERE paginas_id = {$_GET['id']}";
  $paginas = mysqli_query($config, $query) or die(mysqli_error());
  $row_paginas = mysqli_fetch_assoc($paginas);
  $registros_ordem = $row_paginas['paginas_ordem'];


  if(isset($_GET['cat'])){
    $idcat = $_GET['cat'];
    $query = "SELECT 
        (select r.registros_id from registros as r where r.registros_id = rc.registros_id) as registros_id, 
        (select r.registros_titulo from registros as r where r.registros_id = rc.registros_id) as registros_titulo, 
        (select r.registros_cliente_key from registros as r where r.registros_id = rc.registros_id) as registros_cliente_key, 
        (select r.registros_texto from registros as r where r.registros_id = rc.registros_id) as registros_texto, 
        (select r.registros_imagem from registros as r where r.registros_id = rc.registros_id) as registros_imagem
        FROM 
        registros_categorias as rc
        WHERE 
        categorias_id = $idcat
        ORDER BY
        $registros_ordem
        LIMIT ".$limite." OFFSET ".$offset
      ;
  }elseif(isset($_GET['plano'])){
    $query = "SELECT 
    registros_id, registros_titulo, registros_imagem, registros_texto, registros_notificacao, registros_cliente_key,
    (select p.registros_titulo from registros as p where p.registros_id = r.registros_plano) as registros_plano,
    (select c.registros_titulo from registros as c where c.registros_id = r.registros_cliente) as registros_cliente
    FROM registros as r WHERE registros_idpg = {$_GET['id']} AND registros_plano = {$_GET['plano']} ORDER BY $registros_ordem LIMIT ".$limite." OFFSET ".$offset;
  }elseif(isset($_GET['cliente'])){
    $query = "SELECT 
    registros_id, registros_titulo, registros_imagem, registros_texto, registros_notificacao, registros_cliente_key,
    (select p.registros_titulo from registros as p where p.registros_id = r.registros_plano) as registros_plano,
    (select c.registros_titulo from registros as c where c.registros_id = r.registros_cliente) as registros_cliente
    FROM registros as r WHERE registros_idpg = {$_GET['id']} AND registros_cliente = {$_GET['cliente']} ORDER BY $registros_ordem LIMIT ".$limite." OFFSET ".$offset;
  }else{ 
    $query = "SELECT 
    registros_id, registros_titulo, registros_imagem, registros_texto, registros_notificacao, registros_cliente_key,
    (select p.registros_titulo from registros as p where p.registros_id = r.registros_plano) as registros_plano,
    (select c.registros_titulo from registros as c where c.registros_id = r.registros_cliente) as registros_cliente
    FROM registros as r WHERE registros_idpg = {$_GET['id']} ORDER BY $registros_ordem LIMIT ".$limite." OFFSET ".$offset;
  }

  $registros = mysqli_query($config, $query) or die(mysqli_error());
  $row_registros = mysqli_fetch_assoc($registros);
?>


<div class="row">
  <div class="col-sm-8">
    <h1 class="titulo-registros"><?php echo $row_paginas['paginas_titulo'] ?></h1>
  </div>

  <div class="col-sm-4 text-right">
    <div class="clear20 hidden-xs"></div>
    <?php if($row_paginas['paginas_categoria'] == 1){ ?>
    <a class="btn btn-success" href="<?php echo RAIZ_ADMIN ?>?page=categorias&id=<?php echo $_GET['id'] ?>">Categorias</a>
    <?php } ?>
    <?php if($_GET['id'] == 55){ ?>
      <?php if(isset($_GET['cliente'])){ ?>
        <a class="btn btn-primary" href="<?php echo RAIZ_ADMIN ?>?page=registros_cadastrar&id=<?php echo $_GET['id'] ?>&cliente=<?php echo $_GET['cliente'] ?>"><i class="fa fa-plus-circle"></i> Novo contrato</a>
      <?php }else{ ?>
        <a class="btn btn-primary" href="<?php echo RAIZ_ADMIN ?>?page=registros_cadastrar&id=<?php echo $_GET['id'] ?>"><i class="fa fa-plus-circle"></i> Novo contrato</a>
      <?php } ?>
    <?php }else{ ?>
    <a class="btn btn-primary" href="<?php echo RAIZ_ADMIN ?>?page=registros_cadastrar&id=<?php echo $_GET['id'] ?>"><i class="fa fa-plus-circle"></i> Novo registro</a>
    <?php } ?>
    <div class="clear20 visible-xs"></div>
  </div>
</div>

<ol class="breadcrumb">
  <li><a href="<?php echo RAIZ_ADMIN ?>">Home</a></li>
  <li><a href="<?php echo RAIZ_ADMIN ?>?page=registros&id=<?php echo $_GET['id'] ?>"><?php echo $row_paginas['paginas_titulo'] ?></a></li>
</ol>


<h4>Filtrar</h4>
<hr>
<?php if($_GET['id'] != '55'){ ?>
<form>
  <div class="row">
    <div class="col-sm-6">
      <h4>Titulo</h4>
      <input type="text" name="buscar" id="busca-titulo" class="form-control">
    </div>
    <?php if($row_paginas['paginas_categoria'] == 1){ ?>
    <div class="col-sm-6">
      <h4>Categoria</h4>
      <?php 
      $query = "SELECT * FROM categorias WHERE categorias_idpg = $id and categorias_pai = 0";
      $categorias = mysqli_query($config, $query) or die(mysqli_error());
      ?>
      <select class="form-control" id="busca-categoria">
          <option selected="selected" disabled="disabled"><div>Selecione uma categoria</div></option>
          <?php while($row_categorias = mysqli_fetch_assoc($categorias)){ ?>
              <option style="font-size:14px; color:#222;" value="<?php echo $row_categorias['categorias_id'] ?>" titulo="<?php echo $row_categorias['categorias_titulo'] ?>"><?php echo $row_categorias['categorias_titulo'] ?></option>
              <?php 
              $idpai = $row_categorias['categorias_id'];
              $query_sub = "SELECT * FROM categorias WHERE categorias_idpg = $id and categorias_pai = $idpai";
              $subcategorias = mysqli_query($config, $query_sub) or die(mysqli_error());
              ?>
              <?php while($row_subcategorias = mysqli_fetch_assoc($subcategorias)){ ?>
              <option style="font-size:12px; color:#555; font-style:italic" value="<?php echo $row_subcategorias['categorias_id'] ?>" titulo="<?php echo $row_subcategorias['categorias_titulo'] ?>"> - <?php echo $row_subcategorias['categorias_titulo'] ?></option>
              <?php } ?>
          <?php } ?>
      </select>
    </div>
    <?php } ?>
  </div>
</form>
<?php }else{ ?>

<div class="row">
  <div class="col-sm-6">
    <div class="form-group">
        <label>Plano</label>
        <select id="filtro_plano" class="form-control">
            <option>Filtre por plano</option>
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
                    <option value="<?php echo $row_planos['registros_id'] ?>"><?php echo $row_categorias['categorias_titulo'] ?> - <?php echo $row_planos['registros_titulo'] ?></option>
                <?php } ?>
            <?php } ?>
        </select>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="form-group">
        <label>Cliente</label>
        <select id="filtro_cliente" class="form-control">
            <option>Filtre por cliente</option>
            <?php 
            $query = "SELECT registros_id, registros_titulo FROM registros WHERE registros_idpg = 52";
            $clientes = mysqli_query($config, $query);
            while($row_clientes = mysqli_fetch_assoc($clientes)){
            ?>
            <option value="<?php echo $row_clientes['registros_id'] ?>"><?php echo $row_clientes['registros_titulo'] ?></option>
            <?php } ?>
        </select>
    </div>
  </div>
</div>

<?php } ?>
<?php 
  if(isset($_GET['cat']) || isset($_GET['cliente']) || isset($_GET['plano'])){
    $rows_registros = mysqli_num_rows($registros);
  }else{
    $query = "SELECT registros_id FROM registros WHERE registros_idpg = {$_GET['id']}";
    $total_linha = mysqli_query($config, $query) or die(mysqli_error());
    $row_total_linha = mysqli_fetch_assoc($total_linha);
    $rows_registros = mysqli_num_rows($total_linha);
  }
?>
<h6><?php echo $rows_registros. " registros encontrados."; ?></h6>

<?php if($row_registros['registros_id']){ ?>
<div class="table-responsive" id="table-registros">
  <table class="table table-hover table-registros">
    <tr>
      <?php if($_GET['id'] == 55){ ?>
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
           <?php if($_GET['id'] == 55){ ?>
            <td>#<?php echo $row_registros['registros_id'] ?></td>
            <td><?php echo $row_registros['registros_plano'] ?></td>
            <td><?php echo $row_registros['registros_cliente'] ?></td>
            <?php }elseif($_GET['id'] == 56){ ?>
            <td>
                <?php echo $row_registros['registros_cliente'] . "  |  " .$row_registros['registros_titulo'] ?>
            </td>
            <?php }else{ ?>
            <td>
                <?php echo $row_registros['registros_titulo'] ?>
            </td>
            <?php } ?>
            <?php if($_GET['id'] == 52){ ?><td><a target="_blank" href="<?php echo RAIZ."briefing?c=".$row_registros['registros_cliente_key'] ?>">Link para Briefing </a></td><td><?php echo $row_registros['registros_cliente_key'] ?></td><?php } ?>
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
                        <a href="?page=registros&id=<?php echo $_GET['id'] ?>&cat=<?php echo $row_multiescolhas['categorias_id'] ?>" class="label label-default"><?php echo $row_multiescolhas['categorias_titulo'] ?></a>
                    <?php  } ?>
                </div>
            </td>
            <?php } ?>

            <td class="text-right">
            <?php if($_GET['id'] == 55){ ?>
                <?php if($row_registros['registros_texto']){ ?>
                <a href="?page=contratogerado&id=<?php echo $row_registros['registros_id'] ?>"><button type="button" class="btn btn-xs btn-success"><?php if($row_registros['registros_notificacao'] > 0){echo '<i class="fa fa-envelope"></i>';} ?> <i class="fa fa-check"></i> Contrato gerado</button></a>       
                <?php } ?>
                <a href="?page=contrato&id=<?php echo $row_registros['registros_id'] ?>"><button type="button" class="btn btn-xs btn-default"><i class="fa fa-file"></i> Gerar contrato</button></a>       
            <?php } ?>
            <?php if($_GET['id'] == 52){ ?>
                <a href="?page=registros&id=56&cliente=<?php echo $row_registros['registros_id'] ?>"><button type="button" class="btn btn-xs btn-default"><i class="fa fa-list" aria-hidden="true"></i>Briefing</button></a>       
                <a href="?page=registros&id=55&cliente=<?php echo $row_registros['registros_id'] ?>"><button type="button" class="btn btn-xs btn-default"><i class="fa fa-file"></i> Contratos</button></a>       
            <?php } ?>
            <?php if($row_paginas['paginas_fotos'] == 1){ ?>       
                <a href="?page=registros_fotos&id=<?php echo $row_registros['registros_id'] ?>"><button type="button" class="btn btn-xs btn-default"><i class="fa fa-camera"></i> Fotos</button></a>       
            <?php } ?>
            <?php if($_GET['id'] == 56){ ?>
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
<?php }else{ ?>
Nenhum registro cadastrado. <br><br>
<?php if($_GET['id'] == 55){ ?>
    <?php if(isset($_GET['cliente'])){ ?>
      <a class="btn btn-primary" href="<?php echo RAIZ_ADMIN ?>?page=registros_cadastrar&id=<?php echo $_GET['id'] ?>&cliente=<?php echo $_GET['cliente'] ?>"><i class="fa fa-plus-circle"></i> Cadastrar primeiro contrato</a>
    <?php }else{ ?>
      <a class="btn btn-primary" href="<?php echo RAIZ_ADMIN ?>?page=registros_cadastrar&id=<?php echo $_GET['id'] ?>"><i class="fa fa-plus-circle"></i> Cadastrar primeiro contrato</a>
    <?php } ?>
<?php }else{ ?>
<a class="btn btn-primary" href="<?php echo RAIZ_ADMIN ?>?page=registros_cadastrar&id=<?php echo $_GET['id'] ?>"><i class="fa fa-plus-circle"></i> Cadastrar primeiro registro</a>
<?php } ?>
<?php }?>
<div class="load-busca" style="display:none"><img src="<?php echo RAIZ_ADMIN ?>img/load.gif"></div>
<div id="retorno"></div>

<?php
if($pagina !== 0){ // Sem isto irá exibir "Página Anterior" na primeira página.
?>
<a class="btn btn-default" href="?page=registros&pagina=<?php echo $pagina-1; ?>&id=<?php echo $_GET['id']; ?>"><i class="fa fa-step-backward" aria-hidden="true"></i></a>
<?php
}
if($rows_registros > 0){
?>
<a class="btn btn-default" href="?page=registros&pagina=<?php echo $pagina+1; ?>&id=<?php echo $_GET['id']; ?>"><i class="fa fa-step-forward" aria-hidden="true"></i></a>
<?php } ?>
<div id="retorno"></div>

<script type="text/javascript">
  $('#busca-categoria').change(function(){
    cat = $(this).val();
    window.location.href="?page=registros&id=<?php echo $_GET['id'] ?>&cat="+cat
  });
  $('#filtro_cliente').change(function(){
    cliente = $(this).val();
    window.location.href="?page=registros&id=<?php echo $_GET['id'] ?>&cliente="+cliente
  });
  $('#filtro_plano').change(function(){
    plano = $(this).val();
    window.location.href="?page=registros&id=<?php echo $_GET['id'] ?>&plano="+plano
  });
  
  //FORM
 $('#busca-titulo').keyup(function(){
    $('#table-registros').hide();
    $('#table-registros').html('');
    $('.load-busca').show();
    busca = $(this).val();
    id = "<?php echo $id ?>";
    $.ajax({
            url: 'php/busca-registros.php',
            //FormulÃ¡rio sem arquivo
            data: {busca:busca, id:id},
            type: 'POST',
            dataType: "html",
            success: function(retorno){
               $('#table-registros').html(retorno);
               $('#table-registros').fadeIn(500);
         $('.load-busca').hide();
            }
        });
     $('.load-busca').hide();
  });
</script>