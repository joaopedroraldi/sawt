<section id="contato" class="formularios">
    <div class="clear40"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <form id="enviar_curriculo" name="enviar_curriculo" enctype="multipart/form-data" role="form" class="form" method="post">
                    <h2>Quer fazer parte da equipe?</h2>
                    <h5>Envie seu currículo venha fazer parte do nosso seleto grupo. <br>
                    </h5>
                    <div class="form-group">
                        <div class="input-group">
                            <input required="required" class="form-control" name="nome" placeholder="Nome:" type="text" maxlength="100"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input required="required" class="form-control" type="email" name="email" placeholder="Email:" maxlength="100"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input required="required" class="form-control" type="number" name="telefone" placeholder="Telefone:" maxlength="100"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input required="required" class="form-control" type="text" name="cidade" placeholder="Cidade/UF:" maxlength="100"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input required="required" class="form-control" name="area" placeholder="Área desejada:" type="text" maxlength="15"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            Anexe seu currículo
                            <input required="required" class="form-control" name="curriculo" placeholder="Área desejada:" type="file"/>
                        </div>
                    </div>
                    
                    <div class="g-recaptcha" data-sitekey="<?php echo $row_configuracoes['configuracoes_site_key'] ?>"></div>
                    <div class="clear20"></div>
                    <button type="submit" class="btn btn-padrao transition" >Enviar Currículo</button>
                </form>
            </div>
            <div class="col-sm-6 hidden-xs hidden-sm">
                <?php while($row_registros = mysqli_fetch_assoc($registros)){ ?>
                <h3><?php echo $row_registros['registros_titulo'] ?></h3>
                <?php echo $row_registros['registros_texto'] ?>
                <div class="clear100"></div>
                <?php if(!empty($row_registros['registros_imagem'])){ ?>
                <img src="<?php echo RAIZ ?>gerenciador/uploads/<?php echo $row_registros['registros_imagem'] ?>" class="img-responsive">
                <?php } ?>
                <?php } ?>
            </div>
        </div><!-- row -->
    </div><!-- container -->
<div class="clear40"></div>
</section>
  
<div id="retorno"></div>