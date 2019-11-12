<?php 
include('../cn/config.php');
session_start();
{
    $usuario = addslashes($_POST['usuario']);
    $usuario = mysqli_real_escape_string($config, $usuario);
    $senha = addslashes($_POST['senha']);
    $vsenha = mysqli_real_escape_string($config, $senha);
    $senhav = md5($vsenha);
    $fetch = mysqli_query($config, "SELECT id_usuario FROM usuarios WHERE usuario = '$usuario' and senha = '$senhav'");
    $count = mysqli_num_rows($fetch);
    if($count!= ""){
        $_SESSION['login_username'] = $usuario;
        header("Location:../index.php");
    }else{
        header('Location:../login.php');
    }
}

?>