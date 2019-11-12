<style type="text/css">
  .form-control{height: 30px; margin-bottom: 2px; border-radius: 0; }
  .tabela_templates td{padding: 3px; color: #777}
  .tabela_templates input{border:none; font-weight: bold;}
</style>
<div class="row">
  <div class="col-sm-8">
    <a class="btn btn-default" href="<?php echo RAIZ_ADMIN ?>?page=templates"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar</a>
    <h1 class="titulo-templates">Templates Home</h1>
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
  <li><a href="?page=templates">Templates</a></li>
  <li>Templates Home</li>
</ol>

<div class="clear20"></div>

<div class="templates-border">
  <h3>Header</h3>
  <hr>
  <?php 
  $query = "SELECT * FROM templates WHERE templates_header = 1 and templates_header_ok = 1";
  $templates = mysqli_query($config, $query) or die(mysqli_error());
  $row_templates = mysqli_fetch_assoc($templates);
  ?>
  <img src="<?php echo RAIZ_ADMIN ?>uploads/templates/<?php echo $row_templates['templates_imagem'] ?>" class="img-responsive">
  <hr>
  <a class="btn btn-warning" role="button" data-toggle="collapse" href="#alterarHeader" aria-expanded="false" aria-controls="alterarHeader"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Alterar header</a>
  <div class="clear20"></div>
  <div class="collapse" id="alterarHeader">
    <div class="row">
      <form id="header_salvar" method="post" enctype="multipart/form-data" class="form">
        <?php 
        $query = "SELECT * FROM templates WHERE templates_header = 1";
        $templates = mysqli_query($config, $query) or die(mysqli_error());
        while($row_templates = mysqli_fetch_assoc($templates)){
        ?>
          <div class="col-sm-3">
            <label>
              <center>
                <div class="template-grid <?php if($row_templates['templates_header_ok'] == 1){echo "active";} ?>">
                  <img src="<?php echo RAIZ_ADMIN ?>timthumb.php?src=<?php echo RAIZ_ADMIN ?>uploads/templates/<?php echo $row_templates['templates_imagem'] ?>&zc=2&w=370&h=370" class="img-responsive">
                  <h4><?php echo $row_templates['templates_titulo'] ?></h4>
                  <input <?php if($row_templates['templates_header_ok'] == 1){echo "checked=checked"; }?> type="radio" name="templates_header" value="<?php echo $row_templates['templates_id'] ?>">
                </div>
              </center>
            </label>
          </div>
        <?php } ?>
        <div class="clear20"></div>
        <div class="col-sm-12">
          <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="clear20"></div>
  
<div class="templates-border" style="background:#eee">
  <div class="row">
    <div class="clear10"></div>
    <div class="col-sm-4">
      <h4>Filtrar templates</h4>
      <form method="post" enctype="multipart/form-data" id="busca-template">
        <input type="text" class="form-control busca_template" name="busca_template" placeholder="Encontre um template:">
      </form>
    </div>
    <div class="clear10"></div>
    <div class="col-sm-4 buscar-templates">
        <h3>Templates</h3>
        <a style="width:100%" class="btn btn-default" role="button" data-toggle="collapse" href="#todosTemplates" aria-expanded="false" aria-controls="todosTemplates"><i class="fa fa-list" aria-hidden="true"></i> Ver todos</a>
        <div class="collapse" id="todosTemplates">
          <?php 
          $query = "SELECT paginas_id, paginas_titulo FROM paginas";
          $paginas = mysqli_query($config, $query) or die(mysqli_error());
          $pagina = array();
          while($row_paginas = mysqli_fetch_assoc($paginas)){
            $paginaTitulo = $row_paginas['paginas_titulo'];
            $pagina["$paginaTitulo"] = $row_paginas['paginas_id'];    
          }

          $query = "SELECT paginas_id, paginas_titulo FROM paginas";
          $paginas = mysqli_query($config, $query) or die(mysqli_error());
          $pagina2 = array();
          while($row_paginas = mysqli_fetch_assoc($paginas)){
            $pagina2[$row_paginas['paginas_id']] = $row_paginas['paginas_titulo'];    
          }

          // print_r($pagina);
          $query = "SELECT * FROM templates WHERE templates_header = 0 and templates_footer = 0";
          $templates = mysqli_query($config, $query) or die(mysqli_error());
          while($row_templates = mysqli_fetch_assoc($templates)){
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
        </div>
    </div>

    <div class="col-sm-8">
      <h3>Home</h3>
        <div id="templatesHome" >
          <!-- <form method="post" enctype="multipart/form-data" id="templates_ordem_alterar"> -->
          <div id="templates_ordem_alterar">
            <?php 
            $query = "SELECT th.*, 
            (select t.templates_imagem from templates as t where th.templates_home_templatesid = t.templates_id) as templates_home_imagem,
            (select t.templates_arquivo from templates as t where th.templates_home_templatesid = t.templates_id) as templates_home_arquivo
            FROM templates_home as th 
            ORDER BY templates_home_ordem";

            $templates = mysqli_query($config, $query) or die(mysqli_error());
            while($row_templates = mysqli_fetch_assoc($templates)){
            ?>
            <div class="templatesOpcoes">
              <form method="post" enctype="multipart/form-data" class="templates_opcoes_atualizar">
                <input type="hidden" name="templates_home_id" value="<?php echo $row_templates['templates_home_id'] ?>">
                <div style="margin-bottom:10px;" class="template-grid transition">
                  <div class="row">
                    <div class="col-sm-4 transition">
                      <img src="<?php echo RAIZ_ADMIN ?>timthumb.php?src=<?php echo RAIZ_ADMIN ?>uploads/templates/<?php echo $row_templates['templates_home_imagem'] ?>&zc=2&w=700&h=370" class="img-responsive transition" style="background: #eee;">
                    </div>
                    <div class="col-sm-6">
                      <table class="tabela_templates">
                        <tr>
                          <td align="right">Titulo:</td>
                          <td><input class="template_input" type="text" name="templates_home_titulo" value="<?php echo $row_templates['templates_home_titulo'] ?>"></td>
                        </tr>
                        <tr>
                          <td align="right">#</td>
                          <td><input class="template_input" type="text" name="templates_home_idcss" value="<?php echo $row_templates['templates_home_idcss'] ?>"></td>
                        </tr>
                        <tr>
                          <td align="right">Página:</td>
                          <td>
                            <select name="templates_home_idpg">
                              <?php foreach ($pagina2 as $key => $value) { ?>
                                  <option <?php if($key == $row_templates['templates_home_idpg']){echo "selected='selected'";} ?> value="<?php echo $key ?>"><?php echo $value ?></option>
                              <?php } ?>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td align="right">Arquivo:</td>
                          <td><?php echo $row_templates['templates_home_arquivo'] ?></td>
                        </tr>
                      </table>
                      
                    </div>
                    <div class="col-sm-2 text-right">
                      <button type="submit" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                      <a arquivo="templates_home_deletar" tabela="templates_home" idreg="<?php echo $row_templates['templates_home_id'] ?>" class="btn btn-danger bt-deletar"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </div>
                  </div>
                </div>
                <div class="idTemplate" idTemplate="<?php echo $row_templates['templates_home_id'] ?>"></div>
              </form>
            </div>
            <?php } ?> 
          <div class="clear20"></div>
          <button type="submit" class="btn btn-primary botao-salvar-ordem"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="clear20"></div>

<div class="templates-border">
  <h3>Footer</h3>
  <hr>
  <?php 
  $query = "SELECT * FROM templates WHERE templates_footer = 1 and templates_footer_ok = 1";
  $templates = mysqli_query($config, $query) or die(mysqli_error());
  $row_templates = mysqli_fetch_assoc($templates);
  ?>
  <img src="<?php echo RAIZ_ADMIN ?>uploads/templates/<?php echo $row_templates['templates_imagem'] ?>" class="img-responsive">
  <hr>
  <a class="btn btn-warning" role="button" data-toggle="collapse" href="#alterarFooter" aria-expanded="false" aria-controls="alterarFooter"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Alterar Footer</a>
  <div class="clear20"></div>
  <div class="collapse" id="alterarFooter">
    <div class="row">
      <form id="footer_salvar" method="post" enctype="multipart/form-data" class="form">
        <?php 
        $query = "SELECT * FROM templates WHERE templates_footer = 1";
        $templates = mysqli_query($config, $query) or die(mysqli_error());
        while($row_templates = mysqli_fetch_assoc($templates)){
        ?>
          <div class="col-sm-3">
            <label>
              <center>
                <div class="template-grid <?php if($row_templates['templates_footer_ok'] == 1){echo "active";} ?>">
                  <img src="<?php echo RAIZ_ADMIN ?>timthumb.php?src=<?php echo RAIZ_ADMIN ?>uploads/templates/<?php echo $row_templates['templates_imagem'] ?>&zc=2&w=370&h=370" class="img-responsive">
                  <h4><?php echo $row_templates['templates_titulo'] ?></h4>
                  <input <?php if($row_templates['templates_footer_ok'] == 1){echo "checked=checked"; }?> type="radio" name="templates_footer" value="<?php echo $row_templates['templates_id'] ?>">
                </div>
              </center>
            </label>
          </div>
        <?php } ?>
        <div class="clear20"></div>
        <div class="col-sm-12">
          <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div id="retorno"></div>
<style type="text/css">
  .templates-border{padding: 20px; border: solid 1px #eee; width: 100%; float: left;}
  .template-grid{padding: 20px; border: solid 2px #eee; background: #fff}
  .template-grid:hover{border-color: #009CDF}
  .template-grid:active{-webkit-box-shadow: 4px 4px 28px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 4px 4px 28px 0px rgba(0,0,0,0.75);
box-shadow: 4px 4px 28px 0px rgba(0,0,0,0.75);}
  .template-grid.active{border-color: #009CDF;}
</style>


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

  $('.templates_opcoes_atualizar').submit(function(e){
    $('.load').show();
    e.preventDefault();
    $.ajax({
      url: 'php/templates_home_editar.php',
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

  $("#templates_ordem_alterar").sortable();
  $("#templates_ordem_alterar").disableSelection();

  $('.botao-salvar-ordem').click(function(e){
        $('.load').show();
        e.preventDefault();
       
        cont = 0;
        var ordemTemplates = {};
        $('#templates_ordem_alterar .templatesOpcoes').each(function(){
            cont++;
            idTemplate = $(this).find('.idTemplate').attr('idTemplate');
            ordemTemplates[idTemplate] = cont;
            // $(this).find('input.templates_home_idordem').val(cont);
        });

        $.ajax({
            url: 'php/templates_ordem_alterar.php',
            data: ordemTemplates,
            type: 'POST',
            dataType: 'html',
            success:function(retorno){
               $('.load').hide();
              swal({
                title: "Ordem alterada!",
                type: "success",
                confirmButtonColor: "#222222",
                confirmButtonText: "Ok",
                closeOnConfirm: false
              },function(){
                location.reload();
              });
            }
        });
    });

   //FORM
   $('#busca-template .busca_template').keyup(function(){
      $('.buscar-templates').html('');
      $('.load').show();
      busca = $(this).val();
      $.ajax({
              url: 'php/busca-templates.php',
              //FormulÃ¡rio sem arquivo
              data: $(this).serialize(),
              type: 'POST',
              dataType: "html",
              success: function(retorno){
                 $('.buscar-templates').html(retorno);
                 $('.load').hide();
              }
          });
       $('.load').hide();
    });
});
</script>