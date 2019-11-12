<?php 
$_SESSION['usuarioId'] = 0; 
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Alteração de usuário</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Selecione um usuário
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Situação</label>
                            <select class="form-control" id="usuario-busca">
                                <option value="1" selected="selected">Ativos</option>
                                <option value="0">Inativos</option>
                                <option value="2">Ativos e inativos</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <label>Usuários</label>
                            <select class="form-control" id="usuario-lista">
                                <option value="0" selected="selected">Selecione um usuário</option>
                                <?php
                                $usuarios = mysqli_query($con , "select Id, nome, sobrenome from usuario where ativo = 1");
                                while($usuariosRow = mysqli_fetch_object($usuarios)){
                                    ?>
                                    <option value="<?php echo $usuariosRow->Id ?>"><?php echo $usuariosRow->nome." ".$usuariosRow->sobrenome ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Altere os dados desejados
            </div>
            <div class="panel-body">
                <form id="usuario-alterar" name="cadastro-usuario" enctype="multipart/form-data" role="form" class="form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" name="nome" class="form-control" placeholder="Fulano" required disabled>
                            </div>
                            <div class="form-group">
                                <label>Sobrenome</label>
                                <input type="text" name="sobrenome" class="form-control" placeholder="de Tal" required disabled>
                            </div>
                            <div class="form-group">
                                <label>Telefone</label>
                                <input type="text" name="telefone" class="form-control" placeholder="(00) 0000-0000" required disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" name="email" class="form-control" placeholder="fulano@de.tal" required disabled>
                            </div>
                            <div class="form-group">
                                <label>Nova senha</label>
                                <input type="password" name="senha" class="form-control" placeholder="****" disabled>
                            </div>
                            <div class="form-group">
                                <label>Repitir senha</label>
                                <input type="password" name="senha2" class="form-control" placeholder="****" disabled>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Usuário ativo: </label> 
                        <label class="radio-inline">
                            <input type="radio" name="ativo" value="0" checked disabled>Não
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="ativo" value="1" disabled>Sim
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary" data-loading-text="Carregando..." autocomplete="off" disabled>Alterar usuário</button>
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