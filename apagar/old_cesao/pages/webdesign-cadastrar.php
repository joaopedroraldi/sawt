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
                <form id="webdesign-cadastrar" name="webdesign-cadastrar" enctype="multipart/form-data" role="form" class="form-inline">
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
                                        <input type="checkbox" name="hospedagem"> <span class="fa fa-suitcase"></span> Hospedagem Web Thomaz
                                    </label>
                                    <span class="fa fa-info-circle info">
                                        <div class="info-text">
                                            Tipo de hospedagem
                                        </div>
                                    </span>
                                    <ul>
                                        <li>
                                            <label class="control-label" for="hospedagemPacote">
                                                Pacote
                                                <span class="fa fa-info-circle info">
                                                    <div class="info-text">
                                                        <?php
                                                        $pacote = mysqli_query($con , "select * from pacote");
                                                        while($pacoteRow = mysqli_fetch_object($pacote)){
                                                            ?>
                                                            <ul>
                                                                <li><?php echo $pacoteRow->tipo; ?></li>
                                                                <ul>
                                                                    <li>Espaço em disco: <?php echo $pacoteRow->espacoDisco; ?></li>
                                                                    <li>Espaço em disco: <?php echo $pacoteRow->contasEmail; ?></li>
                                                                    <li>Espaço em disco: <?php echo $pacoteRow->contasFtp; ?></li>
                                                                    <li>Espaço em disco: <?php echo $pacoteRow->banda; ?></li>
                                                                </ul>
                                                            </ul>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </span>
                                            </label>
                                            <select name="hospedagemPacote" id="hospedagemPacote" class="form-control">
                                                <?php
                                                $pacote = mysqli_query($con , "select * from pacote");
                                                while($pacoteRow = mysqli_fetch_object($pacote)){
                                                    ?>
                                                    <option value="<?php echo $pacoteRow->Id; ?>">
                                                        <?php echo $pacoteRow->tipo; ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </li>
                                        <li>
                                            <label class="control-label" for="hospedagemObservacao">Observação</label>
                                            <input name="hospedagemObservacao" id="hospedagemObservacao" type="text" class="form-control observacao" placeholder="Observação" maxlength="255">
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                            </ul>

                            <!-- 2º formulário -->
                            <ul class="ul-principal">
                                <li>
                                    <label>
                                        <input type="checkbox" name="pagina"> <span class="fa fa-globe"></span> Criação de página
                                    </label>
                                    <span class="fa fa-info-circle info">
                                        <div class="info-text">
                                            Desenvolvimento de site
                                        </div>
                                    </span>
                                    <ul>
                                        <li>
                                            <label>
                                                <input name="paginaLayout" type="checkbox"> Layout
                                            </label>
                                            <span class="fa fa-info-circle info">
                                                <div class="info-text">
                                                    Desenho do site
                                                </div>
                                            </span>
                                        </li>
                                        <li>
                                            <label>
                                                <input name="paginaFront" type="checkbox"> Front-end
                                            </label>
                                            <span class="fa fa-info-circle info">
                                                <div class="info-text">
                                                    Passagem do layout para código
                                                </div>
                                            </span>
                                        </li>
                                        <li>
                                            <label>
                                                <input name="paginaBack" type="checkbox"> Back-end
                                            </label>
                                            <span class="fa fa-info-circle info">
                                                <div class="info-text">
                                                    Funções do site
                                                </div>
                                            </span>
                                        </li>
                                        <li>
                                            <label class="control-label" for="paginaManutencao">
                                                Manutenção
                                                <span class="fa fa-info-circle info">
                                                    <div class="info-text">
                                                        Se as alterações futuras do site serão cobradas por hora ou um valor mensal
                                                    </div>
                                                </span>
                                            </label>
                                            <select name="paginaManutencao" id="paginaManutencao" class="form-control">
                                                <?php
                                                $pacote = mysqli_query($con , "select * from manutencao_tipo");
                                                while($pacoteRow = mysqli_fetch_object($pacote)){
                                                    ?>
                                                <option value="<?php echo $pacoteRow->Id; ?>">
                                                    <?php echo $pacoteRow->tipo; ?>
                                                </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </li>
                                        <li>
                                            <label class="control-label" for="paginaDireitos">
                                                Diteitos
                                                <span class="fa fa-info-circle info">
                                                    <div class="info-text">
                                                        Se o cliente não vai ter acesso ao código do site os direitos são da Web Thomaz<br>Caso contrario do Cliente
                                                    </div>
                                                </span>
                                            </label>
                                            <select name="paginaDireitos" id="paginaDireitos" class="form-control">
                                                <?php
                                                $pacote = mysqli_query($con , "select * from de_quem");
                                                while($pacoteRow = mysqli_fetch_object($pacote)){
                                                    ?>
                                                <option value="<?php echo $pacoteRow->Id; ?>">
                                                    <?php echo $pacoteRow->tipo; ?>
                                                </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </li>
                                        <li>
                                            <label class="control-label" for="paginaObservacao">Observação</label>
                                            <input name="paginaObservacao" id="paginaObservacao" type="text" class="form-control observacao" placeholder="Observação" maxlength="255">
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                            <!-- 3º formulário -->
                            <ul class="ul-principal">
                                <li>
                                    <label>
                                        <input type="checkbox" name="dominio"> <span class="fa fa-chain"></span> Registro de domínio
                                    </label>
                                    <span class="fa fa-info-circle info">
                                        <div class="info-text">
                                            Link da web onde o site irá aparacer. Ex. www.meudominio.com
                                        </div>
                                    </span>
                                    <ul>
                                        <li>
                                            <label class="control-label" for="dominioResponsabilidade">
                                                Responsabilidade
                                                <span class="fa fa-info-circle info">
                                                    <div class="info-text">
                                                        Quem será responsável por gerenciar o domínio
                                                    </div>
                                                </span>
                                            </label>
                                            <select name="dominioResponsabilidade" id="dominioResponsabilidade" class="form-control">
                                                <?php
                                                $pacote = mysqli_query($con , "select * from de_quem order by Id desc");
                                                while($pacoteRow = mysqli_fetch_object($pacote)){
                                                    ?>
                                                <option value="<?php echo $pacoteRow->Id; ?>">
                                                    <?php echo $pacoteRow->tipo; ?>
                                                </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </li>
                                        <li>
                                            <label class="control-label" for="dominioDireitos">
                                                Direitos
                                                <span class="fa fa-info-circle info">
                                                    <div class="info-text">
                                                        Se o cliente não vai ter acesso ao registro do domínio os direitos são da Web Thomaz<br>Caso contrario do Cliente
                                                    </div>
                                                </span>
                                            </label>
                                            <select name="dominioDireitos" id="dominioDireitos" class="form-control">
                                                <?php
                                                $pacote = mysqli_query($con , "select * from de_quem order by Id desc");
                                                while($pacoteRow = mysqli_fetch_object($pacote)){
                                                    ?>
                                                <option value="<?php echo $pacoteRow->Id; ?>">
                                                    <?php echo $pacoteRow->tipo; ?>
                                                </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </li>
                                        <li>
                                            <label class="control-label" for="dominioObservacao">Observação</label>
                                            <input name="dominioObservacao" id="dominioObservacao" type="text" class="form-control observacao" placeholder="Observação" maxlength="255">
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                            <!-- 4º formulário -->
                            <ul class="ul-principal">
                                <li>
                                    <label>
                                        <input type="checkbox" name="manutencao"> <span class="fa fa-wrench"></span> Manutenção de terceiros
                                    </label>
                                    <span class="fa fa-info-circle info">
                                        <div class="info-text">
                                            Cado o cliente já tenha um site de um terceiro e queira que a Web Thomaz faça a manutenção no mesmo
                                        </div>
                                    </span>
                                    <ul>
                                        <li>
                                            <label class="control-label" for="manutencaoManutencao">
                                                Tipo
                                                <span class="fa fa-info-circle info">
                                                    <div class="info-text">
                                                        Se as alterações futuras do site serão cobradas por hora ou um valor mensal
                                                    </div>
                                                </span>
                                            </label>
                                            <select name="manutencaoManutencao" id="manutencaoManutencao" class="form-control">
                                                <?php
                                                $pacote = mysqli_query($con , "select * from manutencao_tipo");
                                                while($pacoteRow = mysqli_fetch_object($pacote)){
                                                    ?>
                                                <option value="<?php echo $pacoteRow->Id; ?>">
                                                    <?php echo $pacoteRow->tipo; ?>
                                                </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </li>
                                        <li>
                                            <label class="control-label" for="manutencaoObservacao">Observação</label>
                                            <input name="manutencaoObservacao" id="manutencaoObservacao" type="text" class="form-control observacao" placeholder="Observação" maxlength="255">
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