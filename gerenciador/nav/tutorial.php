<h1>Tutoriais</h1>
<ol class="breadcrumb">
    <li>
        <a href="index.php">Dashboard</a>
    </li>
    <li class="active">
        Tutoriais
    </li>   
</ol>

<?php
	$query_cat = "SELECT * FROM categorias WHERE categorias_idpg = 21 and categorias_pai = 0 ORDER BY categorias_id ASC";
	$categorias = mysqli_query($config, $query_cat);
?>

<div class="row">
	<div class="col-lg-12">
	    <?php while ($row_cat = mysqli_fetch_assoc($categorias)) { ?>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="heading<?=$row_cat['categorias_id'];?>">
					<h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$row_cat['categorias_id'];?>" aria-expanded="false" aria-controls="collapse<?=$row_cat['categorias_id'];?>">
							<?=$row_cat['categorias_titulo'];?>
						</a>
					</h4>
				</div>
				<div id="collapse<?=$row_cat['categorias_id'];?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$row_cat['categorias_id'];?>">
					<div class="panel-body">
						<?php
							$id_cat = $row_cat['categorias_id'];
							$query_reg = "SELECT r.*, rc.registros_id as r_id, rc.categorias_id as c_id FROM registros r, registros_categorias rc WHERE rc.registros_id = r.registros_id and rc.categorias_id = $id_cat ORDER BY registros_id ASC";
							$registros = mysqli_query($config, $query_reg);
							while ($row_reg = mysqli_fetch_assoc($registros)) {
						?>
						<a style="font-size: 16px; display: block; padding: 5px;" href="<?=$row_reg['registros_link'];?>"><?=$row_reg['registros_titulo'];?></a>
						<?php } ?>
					</div>
				</div>
			</div>
	    <?php } ?>
	</div>
</div>