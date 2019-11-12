<?php 
date_default_timezone_set('America/Sao_Paulo'); 

$pasta = "/sawt/";
define('RAIZ', "{$pasta}");
define('RAIZ_ADMIN', "{$pasta}gerenciador/");
define('RAIZ_UP', "{$pasta}gerenciador/uploads/");

//BANCO DE DADOS
$hostname_config = "localhost";
$database_config = "wetho_sawt2";
$username_config = "wetho_sawt2";
$password_config = "BFdMkpba0a";

$config = mysqli_connect($hostname_config, $username_config, $password_config, $database_config);

if (mysqli_connect_errno()){
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_set_charset($config,"utf8");


$query = "SELECT * FROM cores";
$cores = mysqli_query($config, $query) or die(mysqli_error());
$row_cores = mysqli_fetch_assoc($cores);
$cor1 = $row_cores['cor_1'];
$cor2 = $row_cores['cor_2'];
$cor3 = $row_cores['cor_3'];

?>