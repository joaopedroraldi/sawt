<h3>Contratos</h3>

<table class="table">
	<tr>
		<th>
			Contrato
		</th>
		<th>
			Plano
		</th>
		<th></th>
	</tr>
<?php
$query = "SELECT 
    registros_id, registros_titulo, registros_imagem, registros_texto, registros_notificacao, registros_cliente_key,
    (select p.registros_titulo from registros as p where p.registros_id = r.registros_plano) as registros_plano,
    (select c.registros_titulo from registros as c where c.registros_id = r.registros_cliente) as registros_cliente
    FROM registros as r WHERE registros_idpg = 55 AND registros_cliente = {$row_cliente['registros_id']}";
$contratos = mysqli_query($config, $query);
while($row_contratos = mysqli_fetch_assoc($contratos)){
?>
<tr>
	<td>#<?php echo $row_contratos['registros_id'] ?></td>
    <td><?php echo $row_contratos['registros_plano'] ?></td>
    <td align="right"><a class="btn btn-primary btn-xs" href="visualizar/<?php echo $row_contratos['registros_id'] ?>"><i class="fa fa-file-text-o" aria-hidden="true"></i> Ver contrato</a></td>
</tr>
<?php } ?>
</table>