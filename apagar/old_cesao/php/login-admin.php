<?php

session_start();

$inputEmail = utf8_decode($_POST['inputEmail']);
$inputPassword = $_POST['inputPassword'];

include "connect.php";

$verifica = mysqli_query($con,"select * from usuario where email = '$inputEmail' and ativo = 1");

$num_row = mysqli_num_rows($verifica);

if($num_row == 1){
	$row = mysqli_fetch_object($verifica);
	$salt = $row->salt;
	$senha = sha1($salt . sha1($salt . sha1($inputPassword)));
	if($row->senha == $senha){
		$_SESSION['admin'] = $row->Id;
        $return['error'] = 0;
	}else{
		$return['error'] = 1;
        $return['mensagem'] = "Esta senha está errada<br>Tente outra";
	}
}else{
	$return['error'] = 1;
    $return['mensagem'] = "Este E-mail não está cadastrado<br>Tente outro";
}


$return["json"] = json_encode($return);
echo json_encode($return);

/*
if($inputEmail == "cesarbellon@gmail.com" and $inputPassword == "thv321"){
    $_SESSION['admin'] = 1;
    echo $_SESSION['admin'];
}else{
    echo 0;
}
*/

mysqli_close($con);
?>