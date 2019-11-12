<?php
if($_SESSION["admin"] == 0){
    $return['error'] = 1;
    $return['mensagem'] = "Faça login para poder usar o sistema";
}else{
    
    $usuarioId = 0;
    if(isset($_COOKIE['pegaId'])){ 
        $usuarioId = strip_tags(trim(utf8_decode($_COOKIE['pegaId']))); 
    }
    $_COOKIE['pegaId'] = $usuarioId;

    $verificaExiste = mysqli_query($con, "select COUNT(Id) as Id from usuario where Id = '$usuarioId'");

    $totalExiste = mysqli_fetch_object($verificaExiste);

    if($totalExiste->Id == 1){
        ?>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Alteração de usuário</h1>
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
                        $usuario = mysqli_query($con , "select * from usuario where Id = '$usuarioId'");
                        $usuarioRow = mysqli_fetch_object($usuario);  
                        ?>
                        <form id="usuario-alterar" name="usuario-alterar" enctype="multipart/form-data" role="form" class="form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nome</label>
                                        <input type="text" name="nome" class="form-control requerido" placeholder="Fulano" value="<?php echo $usuarioRow->nome; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Sobrenome</label>
                                        <input type="text" name="sobrenome" class="form-control requerido" placeholder="de Tal" value="<?php echo $usuarioRow->sobrenome; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Sexo</label>
                                        <select name="sexo" class="form-control">
                                            <option value="1" <?php if($usuarioRow->sexo == 1){ echo "selected"; } ?> >Masculino</option>
                                            <option value="0" <?php if($usuarioRow->sexo == 0){ echo "selected"; } ?> >Feminino</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">CPF</label>
                                        <input type="text" name="cpf" class="form-control requerido cpf"  placeholder="000.000.000-00" value="<?php echo $usuarioRow->cpf; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">RG</label>
                                        <input type="text" name="rg" class="form-control requerido" placeholder="00.000.000-00" value="<?php echo $usuarioRow->rg; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Telefone</label>
                                        <input type="text" name="telefone" class="form-control requerido fone" placeholder="(00) 0000-0000" value="<?php echo $usuarioRow->telefone; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">E-mail</label>
                                        <input type="email" name="email" class="form-control requerido" placeholder="fulano@de.tal" value="<?php echo $usuarioRow->email; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label"l>Nova senha</label>
                                        <input type="password" name="senha" class="form-control" placeholder="****">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Repitir senha</label>
                                        <input type="password" name="senha2" class="form-control" placeholder="****">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Foto</label>
                                        <input type="file" name="foto" class="form-control" placeholder="foto">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Usuário ativo: </label> 
                                <label class="radio-inline">
                                    <input type="radio" name="ativo" value="0" <?php if($usuarioRow->ativo == 0){ echo "checked"; } ?>>Não
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="ativo" value="1" <?php if($usuarioRow->ativo == 1){ echo "checked"; } ?>>Sim
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
}
?>