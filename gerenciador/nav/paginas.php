<div class="row">
  <div class="col-sm-8">
    <h1>Páginas</h1>
  </div>

  <div class="col-sm-4 text-right">
    <div class="clear20 hidden-xs"></div>
    <a class="btn btn-primary" href="<?php echo RAIZ_ADMIN ?>?page=paginas_cadastrar"><i class="fa fa-plus-circle"></i> Nova página</a>
    <div class="clear20 visible-xs"></div>
  </div>
</div>

<ol class="breadcrumb">
  <li><a href="<?php echo RAIZ_ADMIN ?>">Home</a></li>
  <li><a href="<?php echo RAIZ_ADMIN ?>?page=paginas">Páginas</a></li>
</ol>


<?php 
$query = "SELECT * FROM paginas ORDER BY paginas_id DESC";
//$query = "SELECT * FROM paginas ORDER BY paginas_ordem_menu ASC";
$paginas = mysqli_query($config, $query) or die(mysqli_error());
$row_paginas = mysqli_fetch_assoc($paginas);
$rows_paginas = mysqli_num_rows($paginas);
if($row_paginas['paginas_id'] ){
?>

<div class="clear20"></div>

<a class="btn btn-default selecionarTudo"><i class="fa fa-check-square-o" aria-hidden="true"></i> Selecionar todos</a>

<div class="clear10"></div>
<div class="table-responsive">
  <table class="table table-hover">
    <tr>
      <th>Nome</th>
      <th></th>
    </tr>
    <form id="paginas_deletar_selecionadas" method="post" enctype="multipart/form-data">
    <?php do{ ?>
    <tr>
        <td><label style="width:100%; font-weight:normal; cursor:pointer">
          <input type="checkbox" class="marcar" name="paginasMarcadas[]" value="<?php echo $row_paginas['paginas_id'] ?>">
            <?php echo $row_paginas['paginas_titulo'] ?>
        </label>
        </td>
        <td class="text-right">       
            <a href="?page=paginas_editar&id=<?php echo $row_paginas['paginas_id'] ?>"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i> Editar</button></a>         
            <a arquivo="paginas_deletar" tabela="paginas" idreg="<?php echo $row_paginas['paginas_id'] ?>" class="btn btn-danger bt-deletar"><i class="fa fa-trash-o"></i> Excluir</a>           
        </td>
    </tr>
    <?php }while($row_paginas = mysqli_fetch_assoc($paginas)); ?> 
    <tr>
      <td>
      <button type="submit" class="btn btn-danger btn-deletar-selecionados" style="display:none">Excluir selecionados</button>
      </td>
      <td></td>
    </tr>
    </form>
  </table>
</div>
<?php
}else{
  echo "Nenhuma página cadastrado";
}

?>﻿


<a class="btn btn-default btn-ordem"><i class="fa fa-exchange" aria-hidden="true"></i> Alterar ordem do menu</a>
<div class="clear20"></div>


<?php 
$query = "SELECT * FROM paginas WHERE paginas_menu = 1 ORDER BY paginas_ordem_menu ASC";
$paginas = mysqli_query($config, $query) or die(mysqli_error());
$row_paginas = mysqli_fetch_assoc($paginas);
$rows_paginas = mysqli_num_rows($paginas);
if($row_paginas['paginas_id'] ){
?>
<form id="paginas_ordem" style="display:none" method="post" enctype="multipart/form-data">
  <ul id="sortable" class="list-group">
    <?php do{ ?>
    <li class="ui-state-default list-group-item">
      <i class="fa fa-arrows-v" aria-hidden="true"></i> <?php echo $row_paginas['paginas_titulo'] ?>
      <input type="hidden" name="<?php echo $row_paginas['paginas_id'] ?>" value="">
    </li>
    <?php }while($row_paginas = mysqli_fetch_assoc($paginas)); ?> 
  </ul>
  <button class="btn btn-primary btn-salvar" type="submit">Salvar</button>
</form>
<?php
}else{
  echo "Nenhuma página cadastrado";
}
mysqli_close($config);
?>﻿
<div id="retorno"></div>



<script type="text/javascript">
$('.selecionarTudo').click(function(){
    if($( '.marcar' ).prop( "checked" ) == true){
           // alert('desmarcado')
           $( '.marcar' ).prop( "checked" , false)
           $('.btn-deletar-selecionados').hide(); 
    } else {
         // alert('marcado')
         $( '.marcar' ).prop( "checked" , true)
         $('.btn-deletar-selecionados').show(); 
    }
});

$('.marcar').click(function(){
    $('.btn-deletar-selecionados').show();
});



$('#paginas_deletar_selecionadas').submit(function(e){
    e.preventDefault();
    $.ajax({
        url: 'php/paginas_deletar_selecionadas.php',
        data: $(this).serialize(),
        type: 'POST',
        dataType: 'html',
        success:function(retorno){
             $('#retorno').html(retorno);
           //window.location.reload();
        }
    });
});

</script>