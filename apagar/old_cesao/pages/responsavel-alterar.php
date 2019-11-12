<?php 
$responsavelId = 0;
if(isset($_COOKIE['pegaId'])){ 
    $responsavelId = strip_tags(trim(utf8_decode($_COOKIE['pegaId']))); 
}
$_COOKIE['pegaId'] = $responsavelId; 

$verificaExiste = mysqli_query($con, "select COUNT(Id) as Id from cliente_responsavel where Id = '$responsavelId'");

$totalExiste = mysqli_fetch_object($verificaExiste);

if($totalExiste->Id == 1){
    ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Alteração de responsável</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Altere os dados desejados
                </div>
                <div class="panel-body">
                    <?php
                    $responsavel = mysqli_query($con , "select * from cliente_responsavel where Id = '$responsavelId'");
                    $responsavelRow = mysqli_fetch_object($responsavel);  
                    ?>
                    <form id="responsavel-alterar" name="responsavel-alterar" enctype="multipart/form-data" role="form" class="form">
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nome</label>
                                <input type="text" name="nome" class="form-control requerido" placeholder="Nome" value="<?php echo $responsavelRow->nome; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Sobrenome</label>
                                <input type="text" name="sobrenome" class="form-control requerido" placeholder="Sobrenome" value="<?php echo $responsavelRow->sobrenome; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">CPF</label>
                                <!--data-mask="999.999.999-99"-->
                                <input type="text" name="cpf" class="form-control requerido cpf"  placeholder="000.000.000-00" value="<?php echo $responsavelRow->cpf; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">RG</label>
                                <input type="text" name="rg" class="form-control requerido" placeholder="00.000.000-00" value="<?php echo $responsavelRow->rg; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">E-mail</label>
                                <input type="email" name="email" class="form-control" placeholder="email@email.com" value="<?php echo $responsavelRow->email; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            
                            
                            <div class="form-group">
                                <label class="control-label">Telefone</label>
                                <input type="text" name="telefone" class="form-control fone" placeholder="(00) 0000-0000" value="<?php echo $responsavelRow->telefone; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Telefone 2</label>
                                <input type="text" name="telefone2" class="form-control fone" placeholder="(00) 0000-0000" value="<?php echo $responsavelRow->telefone2; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">CEP</label>
                                <input type="text" name="cep" class="form-control cep" placeholder="00000-000" value="<?php echo $responsavelRow->cep; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Número</label>
                                <input type="text" name="numero" class="form-control numero" placeholder="000" value="<?php echo $responsavelRow->numero; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Complemento</label>
                                <input type="text" name="complemento" class="form-control" placeholder="Complemento" value="<?php echo $responsavelRow->complemento; ?>">
                            </div>
                        </div>
                    </div>

                        <div class="form-group">
                            <label>Responsável ativo: </label> 
                            <label class="radio-inline">
                                <input type="radio" name="ativo" value="0" <?php if($responsavelRow->ativo == 0){ echo "checked"; } ?>>Não
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="ativo" value="1" <?php if($responsavelRow->ativo == 1){ echo "checked"; } ?>>Sim
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary" data-loading-text="Carregando..." autocomplete="off"><i class="fa fa-save fa-fw"></i> Alterar usuário</button>
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
    <?php
}else{
    ?>
    <h1>Este usuário não existe</h1>
<?php
}
?>