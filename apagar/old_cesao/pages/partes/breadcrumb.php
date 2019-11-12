<ol class="breadcrumb">
    <li>
        <a href="admin.php?menu=<?php echo $menu; ?>" class="<?php if($submenu == 'home'){ echo "active"; } ?>"><?php echo $menu; ?></a>
    </li>
    <?php
    if($submenu !== 'home'){
        ?>
        <li>
            <a href="admin.php?submenu=<?php echo $submenu; ?>" class="<?php if($submenu !== 'home'){ echo "active"; } ?>"><?php echo $submenu; ?></a>
        </li>
        <?php
    }
    ?>
</ol>