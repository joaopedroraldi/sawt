<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Cadastro de usuário</h1>
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
                <form id="usuario-cadastrar" name="cadastro-usuario" enctype="multipart/form-data" role="form" class="form">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nome</label>
                                <input type="text" name="nome" class="form-control requerido" placeholder="Nome">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Sobrenome</label>
                                <input type="text" name="sobrenome" class="form-control requerido" placeholder="Sobrenome">
                            </div>
                            <div class="form-group">
                                <label>Sexo</label>
                                <select name="sexo" class="form-control">
                                    <option value="1">Masculino</option>
                                    <option value="0">Feminino</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">CPF</label>
                                <input type="text" name="cpf" class="form-control requerido cpf"  placeholder="000.000.000-00">
                            </div>
                            <div class="form-group">
                                <label class="control-label">RG</label>
                                <input type="text" name="rg" class="form-control requerido" placeholder="00.000.000-00">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Telefone</label>
                                <input type="text" name="telefone" class="form-control requerido fone" placeholder="(00) 0000-0000">
                            </div>
                            <div class="form-group">
                                <label class="control-label">E-mail</label>
                                <input type="email" name="email" class="form-control requerido" placeholder="email@email.com">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Senha</label>
                                <input type="password" name="senha" class="form-control requerido" placeholder="****">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Repitir senha</label>
                                <input type="password" name="senha2" class="form-control requerido" placeholder="****">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Foto</label>
                                <input type="file" name="foto" id="foto"  placeholder="foto">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Usuário ativo: </label>
                        <label class="radio-inline">
                            <input type="radio" name="ativo" value="0" checked>Não
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="ativo" value="1">Sim
                        </label>
                    </div>

                    <button type="reset" class="btn btn-warning" data-loading-text="Carregando..." autocomplete="off"><i class="glyphicon glyphicon-erase fa-fw"></i> Limpar formulário</button>
                    <button type="submit" class="btn btn-primary" data-loading-text="Carregando..." autocomplete="off"><i class="fa fa-save fa-fw"></i> Cadastrar usuário</button>
                    
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