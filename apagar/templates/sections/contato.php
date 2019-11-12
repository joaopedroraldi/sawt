<style type="text/css">
    <?php echo $idcss ?>{background: #fff;}
    <?php echo $idcss ?> h1{color:<?php echo $cor2 ?>; margin-bottom: 50px;}
</style>
<section id="<?php echo $idCss ?>" class="text-center">
    <h1>Contato</h1>
    <form id="enviar_contato" name="enviar_contato" enctype="multipart/form-data" role="form" class="form" method="post">
        <input name="data" type="hidden" value="<?php echo date("Y-m-d H:i:s"); ?>" />
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <input required="required" class="form-control" name="nome" placeholder="Nome:" type="text" maxlength="100"/>
                </div>
                <div class="col-sm-6">
                    <input required="required" class="form-control" name="email" placeholder="E-mail:" type="email" maxlength="100"/>
                </div>
                <div class="col-sm-4">
                    <input required="required" class="form-control phone" name="telefone" placeholder="Telefone:" type="text" maxlength="15"/>
                </div>
                <div class="col-sm-4">
                    <input class="form-control phone" name="whatsapp" placeholder="Whatsapp:" type="text" maxlength="15"/>
                </div>
                <div class="col-sm-4">
                    <input required="required" class="form-control" name="cidade" placeholder="Cidade:" type="text" maxlength="100"/>
                </div>
            </div>
            <input required="required" class="form-control" name="assunto" placeholder="Assunto:" type="text" maxlength="100"/>
            <textarea class="form-control" placeholder="Mensagem:" name="mensagem"></textarea>
            <div class="g-recaptcha" data-sitekey="<?php echo $row_configuracoes['configuracoes_site_key'] ?>"></div>
            <div class="clear20"></div>
            <button type="submit" class="btn btn-padrao">Enviar formulário</button>
        </div>
    </form>
</section>
<div id="retorno"></div>