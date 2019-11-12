<h1>Enviar Suporte</h1>
<ol class="breadcrumb">
    <li>
        <a href="index.php">Dashboard</a>
    </li>
    <li class="active">
        Suporte
    </li>   
</ol>


<div class="row">
    <div class="col-lg-12">
        <form id="enviar_suporte" name="enviar_suporte" enctype="multipart/form-data" role="form">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Nome completo</label>
                    <input type="text" maxlength="100" name="nome" class="form-control requerido">
                </div>
                <div class="form-group">
                    <label>E-mail para contato</label>
                    <input type="email" maxlength="100" name="email" class="form-control requerido">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Telefone para contato</label>
                    <input type="text" maxlength="15" name="telefone" class="form-control requerido fixo">
                </div>
                <div class="form-group">
                    <label>Celular para contato</label>
                    <input type="text" maxlength="15" name="celular" class="form-control requerido cel">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="sel1">Departamento requerido</label>
                    <select name="depar" class="form-control" id="sel1">
                        <option value="suporte@webthomaz.com.br">Suporte</option>
                        <option value="financeiro@webthomaz.com.br">Fincanceiro</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Endereço do seu site/domínio</label>
                    <input type="text" maxlength="100" name="dominio" class="form-control requerido">
                </div>
                <div class="form-group">
                    <label>Nome da sua empresa</label>
                    <input type="text" maxlength="100" name="nome_empresa" class="form-control requerido">
                </div>
                <div class="form-group">
                    <label>Assunto</label>
                    <input type="text" maxlength="100" name="assunto" class="form-control requerido">
                </div>
                <div class="form-group">
                    <label>Mensagem</label>
                    <textarea type="text" maxlength="100" name="mensagem" class="form-control requerido"></textarea>
                </div>
                <input type="submit" class="btn btn-primary" value="Enviar">
                <div class="clear20"></div>
                <h5 style="color: red; border: 1px solid red; padding: 15px;"><strong>Obs: Mensagens enviadas para o suporte são respondidas em até 3 dias úteis. Mensagens enviadas para o financeiro são respondidas em até 2 dias úteis.</strong></h5>
            </div>
        </form>
    </div>
</div>