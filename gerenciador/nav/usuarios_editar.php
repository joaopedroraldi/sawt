<?php 
$id = $_GET['id'];
if($admin > 0){
$query = "SELECT * FROM usuarios WHERE id_usuario = $id";
}else{
$query = "SELECT * FROM usuarios WHERE id_usuario = $login_id";
}
$usuario = mysqli_query($config, $query) or die(mysqli_error());
$row_usuario = mysqli_fetch_assoc($usuario);
?>


<h1>
    Editar Usuário: <?php echo $row_usuario['usuario'] ?>
</h1>


<ol class="breadcrumb">
    <li>
        <a href="index.php">Dashboard</a>
    </li>
    <li>
        <a href="?page=usuarios">Usuários</a>
    </li>
    <li class="active">
        Editar usuario: <?php echo $row_usuario['usuario'] ?>
    </li>   
</ol>


<div class="row">
    <div class="col-lg-12">
        <form id="usuarios_editar" name="usuarios_editar" enctype="multipart/form-data" class="form">
            <input name="id_usuario" type="hidden" class="form-control" value="<?php if($admin > 0){echo $_GET['id'];}else{echo $login_id;} ?>">
            <div class="form-group">
                <label>Nome</label>
                <input name="nome_usuario" class="form-control" value="<?php echo $row_usuario['nome'] ?>">
            </div>
            <div class="form-group">
                <label>E-mail</label>
                <input name="email_usuario" class="form-control" value="<?php echo $row_usuario['email'] ?>">
            </div>
            <div class="form-group">
                <label>Nome de usuario</label>
                <input name="usuario_usuario" class="form-control" value="<?php echo $row_usuario['usuario'] ?>">
            </div>
            <?php if($admin == 2){ ?>
            <div class="form-group">
                <label>
                    Nível de usuário
                </label>
                <select name="usuario_admin" class="form-control">
                    <option <?php if($row_usuario['admin'] == 2){echo "selected='selected'";} ?> value="2">Admin</option>
                    <option <?php if($row_usuario['admin'] == 1){echo "selected='selected'";} ?> value="1">Vendedor</option>
                    <option <?php if($row_usuario['admin'] == 0){echo "selected='selected'";} ?> value="0">Desenvolvedor</option>
                </select>
            </div>
            <?php } ?>
            <div class="form-group">
                <label>Senha</label>
                <input name="senha_usuario" class="form-control" value="" placeholder="nova senha">
            </div>
            <input type="submit" class="btn btn-primary" value="Atualizar">
        </form>
    </div>
</div>
<div id="retorno"></div>