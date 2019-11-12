<style type="text/css">
<?php echo $idcss ?>{width: 100%; float: left; }
<?php echo $idcss ?> h1{color: <?php echo $row_cores['cor_1'] ?>}
</style>

<section id="<?php echo $idCss ?>">
    <center>
        <h1><?php echo $row_templates['templates_home_titulo'] ?></h1>
    </center>
    <div class="clear40"></div>
    <div class="container">
        <?php
        $query = "SELECT * FROM registros WHERE registros_idpg = $template_idpg";
        $carousel = mysqli_query($config, $query) or die(mysqli_error());
        ?>
        <ul class="carousel">
            <?php while($row_carousel = mysqli_fetch_assoc($carousel)){ ?>
            <li class="text-center"><img src="<?php echo RAIZ ?>timthumb.php?src=<?php echo RAIZ_ADMIN ?>uploads/<?php echo $row_carousel['registros_imagem'] ?>&zc=2&w=285&h=150" class="img-responsive"></li>
            <?php } ?>
        </ul>
    </div>
</section>


<script type="text/javascript">
$(document).ready(function(){
    $('.carousel').lightSlider({
        item:4,
        thumbItem:0,
        slideMargin: 0,
        speed:500,
        pause:5000,
        pauseOnHover:true,
        auto:true,
        loop:true,
        responsive : [
            {
                breakpoint:800,
                settings: {
                    item:3,
                    slideMove:1,
                    slideMargin:6,
                  }
            },
            {
                breakpoint:480,
                settings: {
                    item:2,
                    slideMove:1
                  }
            }
        ]
    });
});
</script>