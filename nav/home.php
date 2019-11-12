<?php 
session_start();
if(isset($_SESSION['chave'])){
    $chave = addslashes($_SESSION['chave']);
    $chave = mysqli_real_escape_string($config, $chave);
    $query = "SELECT * FROM registros WHERE registros_cliente_key = '$chave'";
    $cliente = mysqli_query($config, $query);
    $row_cliente = mysqli_fetch_assoc($cliente);
    $rows_cliente = mysqli_num_rows($cliente);
    if($rows_cliente > 0){
        include('templates/conta_cliente/minha-conta.php');
    }else{
        include('templates/conta_cliente/login-cliente.php');
    }
}elseif(isset($_POST['c'])){
    $chave = addslashes($_POST['c']);
    $chave = mysqli_real_escape_string($config, $chave);
    $query = "SELECT * FROM registros WHERE registros_cliente_key = '$chave'";
    $cliente = mysqli_query($config, $query);
    $row_cliente = mysqli_fetch_assoc($cliente);
    $rows_cliente = mysqli_num_rows($cliente);
    if($rows_cliente > 0){
        $_SESSION['chave'] = $_POST['c'];
        include('templates/conta_cliente/minha-conta.php');
    }else{
        include('templates/conta_cliente/login-cliente.php');
        echo "<center>Chave não encontrada, tente novamente</center>";
        echo "<div class='clear40'></div>";
    }
}else{
    include('templates/conta_cliente/login-cliente.php');
}
?>