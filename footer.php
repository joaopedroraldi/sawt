<?php 
$query = "SELECT * FROM templates WHERE templates_footer = 1 and templates_footer_ok = 1";
$templates = mysqli_query($config, $query) or die(mysqli_error());
$row_templates = mysqli_fetch_assoc($templates);
$footerok = $row_templates['templates_arquivo'];
include('templates/sections/'.$footerok);
?>
