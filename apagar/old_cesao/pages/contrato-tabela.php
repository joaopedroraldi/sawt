<?php

$empresaId = 0;
if(isset($_COOKIE['pegaId'])){ 
    $empresaId = strip_tags(trim(utf8_decode($_COOKIE['pegaId']))); 
}

$verificaExiste = mysqli_query($con, "select COUNT(Id) as Id from cliente_empresa where Id = '$empresaId'");

$totalExiste = mysqli_fetch_object($verificaExiste);

if($totalExiste->Id == 1){
    ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Contratos</h1>
            <?php
            $cliente_empresa = mysqli_query($con, "select * from cliente_empresa where Id = $empresaId"); 
            $cliente_empresaRow = mysqli_fetch_object($cliente_empresa);
            ?>
            <h3>Empresa selecionada: <?php echo $cliente_empresaRow->nomeFantasia; ?></h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tabela
                </div>
                <div class="panel-body ">
                    <!--table-overflow-->
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Data cadastro</th>
                                    <th>Valor total</th>
                                    <th>Parcelas</th>
                                    <th>Valor entrada</th>
                                    <th>Valor 1ª parcela</th>
                                    <th>Valor parcelas</th>
                                    <th>Dia vencimento parcelas</th>
                                    <th>Forma de pagamento</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "select c.*, p.tipo as forma_pagamento from contrato c, forma_pagamento p where c.cliente_empresa_Id = $empresaId and c.forma_pagamento_Id = p.Id order by c.dataCad desc";
                                $contrato = mysqli_query($con , $sql);
                                while($contratoRow = mysqli_fetch_object($contrato)){
                                    ?>
                                    <tr id="<?php echo $empresaId; ?>">
                                        <td>
                                            <a href="contrato.php?data=<?php echo date("Y-m-d", strtotime($contratoRow->dataCad)); ?>&hora=<?php echo date("H:i:s", strtotime($contratoRow->dataCad)); ?>" target="_blank">
                                                <?php echo date("d/m/Y", strtotime($contratoRow->dataCad))." às ".date("H:i:s", strtotime($contratoRow->dataCad)) ; ?>
                                            </a>
                                        </td>
                                        <td>
                                            R$ <?php echo number_format($contratoRow->valorTotal, 2, ',', '.'); ?>
                                        </td>
                                        <td class="text-right">
                                            <?php echo $contratoRow->parcelas; ?>
                                        </td>
                                        <td>
                                            R$ <?php echo number_format($contratoRow->valorEntrada, 2, ',', '.'); ?>
                                        </td>
                                        <td>
                                            R$ <?php echo number_format($contratoRow->valorPrimeira, 2, ',', '.'); ?>
                                        </td>
                                        <td>
                                            R$ <?php echo number_format($contratoRow->valorParcelas, 2, ',', '.'); ?>
                                        </td>
                                        <td class="text-right">
                                            dia <?php echo $contratoRow->diaVencimento; ?>
                                        </td>
                                        <td>
                                            <?php echo $contratoRow->forma_pagamento; ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}else{
    ?>
    <h1>Selecione uma empresa</h1>
    <?php
}
?>