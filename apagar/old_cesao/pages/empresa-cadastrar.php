<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Cadastro de empresa</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Preencha os campos a seguir
            </div>
            <div class="panel-body">
                <form id="empresa-cadastrar" name="empresa-cadastrar" enctype="multipart/form-data" role="form" class="form">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Responsavel</label>
                                <select name="responsavelId" class="form-control">
                                    <?php
                                    $responsavelId = 0;
                                    if(isset($_COOKIE['pegaId'])){ 
                                        $responsavelId = strip_tags(trim(utf8_decode($_COOKIE['pegaId']))); 
                                    }

                                    $cliente_responsavel = mysqli_query($con, "select * from cliente_responsavel"); 
                                    while($cliente_responsavelRow = mysqli_fetch_object($cliente_responsavel)){
                                        ?>
                                        <option value="<?php echo $cliente_responsavelRow->Id; ?>" <?php if($cliente_responsavelRow->Id == $responsavelId){ echo "selected"; } ?> >
                                            <?php echo $cliente_responsavelRow->nome." ".$cliente_responsavelRow->sobrenome; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nome Fantasia</label>
                                <input type="text" name="nomeFantasia" class="form-control requerido" placeholder="Nome Fantasia">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Razão social</label>
                                <input type="text" name="razaoSocial" class="form-control requerido" placeholder="Razão social">
                            </div>
                            <div class="form-group">
                                <label class="control-label">CNPJ</label>
                                <input type="text" name="cnpj" class="form-control requerido cnpj" placeholder="00.000.000/0000-00">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Inscrição estadual</label>
                                <input type="text" name="inscricaoEstadual" class="form-control" placeholder="00000000-00">
                            </div>
                            <div class="form-group">
                                <label class="control-label">E-mail contato</label>
                                <input type="email" name="emailContato" class="form-control requerido" placeholder="email@email.com">
                            </div>
                            <div class="form-group">
                                <label class="control-label">E-mail cobrança</label>
                                <input type="email" name="emailCobranca" class="form-control requerido" placeholder="email@email.com">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Telefone</label>
                                <input type="text" name="telefone" class="form-control requerido fone" placeholder="(00) 0000-0000">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">CEP</label>
                                <input type="text" name="cep" class="form-control requerido cep" placeholder="00000-000">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Cidade</label>
                                <input type="text" name="cidade" class="form-control" placeholder="Complemento">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Bairro</label>
                                <input type="text" name="bairro" class="form-control" placeholder="Complemento">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Rua</label>
                                <input type="text" name="rua" class="form-control" placeholder="Complemento">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Número</label>
                                <input type="text" name="numero" class="form-control numero" placeholder="000">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Complemento</label>
                                <input type="text" name="complemento" class="form-control" placeholder="Complemento">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Segmento</label>
                                <input type="text" name="segmento" class="form-control requerido" placeholder="Segmento">
                            </div>
                            <div class="form-group">
                                <label>Porte</label>
                                <select name="porte_da_empresa_Id" class="form-control">
                                    <?php 
                                    $porte_da_empresa = mysqli_query($con, "select * from porte_da_empresa"); 
                                    while($porte_da_empresaRow = mysqli_fetch_object($porte_da_empresa)){
                                        ?>
                                        <option value="<?php echo $porte_da_empresaRow->Id; ?>">
                                            <?php echo $porte_da_empresaRow->tipo; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Empresa ativa: </label>
                        <label class="radio-inline">
                            <input type="radio" name="ativo" value="0">Não
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="ativo" value="1" checked>Sim
                        </label>
                    </div>


                    <button type="reset" class="btn btn-warning" data-loading-text="Carregando..." autocomplete="off"><i class="glyphicon glyphicon-erase fa-fw"></i> Limpar formulário</button>
                    <button type="submit" class="btn btn-primary" data-loading-text="Carregando..." autocomplete="off"><i class="fa fa-save fa-fw"></i> Cadastrar empresa</button>
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
