<?php
$adminId = $_SESSION["admin"];
$ip = $_SERVER['REMOTE_ADDR'];
$log = mysql_escape_string($sql);
mysqli_query($con, "insert into log_do_sql values ('', '$log', '$ip', '$data', '$adminId' )");
?>