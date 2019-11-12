<h3>Briefings</h3>

<table class="table">
<?php
$query = "SELECT registros_id, registros_time, registros_titulo, registros_texto FROM registros WHERE registros_idpg = 56 AND registros_cliente = {$row_cliente['registros_id']}";
$briefing = mysqli_query($config, $query);
while($row_briefing = mysqli_fetch_assoc($briefing)){
?>
<tr>
	<td><?php echo $row_briefing['registros_titulo'] ?></td>
	<td>#<?php echo $row_briefing['registros_id']." - ". $row_briefing['registros_time'] ?></td>
    <td align="right"><a class="btn btn-primary btn-xs" href="visualizar/<?php echo $row_briefing['registros_id'] ?>"><i class="fa fa-file-text-o" aria-hidden="true"></i> Ver briefing</a></td>
</tr>
<?php } ?>
</table>