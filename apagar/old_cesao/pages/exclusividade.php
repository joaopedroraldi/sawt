<?php
if($_SESSION["admin"] == 0){
    $return['error'] = 1;
    $return['mensagem'] = "Faça login para poder usar o sistema";
}else{
    
    $empresaId = 0;
    if(isset($_COOKIE['pegaId'])){ 
        $empresaId = strip_tags(trim(utf8_decode($_COOKIE['pegaId']))); 
    }
    $_COOKIE['pegaId'] = $empresaId;

    $verificaExiste = mysqli_query($con, "select COUNT(Id) as Id from cliente_empresa where Id = '$empresaId'");

    $totalExiste = mysqli_fetch_object($verificaExiste);

    if($totalExiste->Id == 1){

        $exclusividade = mysqli_query($con, "select * from exclusividade where cliente_empresa_Id = '$empresaId'"); 
        $exclusividadeNumRows = mysqli_num_rows($exclusividade);
        $exclusividadeRow = mysqli_fetch_object($exclusividade);
        
        ?>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Exclusividade</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <?php if($exclusividadeNumRows == 0){ echo "Preencha"; }else{ echo "Altere"; }; ?> os campos a seguir
                    </div>
                    <div class="panel-body">
                        <form id="exclusividade-<?php if($exclusividadeNumRows == 0){ echo "cadastrar"; }else{ echo "alterar"; }; ?>" name="exclusividade-<?php if($exclusividadeNumRows == 0){ echo "cadastrar"; }else{ echo "alterar"; }; ?>" enctype="multipart/form-data" role="form" class="form">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Prazo de fidelidade</label>
                                        <input type="text" name="prazoFidelidade" class="form-control requerido" placeholder="Ex. um ano" value="<?php if($exclusividadeNumRows == 1){ echo $exclusividadeRow->prazoFidelidade; }; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Excecções</label>
                                        <textarea class="form-control" rows="4" name="excecoes" placeholder="Observações"><?php if($exclusividadeNumRows == 1){ echo $exclusividadeRow->excecoes; }; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Regras</label>
                                        <textarea class="form-control" rows="3" name="regras" placeholder="Descreva as regras"><?php if($exclusividadeNumRows == 1){ echo $exclusividadeRow->regras; }; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Observações</label>
                                        <textarea class="form-control" rows="2" name="observacoes" placeholder="Observações"><?php if($exclusividadeNumRows == 1){ echo $exclusividadeRow->observacoes; }; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Exclusividade ativa: </label> 
                                <label class="radio-inline">
                                    <input type="radio" name="ativo" value="0" <?php if($exclusividadeNumRows == 1 and $exclusividadeRow->ativo == 0){ echo "checked"; }else{ echo "checked"; } ?>>Não
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="ativo" value="1" <?php if($exclusividadeNumRows == 1 and $exclusividadeRow->ativo == 1){ echo "checked"; } ?>>Sim
                                </label>
                            </div>

                            <?php 
                            if($exclusividadeNumRows == 0){
                                ?>
                                <button type="reset" class="btn btn-warning" data-loading-text="Carregando..." autocomplete="off"><i class="glyphicon glyphicon-erase fa-fw"></i> Limpar formulário</button>
                                <?php
                            }
                            ?>

                            <button type="submit" class="btn btn-primary" data-loading-text="Carregando..." autocomplete="off"><i class="fa fa-save fa-fw"></i> <?php if($exclusividadeNumRows == 0){ echo "Cadastrar"; }else{ echo "Alterar"; }; ?> exclusividade</button>

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
        <h1>Esta empresa não existe</h1>
    <?php
    }
}
?>