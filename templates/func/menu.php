<?php if($arrConfig['one-page'] == 1){ //MENU ONEPAGE ?>
    <?php while($row_paginas = mysqli_fetch_assoc($paginas)){ ?>
        <li><a <?php if(!isset($_GET['paginas_url'])){ ?>class="scroll"<?php } ?> href="<?php echo RAIZ ."#". $row_paginas['paginas_url'] ?>"><?php echo $row_paginas['paginas_titulo'] ?></a></li>
    <?php } ?>
<?php }else{ //MENU NORMAL?>
    <?php while($row_paginas = mysqli_fetch_assoc($paginas)){ ?>
        <li><a href="<?php echo RAIZ . $row_paginas['paginas_url'] ?>"><?php echo $row_paginas['paginas_titulo'] ?></a></li>
    <?php } ?>
<?php } ?>