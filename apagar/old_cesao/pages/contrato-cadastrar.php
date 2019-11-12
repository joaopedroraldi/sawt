<?php

$empresaId = 0;
if(isset($_COOKIE['pegaId'])){ 
    $empresaId = strip_tags(trim(utf8_decode($_COOKIE['pegaId']))); 
}
$_COOKIE['pegaId'] = $empresaId; 


$verificaExiste = mysqli_query($con, "select COUNT(Id) as Id from cliente_empresa where Id = '$empresaId'");

$totalExiste = mysqli_fetch_object($verificaExiste);

if($totalExiste->Id == 1){
    ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Cadastro de contrato</h1>
            <?php
            $cliente_empresa = mysqli_query($con, "select * from cliente_empresa where Id = $empresaId"); 
            $cliente_empresaRow = mysqli_fetch_object($cliente_empresa);
            ?>
            <h3>Empresa selecionada: <?php echo $cliente_empresaRow->nomeFantasia; ?></h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <form id="contrato-cadastrar" name="contrato-cadastrar" enctype="multipart/form-data" role="form" class="form">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Preencha os campos a seguir
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Valor total</label>
                                    <input type="text" name="valorTotal" class="form-control requerido numero-float contrato-valores" placeholder="0,00" maxlength="10">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Parcelas</label>
                                    <input type="text" name="parcelas" class="form-control requerido numero contrato-valores" placeholder="1" maxlength="2" value="1">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Valor entrada</label>
                                    <input type="text" name="valorEntrada" class="form-control numero-float contrato-valores" placeholder="0,00" maxlength="10">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Valor primeira parcela</label>
                                    <input type="text" name="valorPrimeira" class="form-control numero-float contrato-valores" placeholder="0,00" maxlength="10">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Dia para vencimento das parcelas</label>
                                    <input type="text" name="diaVencimento" class="form-control numero" placeholder="10" maxlength="2">
                                </div>
                                <div class="form-group">
                                    <label>Forma de pagamento</label>
                                    <select name="forma_pagamento_Id" class="form-control">
                                        <?php 
                                        $forma_pagamento = mysqli_query($con, "select * from forma_pagamento"); 
                                        while($forma_pagamentoRow = mysqli_fetch_object($forma_pagamento)){
                                            ?>
                                            <option value="<?php echo $forma_pagamentoRow->Id; ?>">
                                                <?php echo $forma_pagamentoRow->tipo; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Valor parcela: R$ <input type="text" class="valorParcelas numero-float" name="valorParcelas" value="0,00"></h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Cláusulas
                    </div>
                    <div class="panel-body">
                        <!--ul.ul-principal>li{Termo}*3>ul>li{Cláusula}*5>ul>li{Parágrafo}*3-->
                        <div class="text-center"><h4>Dos serviços contratados</h4></div>
                        
                        <ul class="ul-principal">
                            <?php
                            if(isset($_SESSION['servicos'])){
                                $clausulaNum = 1;
                                foreach ($_SESSION['servicos'] as $key => $value) {
                                    $clausula = explode("-" , $key);
                                    $clausula = $clausula[0];
                                    include "contrato-cadastrar-clausulas.php";
                                }
                            }
                            ?>
                        </ul>
                        
                        <hr>
                        <?php
                        $direitos = mysqli_query($con, "select * from direitos_deveres_exemplo");
                        while($direitosRow = mysqli_fetch_object($direitos)){
                            ?>
                            <div class="text-center"><h4>Dos direitos e deveres da <?php echo $direitosRow->tipo; ?></h4></div>
                            <textarea rows="10" class="form-control" name="<?php echo $direitosRow->tipo; ?>"><?php echo $direitosRow->direitos. "

". $direitosRow->deveres; ?></textarea>
                            <hr>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Anexos
                    </div>
                    <div class="panel-body">
                
                        <?php
                        if(isset($_SESSION['servicos'])){
                            $anexoNum = 1;
                            foreach ($_SESSION['servicos'] as $key => $value) {
                                $clausula = explode("-" , $key);
                                $clausula = $clausula[0];
                                $sql = "select * from contrato_anexo_exemplo where tipo = '$clausula'";
                                $sql = mysqli_query($con, $sql);
                                $row = mysqli_fetch_object($sql);
                                ?>
                                <hr>
                                <div class="text-center"><h4>Anexo <?php echo $anexoNum; ?></h4></div>
                                <textarea rows="7" class="form-control" name="<?php echo $clausula; ?>"><?php echo $row->texto; ?></textarea>
                                <?php
                                $anexoNum++;
                            }
                        }
                        ?>
                    </div>
                </div>
                
                <br>
                <?php

                /*if(isset($_SESSION['servicos'])){
                    $retorno = "Serviços selecionados <br>";
                    foreach ($_SESSION['servicos'] as $key => $value) {
                        $servico = explode("-" , $key);
                        $servico = $servico[0];
                        $retorno .= $servico.": ".$value."<br>";
                    }
                    echo $retorno;

                    //unset($_SESSION['servicos']);
                }*/

                ?>

            </div>
            <div class="col-lg-12">
                <button type="submit" class="btn btn-primary float-right" data-loading-text="Carregando..." autocomplete="off"><i class="fa fa-save fa-fw"></i> Gerar contrato</button>
                <br clear="all">
                <br>
                <br>
            </div>
        </form>
    </div>
    <?php
}else{
    ?>
    <h1>Selecione uma empresa</h1>
    <?php
}
?>