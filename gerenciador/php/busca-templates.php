<h3>Templates</h3>
<?php 
include('../cn/config.php');

$busca = $_POST['busca_template'];

$query = "SELECT paginas_id, paginas_titulo FROM paginas";
$paginas = mysqli_query($config, $query) or die(mysqli_error());
$pagina = array();
while($row_paginas = mysqli_fetch_assoc($paginas)){
  $paginaTitulo = $row_paginas['paginas_titulo'];
  $pagina["$paginaTitulo"] = $row_paginas['paginas_id'];        
}

$query = "SELECT * FROM templates WHERE templates_tags LIKE '%$busca%' AND templates_header = 0 AND templates_footer = 0";
$templates = mysqli_query($config, $query) or die(mysqli_error());
while ($row_templates = mysqli_fetch_assoc($templates)){
?>
<form method="post" enctype="multipart/form-data" class="templatesOpcoes">
  <div style="margin-bottom:10px;" class="template-grid transition">
    <div class="row">
      <div class="col-sm-4 transition">
        <img src="<?php echo RAIZ_ADMIN ?>timthumb.php?src=<?php echo RAIZ_ADMIN ?>uploads/templates/<?php echo $row_templates['templates_imagem'] ?>&zc=2&w=500&h=370" class="img-responsive transition">
      </div>
      <div class="col-sm-8 text-right">
        <input type="hidden" name="templates_home_templatesid" value="<?php echo $row_templates['templates_id'] ?>">
        <h4><?php echo $row_templates['templates_titulo'] ?></h4>
        <input type="text" name="templates_home_titulo" class="form-control" placeholder="Nome do template">
        <input type="text" name="templates_home_idcss" class="form-control" placeholder="ID">
        <div class="clear10"></div>
        <label>
        <select class="form-control" name="templates_home_idpg">
              <option value="">Página</option>
          <?php foreach ($pagina as $key => $value) { ?>
              <option value="<?php echo $value ?>"><?php echo $key ?></option>
          <?php } ?>
        </select>
        </label>
        <div class="clear10"></div>
        <button type="submit" class="btn btn-primary btn-add-template"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Enviar</button>
      </div>
    </div>
  </div>
</form>
<?php } ?>


<script type="text/javascript">
  $(document).ready(function(){
    $('.templatesOpcoes img').click(function(){
      $(this).parent().toggleClass('col-sm-4');
    });

    $('.templatesOpcoes').submit(function(e){
      $('.load').show();
      e.preventDefault();
      $.ajax({
        url: 'php/template_home_add.php',
        data: new FormData(this),
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: "html",
        success:function(retorno){
           $('#retorno').html(retorno);
        }
      });
    });
  });
</script>