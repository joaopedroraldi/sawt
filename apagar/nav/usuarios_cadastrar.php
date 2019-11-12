<?php if($admin == 0) {exit();} ?>
<h1>Cadastrar Usuarios</h1>
<ol class="breadcrumb">
    <li>
        <a href="index.php">Dashboard</a>
    </li>
    <li>
        <a href="?page=usuarios">Usuários</a>
    </li>
    <li class="active">
        Cadastrar Novo usuário
    </li>
</ol>


<div class="row">
    <div class="col-lg-12">
        <form id="usuarios_cadastrar" name="usuarios_cadastrar" enctype="multipart/form-data" class="form">
            <div class="form-group">
                <label>Nome</label>
                <input name="nome_usuario" class="form-control">
            </div>
            <div class="form-group">
                <label>E-mail</label>
                <input name="email_usuario" class="form-control">
            </div>
            <div class="form-group">
                <label>Nome de usuario</label>
                <input name="usuario_usuario" class="form-control">
            </div>
            <div class="form-group">
                <label>
                    <input name="usuario_admin" type="hidden" value="0">
                    <input name="usuario_admin" type="checkbox" value="1"> Admin
                </label>
            </div>
            <div class="form-group">
                <label>Senha</label>
                <input name="senha_usuario" class="form-control">
            </div>
           
            <input type="submit" class="btn btn-primary" value="Cadastrar">
        </form>
    </div>
</div>

<div id="retorno"></div>