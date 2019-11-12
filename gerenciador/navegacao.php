<!-- <div class="user-logado"><i class="fa fa-user"></i> <?php echo $nome_login ?></div> -->

<nav class="height100">
    <ul class="menu height100">
    	<li>
    		<a class="transition"><i class="fa fa-file-text-o" aria-hidden="true"></i> Páginas</a>
    		<ul>
    			<?php 
				$query = "SELECT paginas_id, paginas_titulo FROM paginas WHERE paginas_menu_admin = 1 and paginas_carousel = 0 and paginas_layout = 0 ORDER BY paginas_ordem_menu ASC";
				$paginas = mysqli_query($config, $query) or die(mysqli_error());
				while($row_paginas = mysqli_fetch_assoc($paginas)){
				?>
		        <li class="transition"><a href="?page=registros&id=<?php echo $row_paginas['paginas_id'] ?>" class="transition"><?php echo $row_paginas['paginas_titulo'] ?></a></li>
				<?php } ?>
    		</ul>
    	</li>
    	

        <!-- <li>
        	<a class="transition"><i class="fa fa-picture-o" aria-hidden="true"></i> Banners / Carousel</a>
        	<ul>
        		<?php 
				$query = "SELECT paginas_id, paginas_titulo FROM paginas WHERE paginas_carousel = 1 ORDER BY paginas_ordem_menu ASC";
				$paginas = mysqli_query($config, $query) or die(mysqli_error());
				while($row_paginas = mysqli_fetch_assoc($paginas)){
				?>
		        <li class="transition"><a href="?page=registros&id=<?php echo $row_paginas['paginas_id'] ?>" class="transition"><i class="fa fa-picture-o" aria-hidden="true"></i> <?php echo $row_paginas['paginas_titulo'] ?></a></li>
				<?php } ?>
        	</ul>
        </li>
        
        <li class="transition">
        	<a class="transition"><i class="fa fa-bars" aria-hidden="true"></i> Configurações de layout</a>
        	<ul>
                <?php if($admin > 0){ ?>
                <li><a href="?page=templates">Templates</a></li>
        		<li><a href="?page=cores">Cores</a></li>
                <?php } ?>
        		<?php 
				$query = "SELECT paginas_id, paginas_titulo FROM paginas WHERE paginas_layout = 1 ORDER BY paginas_ordem_menu ASC";
				$paginas = mysqli_query($config, $query) or die(mysqli_error());
				while($row_paginas = mysqli_fetch_assoc($paginas)){
				?>
        		<li class="transition"><a href="?page=registros&id=<?php echo $row_paginas['paginas_id'] ?>"><?php echo $row_paginas['paginas_titulo'] ?></a></li>
        		<?php } ?>
        	</ul>
        </li>
 -->
        <?php if($admin == 2){ ?>
        <li class="transition">
        	<a class="transition"><i class="fa fa-cog"></i> Ferramentas</a>
        	<ul>
	        	
		        <li class="transition"><a href="?page=paginas" class="transition"><i class="fa fa-file-o" aria-hidden="true"></i> Criar / Editar páginas</a></li>
		        <li class="transition"><a href="?page=usuarios" class="transition"><i class="fa fa-user"></i> Usuarios</a></li>
                <!-- <li class="transition"><a href="?page=contatos" class="transition"><i class="fa fa-envelope"></i> Contatos site</a></li> -->
                <!-- <li class="transition"><a href="?page=orcamentos" class="transition"><i class="fa fa-shopping-cart"></i> Orçamentos</a></li> -->
                <!-- <li class="transition"><a href="<?=RAIZ;?>webmail" target="_blank"  class="transition"><i class="fa fa-envelope" aria-hidden="true"></i> Acessar Webmail</a></li> -->
                <!-- <li class="transition"><a href="https://analytics.google.com" target="_blank" class="transition"><i class="fa fa-bar-chart" aria-hidden="true"></i> Relatório de acesso</a></li> -->
                <li class="transition"><a href="?page=configuracoes" class="transition"><i class="fa fa-cog"></i> Configurações</a></li>
		        
        	</ul>
        </li>
        <?php } ?>

    </ul>
</nav>