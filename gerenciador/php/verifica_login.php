<?php 
session_start();
$check = $_SESSION['login_username'];
$session = mysqli_query($config, "SELECT id_usuario, nome, usuario, admin FROM usuarios WHERE usuario='$check'");
$row = mysqli_fetch_array($session);
$login_session = $row['usuario'];
$login_id = $row['id_usuario'];
$admin = $row['admin'];
$nome_login = $row['nome'];

if(!isset($login_session)){
header("Location:login.php");
exit();
}
?>