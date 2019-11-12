<?php
include("../cn/config.php");
include("verifica_login.php");

foreach ($_POST as $key => $value) {
	mysqli_query($config, "UPDATE templates_home SET templates_home_ordem = '$value' WHERE templates_home_id = $key");
}
?>
