<link rel="stylesheet" href="<?php echo RAIZ_ADMIN ?>css/jquery-ui.css" type="text/css" />
<link rel="stylesheet" href="<?php echo RAIZ_ADMIN ?>css/jquery-ui.structure.min.css" type="text/css" />
<link rel="stylesheet" href="<?php echo RAIZ_ADMIN ?>css/jquery-ui.structure.min.css" type="text/css" />
<link rel="stylesheet" href="<?php echo RAIZ_ADMIN ?>css/jquery-ui.theme.css" type="text/css" />
<link rel="stylesheet" href="<?php echo RAIZ_ADMIN ?>css/jquery.ui.plupload.css" type="text/css" />

<script type="text/javascript" src="<?php echo RAIZ_ADMIN ?>js/jquery-ui.min.js"></script>

<!-- production -->
<script type="text/javascript" src="<?php echo RAIZ_ADMIN ?>js/plupload.full.min.js"></script>
<script type="text/javascript" src="<?php echo RAIZ_ADMIN ?>js/jquery.ui.plupload.js"></script>

<?php
$id = $_GET['id'];
$query = "SELECT registros_id, registros_idpg, registros_titulo FROM registros WHERE registros_id = $id";
$registros = mysqli_query($config, $query) or die(mysqli_error());
$row_registros = mysqli_fetch_assoc($registros);

$idpg = $row_registros['registros_idpg'];
$query = "SELECT paginas_titulo, paginas_id FROM paginas WHERE paginas_id = $idpg";
$paginas = mysqli_query($config, $query) or die(mysqli_error());
$row_paginas = mysqli_fetch_assoc($paginas);

?>
<div class="row">
  <div class="col-sm-8">
    <h1><?php echo $row_registros['registros_titulo'] ?></h1>
  </div>
</div>

<div class="row">

    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
            </li>
            <li>
                <a href="index.php?page=registros&id=<?php echo $row_paginas['paginas_id'] ?>"><?php echo $row_paginas['paginas_titulo'] ?></a>
            </li>
            <li class="active">
                <?php echo $row_registros['registros_titulo'] ?>
            </li>
        </ol>
    </div>
</div>

<!-- /.row -->


<form id="form" method="post" action="php/dump.php">
    <div id="uploader">
        <p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
    </div>
    <br />
</form>


<div class="row">
<?php 
$pasta = "uploads/fotos/".$id;
$arrImagens = glob("$pasta/{*.jpg,*.JPG,*.jpeg,*.JPEG,*.gif,*.GIF,*.png,*.PNG,*.bmp}", GLOB_BRACE);
foreach ($arrImagens as $key => $value) {
    ?>
    <div class="col-md-2 col-sm-3 col-xs-6" style="margin-bottom:20px;">
        <img src="<?php echo RAIZ_ADMIN."timthumb.php?src=".RAIZ_ADMIN.$value."&zc=1&w=350&h=350" ?>" class="img-responsive">
        <a class="btn btn-danger foto-deletar" endereco="<?php echo $value ?>" style="margin-top:-80px; margin-left:20px;"><i class="fa fa-trash" aria-hidden="true"></i></a>
    </div>
<?php } ?>
</div>



<script type="text/javascript">
// Initialize the widget when the DOM is ready
$(function() {
    $("#uploader").plupload({
        // General settings
        runtimes : 'html5,flash,silverlight,html4',
        url : 'php/upload.php?registros_id=<?php echo $id ?>',

        // User can upload no more then 20 files in one go (sets multiple_queues to false)
        max_file_count: 200,
        
        chunk_size: '1mb',

        // Resize images on clientside if we can
        resize : {
            width : 1000, 
            height : 1500, 
            quality : 90,
            crop: false // crop to exact dimensions
        },
        
        filters : {
            // Maximum file size
            max_file_size : '1mb',
            // Specify what files to browse for
            mime_types: [
                {title : "Image files", extensions : "jpg,gif,png"},
                {title : "Zip files", extensions : "zip"}
            ]
        },

        // Rename files by clicking on their titles
        rename: false,
        
        // Sort files
        sortable: false,

        // Enable ability to drag'n'drop files onto the widget (currently only HTML5 supports that)
        dragdrop: true,

        // Views to activate
        views: {
            list: true,
            thumbs: true, // Show thumbs
            active: 'thumbs'
        },

        // Flash settings
        flash_swf_url : 'js/Moxie.swf',

        // Silverlight settings
        silverlight_xap_url : 'js/Moxie.xap',

        
    });


    // Handle the case when form was submitted before uploading has finished
    // $('#form').submit(function(e) {
    //     // Files in queue upload them first
    //     if ($('#uploader').plupload('getFiles').length > 0) {

    //         // When all files are uploaded submit form
    //         $('#uploader').on('complete', function() {
    //             $('#form')[0].submit();
    //         });

    //         $('#uploader').plupload('start');
    //     } else {
    //         alert("You must have at least one file in the queue.");
    //     }
    //     return false; // Keep the form from submitting
    // });
    


});


</script>
