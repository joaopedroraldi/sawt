<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Cadastro de serviços</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Selecione os campos a seguir
            </div>
            <div class="panel-body">
                <form id="publicidade-cadastrar" name="publicidade-cadastrar" enctype="multipart/form-data" role="form" class="form-inline">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Empresa</label>
                                <select name="empresaId" class="form-control">
                                    <?php
                                    $empresaId = 0;
                                    if(isset($_COOKIE['pegaId'])){ 
                                        $empresaId = strip_tags(trim(utf8_decode($_COOKIE['pegaId']))); 
                                    }

                                    $cliente_empresa = mysqli_query($con, "select * from cliente_empresa"); 
                                    while($cliente_empresaRow = mysqli_fetch_object($cliente_empresa)){
                                        ?>
                                        <option value="<?php echo $cliente_empresaRow->Id; ?>" <?php if($cliente_empresaRow->Id == $empresaId){ echo "selected"; } ?> >
                                            <?php echo $cliente_empresaRow->nomeFantasia; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- 1º formulário -->
                            <ul class="ul-principal">
                                <li>
                                    <label>
                                        <input type="checkbox" name="criacao_de_logo"> <span class="fa fa-behance-square"></span> Criação de logo
                                    </label>
                                    <span class="fa fa-info-circle info">
                                        <div class="info-text">
                                            Descrição
                                        </div>
                                    </span>
                                    <ul>
                                        <li>
                                            <label class="control-label" for="criacao_de_logoObservacao">Observação</label>
                                            <input name="criacao_de_logoObservacao" id="criacao_de_logoObservacao" type="text" class="form-control observacao" placeholder="Observação" maxlength="255">
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                            </ul>

                            <!-- 2º formulário -->
                            <ul class="ul-principal">
                                <li>
                                    <label>
                                        <input type="checkbox" name="design"> <span class="fa fa-crop"></span> Design
                                    </label>
                                    <span class="fa fa-info-circle info">
                                        <div class="info-text">
                                            Descrição
                                        </div>
                                    </span>
                                    <ul>
                                        <li>
                                            <label>
                                                <input name="designCatalogo" type="checkbox"> Catalogo
                                            </label>
                                            <span class="fa fa-info-circle info">
                                                <div class="info-text">
                                                    Descrição
                                                </div>
                                            </span>
                                        </li>
                                        <li>
                                            <label>
                                                <input name="designCartao" type="checkbox"> Cartão
                                            </label>
                                            <span class="fa fa-info-circle info">
                                                <div class="info-text">
                                                    Descrição
                                                </div>
                                            </span>
                                        </li>
                                        <li>
                                            <label>
                                                <input name="designBanner" type="checkbox"> Banner
                                            </label>
                                            <span class="fa fa-info-circle info">
                                                <div class="info-text">
                                                    Descrição
                                                </div>
                                            </span>
                                        </li>
                                        <li>
                                            <label>
                                                <input name="designOutdoor" type="checkbox"> Outdoor
                                            </label>
                                            <span class="fa fa-info-circle info">
                                                <div class="info-text">
                                                    Descrição
                                                </div>
                                            </span>
                                        </li>
                                        <li>
                                            <label>
                                                <input name="designMidiakit" type="checkbox"> Midia Kit
                                            </label>
                                            <span class="fa fa-info-circle info">
                                                <div class="info-text">
                                                    Descrição
                                                </div>
                                            </span>
                                        </li>
                                        <li>
                                            <label>
                                                <input name="designPapelaria" type="checkbox"> Papelaria
                                            </label>
                                            <span class="fa fa-info-circle info">
                                                <div class="info-text">
                                                    Descrição
                                                </div>
                                            </span>
                                        </li>
                                        <li>
                                            <label>
                                                <input name="designAssinaturaEmail" type="checkbox"> Assinatura para E-Mail
                                            </label>
                                            <span class="fa fa-info-circle info">
                                                <div class="info-text">
                                                    Descrição
                                                </div>
                                            </span>
                                        </li>                       
                                        <li>
                                            <label class="control-label" for="designObservacao">Observação</label>
                                            <input name="designObservacao" id="designObservacao" type="text" class="form-control observacao" placeholder="Observação" maxlength="255">
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                            <!-- 3º formulário -->
                            <ul class="ul-principal">
                                <li>
                                    <label>
                                        <input type="checkbox" name="email_marketing"> <span class="fa fa-envelope-o"></span> E-Mail Marketing
                                    </label>
                                    <span class="fa fa-info-circle info">
                                        <div class="info-text">
                                            Descrição
                                        </div>
                                    </span>
                                    <ul>
                                        <li>
                                            <label>
                                                <input name="email_marketingRedacao" type="checkbox"> Redação
                                            </label>
                                            <span class="fa fa-info-circle info">
                                                <div class="info-text">
                                                    Descrição
                                                </div>
                                            </span>
                                        </li>
                                        <li>
                                            <label>
                                                <input name="email_marketingDesign" type="checkbox"> Design
                                            </label>
                                            <span class="fa fa-info-circle info">
                                                <div class="info-text">
                                                    Descrição
                                                </div>
                                            </span>
                                        </li>
                                        <li>
                                            <label>
                                                <input name="email_marketingDisparo" type="checkbox"> Disparo
                                            </label>
                                            <span class="fa fa-info-circle info">
                                                <div class="info-text">
                                                    Descrição
                                                </div>
                                            </span>
                                        </li>
                                        <li>
                                            <label>
                                                <input name="email_marketingRelatorio" type="checkbox"> Relatório
                                            </label>
                                            <span class="fa fa-info-circle info">
                                                <div class="info-text">
                                                    Descrição
                                                </div>
                                            </span>
                                        </li>
                                        <li>
                                            <label>
                                                <input name="email_marketingBancoEmails" type="checkbox"> Banco de E-Mails
                                            </label>
                                            <span class="fa fa-info-circle info">
                                                <div class="info-text">
                                                    Descrição
                                                </div>
                                            </span>
                                        </li>                                    
                                        <li>
                                            <label class="control-label" for="email_marketingObservacao">Observação</label>
                                            <input name="email_marketingObservacao" id="email_marketingObservacao" type="text" class="form-control observacao" placeholder="Observação" maxlength="255">
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                            <!-- 4º formulário -->
                            <ul class="ul-principal">
                                <li>
                                    <label>
                                        <input type="checkbox" name="facebook"> <span class="fa fa-facebook-square"></span> Facebook
                                    </label>
                                    <span class="fa fa-info-circle info">
                                        <div class="info-text">
                                            Descrição
                                        </div>
                                    </span>
                                    <ul>
                                        <li>
                                            <label>
                                                <input name="facebookRedacao" type="checkbox"> Redação
                                            </label>
                                            <span class="fa fa-info-circle info">
                                                <div class="info-text">
                                                    Descrição
                                                </div>
                                            </span>
                                        </li>
                                        <li>
                                            <label class="control-label" for="facebookImagens">
                                                Imagens
                                                <span class="fa fa-info-circle info">
                                                    <div class="info-text">
                                                        Descrição
                                                    </div>
                                                </span>
                                            </label>
                                            <select name="facebookImagens" id="facebookImagens" class="form-control">
                                                <?php
                                                $imagens = mysqli_query($con , "select * from imagens");
                                                while($imagensRow = mysqli_fetch_object($imagens)){
                                                    ?>
                                                    <option value="<?php echo $imagensRow->Id; ?>"><?php echo $imagensRow->tipo; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </li>
                                        <li>
                                            <label class="control-label" for="facebookImpulsionamento">
                                                Impulsionamento
                                                <span class="fa fa-info-circle info">
                                                    <div class="info-text">
                                                        Descrição
                                                    </div>
                                                </span>
                                            </label>
                                            <select name="facebookImpulsionamento" id="facebookImpulsionamento" class="form-control">
                                                <?php
                                                $impulsionamento = mysqli_query($con , "select * from impulsionamento");
                                                while($impulsionamentoRow = mysqli_fetch_object($impulsionamento)){
                                                    ?>
                                                    <option value="<?php echo $impulsionamentoRow->Id; ?>"><?php echo $impulsionamentoRow->tipo; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </li>
                                        <li>
                                            <label class="control-label" for="facebookFrequenciaQuantidade">Frequência quantidade</label>
                                            <input name="facebookFrequenciaQuantidade" id="facebookFrequenciaQuantidade" type="text" class="form-control observacao" placeholder="Frequência quantidade" maxlength="255">
                                        </li>
                                        <li>
                                            <label class="control-label" for="facebookfrequenciaDiasSenama">Frequência dias da semana</label>
                                            <input name="facebookfrequenciaDiasSenama" id="facebookfrequenciaDiasSenama" type="text" class="form-control observacao" placeholder="Frequência dias da semana" maxlength="255">
                                        </li>
                                        <li>
                                            <label class="control-label" for="facebookObservacao">Observação</label>
                                            <input name="facebookObservacao" id="facebookObservacao" type="text" class="form-control observacao" placeholder="Observação" maxlength="255">
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" data-loading-text="Carregando..." autocomplete="off"><i class="fa fa-save fa-fw"></i> Cadastrar serviços</button>
                </form>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->