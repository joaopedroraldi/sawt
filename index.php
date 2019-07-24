<?php include("config.php"); ?>
<!doctype html>
<html lang="pt-br">
 
	<head>
		<?php include("head.php"); ?>
	</head>

	<body>
		<div class="dashboard-main-wrapper">
			<?php include("header.php"); ?>
			<?php include("menu.php"); ?>

			<div class="dashboard-wrapper">
				<div class="dashboard-ecommerce">
					<div class="container-fluid dashboard-content ">
						<?php include("breadcrumbs.php"); ?>
						<?php include("home.php"); ?>
					</div>
					<?php include("footer.php"); ?>
				</div>
			</div>			
		</div>

		<?php include("scripts.php"); ?>
	</body>
</html>