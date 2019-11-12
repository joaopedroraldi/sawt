<?php 
$query = "SELECT * FROM templates WHERE templates_header = 1 and templates_header_ok = 1";
$templates = mysqli_query($config, $query) or die(mysqli_error());
$row_templates = mysqli_fetch_assoc($templates);
$headerok = $row_templates['templates_arquivo'];
include('templates/sections/'.$headerok);
?>
