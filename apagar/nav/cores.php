<link rel="stylesheet" media="screen" type="text/css" href="css/colorpicker.css" />
<script type="text/javascript" src="js/colorpicker.js"></script>

<?php 
$query = "SELECT * FROM cores";
$cores = mysqli_query($config, $query) or die(mysqli_error());
$row_cores = mysqli_fetch_assoc($cores);
?>
<!-- Page Heading -->
<div class="row">
    <div class="col-sm-9">
        <h1 class="page-header">
            Editar Cores
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
            </li>
            <li class="active">
               Editar Cores
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form id="cores_editar" method="post" enctype="multipart/form-data" class="form">
            <div class="form-group">
                <label>Cor 1</label>
                <input style="border-left:solid 40px <?php echo $row_cores['cor_1'] ?>" name="cor_1" class="form-control" type="text" value="<?php echo $row_cores['cor_1'] ?>">
            </div>
            <div class="form-group">
                <label>Cor 2</label>
                <input style="border-left:solid 40px <?php echo $row_cores['cor_2'] ?>" name="cor_2" class="form-control" type="text" value="<?php echo $row_cores['cor_2'] ?>">
            </div>
            <div class="form-group">
                <label>Cor 3</label>
                <input style="border-left:solid 40px <?php echo $row_cores['cor_3'] ?>" name="cor_3" class="form-control" type="text" value="<?php echo $row_cores['cor_3'] ?>">
            </div>

            <div class="clear20"></div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>
<div class="clear10"></div>


<div id="retorno"></div>

<script type="text/javascript">
$('input').ColorPicker({
    onSubmit: function(hsb, hex, rgb, el) {
        $(el).val('#'+hex);
        $(el).ColorPickerHide();
        $(el).css({"border-left":"solid 40px #"+hex});
    },
    onBeforeShow: function () {
        $(this).ColorPickerSetColor(this.value);
    }
})
.bind('keyup', function(){
    $(this).ColorPickerSetColor(this.value);
});

</script>