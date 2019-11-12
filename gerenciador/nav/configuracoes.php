<?php 
$query = "SELECT * FROM configuracoes";
$configuracoes = mysqli_query($config, $query) or die(mysqli_error());
$row_configuracoes = mysqli_fetch_assoc($configuracoes);
?>



<h1>Configurações</h1>
<ol class="breadcrumb">
    <li>
        <a href="index.php">Dashboard</a>
    </li>
    <li class="active">
        Configurações
    </li>   
</ol>


<div class="row">
    <div class="col-lg-12">
        <form id="configuracoes_editar" name="configuracoes_editar" enctype="multipart/form-data" class="form">
            <h4>Dados do site</h4>
            <div class="form-group">
                <label>Titulo do site</label>
                <input name="configuracoes_titulo" class="form-control" value="<?php echo $row_configuracoes['configuracoes_titulo'] ?>">
            </div>
            <div class="form-group">
                <label>Logo</label>
                <div class="clear"></div>
                <?php if(!empty($row_configuracoes['configuracoes_logo'])){ ?>
                <div class="thumbnail" style="float:left;padding:10px; width:150px; height:150px;"><img src="<?php echo RAIZ_ADMIN ?>timthumb.php?src=<?php echo RAIZ_ADMIN ?>uploads/<?php echo $row_configuracoes['configuracoes_logo'] ?>&zc=2&w=150&h=150"></div>
                <input name="configuracoes_logo" class="form-control" value="<?php echo $row_configuracoes['configuracoes_logo'] ?>" type="hidden">
                <?php } ?>
                <input name="configuracoes_logo_nova" class="form-control" type="file">
            </div>
            <div class="form-group">
                <label>Favicon</label>
                <div class="clear"></div>
                <?php if(!empty($row_configuracoes['configuracoes_favicon'])){ ?>
                <div class="thumbnail" style="float:left;padding:10px; "><?php echo $row_configuracoes['configuracoes_favicon'] ?></div>
                <input name="configuracoes_favicon" class="form-control" value="<?php echo $row_configuracoes['configuracoes_favicon'] ?>" type="hidden">
                <?php } ?>
                <input name="configuracoes_favicon_nova" class="form-control" type="file">
            </div>
           
            <div class="form-group">
                <label>E-mail para envio de formulário</label>
                <input name="configuracoes_email_formulario" class="form-control" value="<?php echo $row_configuracoes['configuracoes_email_formulario'] ?>">
            </div>
            <hr>
            <h4>Integrações</h4>
            <div class="form-group">
                <label>Google maps</label>
                <textarea name="configuracoes_mapa" class="form-control"><?php echo $row_configuracoes['configuracoes_mapa'] ?></textarea>
            </div>
            <div class="form-group">
                <label>Box Facebook</label>
                <p style="font-size:12px; color:#999"><i class="fa fa-info-circle"></i> Adicione o nome de url da página do facebook. Ex: copie a partir do que fica após o endereço "facebook.com/"</p>
                <input name="configuracoes_idfacebook" class="form-control" value="<?php echo $row_configuracoes['configuracoes_idfacebook'] ?>">
            </div>
            <hr>
            <h4>Dados técnicos</h4>
            <div class="form-group">
                <label>Meta Tags</label>
                <input name="configuracoes_metatags" class="form-control" value="<?php echo $row_configuracoes['configuracoes_metatags'] ?>">
            </div>
            <div class="form-group">
                <label>Meta Descrição</label>
                <input name="configuracoes_metadescription" class="form-control" value="<?php echo $row_configuracoes['configuracoes_metadescription'] ?>">
            </div>
            <div class="form-group">
                <label>Google Analytics</label>
                <textarea name="configuracoes_analytics" class="form-control"><?php echo $row_configuracoes['configuracoes_analytics'] ?></textarea>
            </div>
            <div class="form-group">
                <label>Google Recaptcha Secret Key</label>
                <input name="configuracoes_secret_key" class="form-control" value="<?php echo $row_configuracoes['configuracoes_secret_key'] ?>">
            </div>
            <div class="form-group">
                <label>Google Recaptcha Site Key</label>
                <input name="configuracoes_site_key" class="form-control" value="<?php echo $row_configuracoes['configuracoes_site_key'] ?>">
            </div>
            <input type="submit" class="btn btn-primary" value="Atualizar">
        </form>
    </div>
</div>

<div id="retorno"></div>

