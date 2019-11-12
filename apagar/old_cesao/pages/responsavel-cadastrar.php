<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Cadastro de responsável</h1>
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
                <form id="responsavel-cadastrar" name="responsavel-cadastrar" enctype="multipart/form-data" role="form" class="form">
                    
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
                                <label class="control-label">CPF</label>
                                <!--data-mask="999.999.999-99"-->
                                <input type="text" name="cpf" class="form-control requerido cpf"  placeholder="000.000.000-00">
                            </div>
                            <div class="form-group">
                                <label class="control-label">RG</label>
                                <input type="text" name="rg" class="form-control requerido" placeholder="00.000.000-00">
                            </div>
                            <div class="form-group">
                                <label class="control-label">E-mail</label>
                                <input type="email" name="email" class="form-control" placeholder="email@email.com">
                            </div>
                        </div>
                        <div class="col-md-6">
                            
                            
                            <div class="form-group">
                                <label class="control-label">Telefone</label>
                                <input type="text" name="telefone" class="form-control fone" placeholder="(00) 0000-0000">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Telefone 2</label>
                                <input type="text" name="telefone2" class="form-control fone" placeholder="(00) 0000-0000">
                            </div>
                            <div class="form-group">
                                <label class="control-label">CEP</label>
                                <input type="text" name="cep" class="form-control cep" placeholder="00000-000">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Número</label>
                                <input type="text" name="numero" class="form-control numero" placeholder="000">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Complemento</label>
                                <input type="text" name="complemento" class="form-control" placeholder="Complemento">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label">Responsável ativo: </label> 
                        <label class="radio-inline">
                            <input type="radio" name="ativo" value="0">Não
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="ativo" value="1" checked>Sim
                        </label>
                    </div>
                    
                    <button type="reset" class="btn btn-warning" data-loading-text="Carregando..." autocomplete="off"><i class="glyphicon glyphicon-erase fa-fw"></i> Limpar formulário</button>
                    <button type="submit" class="btn btn-primary" data-loading-text="Carregando..." autocomplete="off"><i class="fa fa-save fa-fw"></i> Cadastrar responsável</button>
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