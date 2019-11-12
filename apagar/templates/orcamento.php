<section id="contato">
    <div class="clear40"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h2>Solicite um orçamento pelo formulário</h2>
                <h5>Envie uma mensagem para nós ou deixe seus dados<br> que entraremos em contato com você</h5>
                <div class="clear20"></div>
                <form id="enviar_contato" name="enviar_contato" enctype="multipart/form-data" role="form" class="form" method="post">
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
                            <input required="required" class="form-control phone" name="telefone" placeholder="Telefone:" type="text" maxlength="15"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input required="required" class="form-control" name="assunto" placeholder="O que deseja orçar?:" type="text" maxlength="100"/> 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <textarea class="form-control" name="mensagem" placeholder="Mensagem" maxlength="500"></textarea>
                        </div>
                    </div>
                    <div class="g-recaptcha" data-sitekey="<?php echo $row_configuracoes['configuracoes_site_key'] ?>"></div>
                    <div class="clear20"></div>
                    <button type="submit" class="btn btn-primary">Enviar formulário</button>
                </form>
                <div class="clear20"></div>
                <div class="clear40"></div>
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2F<?php echo $row_configuracoes['configuracoes_idfacebook']; ?>%2F&tabs&width=500&height=264&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="500" height="264" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
            </div>
            <div class="col-sm-5 col-sm-offset-1">
                <h2>Solicite um orlamento</h2>
                <h5>Entraremos em contato para mais detalhes</h5>
                <div class="clear20"></div>
                <?php while($row_registros = mysqli_fetch_assoc($registros)){ ?>
                    <h4><?php echo $row_registros['registros_titulo'] ?></h4>
                    <?php echo $row_registros['registros_texto'] ?>
                    <div class="clear40"></div>
                <?php } ?>
            </div>
        </div><!-- row -->
    </div><!-- container -->

</section>

<div class="clear40"></div>
<?php echo $row_configuracoes['configuracoes_mapa'] ?>


<div id="retorno"></div>