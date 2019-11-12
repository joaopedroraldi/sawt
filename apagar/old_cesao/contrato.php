<?php

include_once "php/connect.php";

$data = 0;
if(isset($_GET['data'])){ 
    $data = strip_tags(trim(utf8_decode($_GET['data']))); 
}
$hora = 0;
if(isset($_GET['data'])){ 
    $hora = strip_tags(trim(utf8_decode($_GET['hora']))); 
}

$sql = "select * from contrato where dataCad = '".$data." ".$hora."'";
$query = mysqli_query($con, $sql);
$rows = mysqli_num_rows($query);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contrato Nome da empresa</title>

    <!-- Bootstrap -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style type="text/css" media="screen">
        #imprimir{
            position:fixed;
            bottom:15px;
            right:15px;
        }
        .container{
            margin-bottom:70px;
        }
    </style>
    
    <style type="text/css" media="print">
        hr {
            page-break-after: always;
            visibility: hidden;
        }
        #imprimir{
            display:none;
        }
        .container{
            margin-bottom:0px;
        }
    </style>
    
</head>
<body>
<?php
if($rows == 0){
    ?>
    <h1 class="text-center">Contrato não encontrado</h1>
    <?php
}else{
    ?>
    <button class="btn btn-primary" id="imprimir"><span class="glyphicon glyphicon-print"></span> Imprimir</button>

    <div class="container text-justify">
        <h4 class="text-center text-uppercase">Contrato</h4>
        
        <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, temporibus quod, aperiam cumque accusantium voluptates doloribus officia, saepe odit eveniet at rerum corrupti voluptatibus alias. Non minima voluptatum vel corporis.</div>
        <div>Aperiam, quod tenetur? Itaque, enim eius pariatur quas commodi voluptatibus aspernatur quia, in tenetur iusto et esse modi? Dicta exercitationem dolores, sint error modi vero repellendus omnis quia laudantium. Nihil.</div>
        <div>Cumque maiores, iste esse doloribus? Fugiat, ullam autem. Ea commodi ut ullam, explicabo sint laborum culpa. Quod dolorem asperiores, aut veritatis recusandae, itaque laborum assumenda, repudiandae incidunt harum unde ratione.</div>
        <div>Quis ipsa eveniet sunt eum esse ad. In inventore obcaecati commodi voluptatum molestiae itaque, quam est accusamus culpa illo porro ab, nisi perspiciatis pariatur maiores blanditiis incidunt, eos nesciunt repellat!</div>
        <div>Unde nulla laboriosam, ut aut. Earum ipsam minus eveniet tempore corporis debitis, aliquam, accusantium. Quasi, animi eaque, nulla quam ab incidunt, ea sint et, repellendus maxime autem molestias quas eius.</div>
        
        <hr>
        
        <h4 class="text-center text-uppercase">Dos serviços contratados</h4>
        <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum repellendus molestiae, fugiat quaerat aliquam eveniet illum tempora animi, praesentium error dignissimos optio repudiandae perferendis nostrum nesciunt, in voluptate sapiente soluta.</div>
        <div>Provident, illo placeat voluptatum architecto voluptas reiciendis sed recusandae in, ipsa libero repellendus optio? Provident nostrum aperiam nisi adipisci iste animi! Ipsum repellat consequatur modi minus sunt cupiditate, illum eveniet.</div>
        <div>Sed cum itaque recusandae officiis officia similique, molestiae illum! Non minus quo tempore dolore blanditiis rem deserunt, nisi ad esse, maiores impedit iure saepe dolorem obcaecati, ipsam eligendi autem enim.</div>
        <div>Ducimus, ut. Aut totam, est, ullam, odit sed vero repellat officiis ex dolor facilis ipsum explicabo autem, facere alias ratione blanditiis fuga distinctio provident? Totam nemo eveniet et expedita maxime.</div>
        <div>Porro accusantium sapiente necessitatibus qui laborum aliquam voluptate ratione praesentium enim accusamus consectetur vel quisquam officiis, nesciunt ad saepe iusto minus numquam dicta aperiam architecto eligendi nam omnis amet cumque.</div>
        
        <hr>
        
        <h4 class="text-center text-uppercase">Dos direitos e deveres da contratante</h4>
        <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum repellendus molestiae, fugiat quaerat aliquam eveniet illum tempora animi, praesentium error dignissimos optio repudiandae perferendis nostrum nesciunt, in voluptate sapiente soluta.</div>
        <div>Provident, illo placeat voluptatum architecto voluptas reiciendis sed recusandae in, ipsa libero repellendus optio? Provident nostrum aperiam nisi adipisci iste animi! Ipsum repellat consequatur modi minus sunt cupiditate, illum eveniet.</div>
        <div>Sed cum itaque recusandae officiis officia similique, molestiae illum! Non minus quo tempore dolore blanditiis rem deserunt, nisi ad esse, maiores impedit iure saepe dolorem obcaecati, ipsam eligendi autem enim.</div>
        <div>Ducimus, ut. Aut totam, est, ullam, odit sed vero repellat officiis ex dolor facilis ipsum explicabo autem, facere alias ratione blanditiis fuga distinctio provident? Totam nemo eveniet et expedita maxime.</div>
        <div>Porro accusantium sapiente necessitatibus qui laborum aliquam voluptate ratione praesentium enim accusamus consectetur vel quisquam officiis, nesciunt ad saepe iusto minus numquam dicta aperiam architecto eligendi nam omnis amet cumque.</div>
        
        <hr>
        
        <h4 class="text-center text-uppercase">Dos direitos e deveres da contratada</h4>
        <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum repellendus molestiae, fugiat quaerat aliquam eveniet illum tempora animi, praesentium error dignissimos optio repudiandae perferendis nostrum nesciunt, in voluptate sapiente soluta.</div>
        <div>Provident, illo placeat voluptatum architecto voluptas reiciendis sed recusandae in, ipsa libero repellendus optio? Provident nostrum aperiam nisi adipisci iste animi! Ipsum repellat consequatur modi minus sunt cupiditate, illum eveniet.</div>
        <div>Sed cum itaque recusandae officiis officia similique, molestiae illum! Non minus quo tempore dolore blanditiis rem deserunt, nisi ad esse, maiores impedit iure saepe dolorem obcaecati, ipsam eligendi autem enim.</div>
        <div>Ducimus, ut. Aut totam, est, ullam, odit sed vero repellat officiis ex dolor facilis ipsum explicabo autem, facere alias ratione blanditiis fuga distinctio provident? Totam nemo eveniet et expedita maxime.</div>
        <div>Porro accusantium sapiente necessitatibus qui laborum aliquam voluptate ratione praesentium enim accusamus consectetur vel quisquam officiis, nesciunt ad saepe iusto minus numquam dicta aperiam architecto eligendi nam omnis amet cumque.</div>
        
        <hr>
        
        <h4 class="text-center text-uppercase">Anexo 1</h4>
        <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum repellendus molestiae, fugiat quaerat aliquam eveniet illum tempora animi, praesentium error dignissimos optio repudiandae perferendis nostrum nesciunt, in voluptate sapiente soluta.</div>
        <div>Provident, illo placeat voluptatum architecto voluptas reiciendis sed recusandae in, ipsa libero repellendus optio? Provident nostrum aperiam nisi adipisci iste animi! Ipsum repellat consequatur modi minus sunt cupiditate, illum eveniet.</div>
        <div>Sed cum itaque recusandae officiis officia similique, molestiae illum! Non minus quo tempore dolore blanditiis rem deserunt, nisi ad esse, maiores impedit iure saepe dolorem obcaecati, ipsam eligendi autem enim.</div>
        <div>Ducimus, ut. Aut totam, est, ullam, odit sed vero repellat officiis ex dolor facilis ipsum explicabo autem, facere alias ratione blanditiis fuga distinctio provident? Totam nemo eveniet et expedita maxime.</div>
        <div>Porro accusantium sapiente necessitatibus qui laborum aliquam voluptate ratione praesentium enim accusamus consectetur vel quisquam officiis, nesciunt ad saepe iusto minus numquam dicta aperiam architecto eligendi nam omnis amet cumque.</div>
        
        <hr>
        
        <h4 class="text-center text-uppercase">Anexo 2</h4>
        <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum repellendus molestiae, fugiat quaerat aliquam eveniet illum tempora animi, praesentium error dignissimos optio repudiandae perferendis nostrum nesciunt, in voluptate sapiente soluta.</div>
        <div>Provident, illo placeat voluptatum architecto voluptas reiciendis sed recusandae in, ipsa libero repellendus optio? Provident nostrum aperiam nisi adipisci iste animi! Ipsum repellat consequatur modi minus sunt cupiditate, illum eveniet.</div>
        <div>Sed cum itaque recusandae officiis officia similique, molestiae illum! Non minus quo tempore dolore blanditiis rem deserunt, nisi ad esse, maiores impedit iure saepe dolorem obcaecati, ipsam eligendi autem enim.</div>
        <div>Ducimus, ut. Aut totam, est, ullam, odit sed vero repellat officiis ex dolor facilis ipsum explicabo autem, facere alias ratione blanditiis fuga distinctio provident? Totam nemo eveniet et expedita maxime.</div>
        <div>Porro accusantium sapiente necessitatibus qui laborum aliquam voluptate ratione praesentium enim accusamus consectetur vel quisquam officiis, nesciunt ad saepe iusto minus numquam dicta aperiam architecto eligendi nam omnis amet cumque.</div>
        
        <hr>
        
        <h4 class="text-center text-uppercase">Anexo 3</h4>
        <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum repellendus molestiae, fugiat quaerat aliquam eveniet illum tempora animi, praesentium error dignissimos optio repudiandae perferendis nostrum nesciunt, in voluptate sapiente soluta.</div>
        <div>Provident, illo placeat voluptatum architecto voluptas reiciendis sed recusandae in, ipsa libero repellendus optio? Provident nostrum aperiam nisi adipisci iste animi! Ipsum repellat consequatur modi minus sunt cupiditate, illum eveniet.</div>
        <div>Sed cum itaque recusandae officiis officia similique, molestiae illum! Non minus quo tempore dolore blanditiis rem deserunt, nisi ad esse, maiores impedit iure saepe dolorem obcaecati, ipsam eligendi autem enim.</div>
        <div>Ducimus, ut. Aut totam, est, ullam, odit sed vero repellat officiis ex dolor facilis ipsum explicabo autem, facere alias ratione blanditiis fuga distinctio provident? Totam nemo eveniet et expedita maxime.</div>
        <div>Porro accusantium sapiente necessitatibus qui laborum aliquam voluptate ratione praesentium enim accusamus consectetur vel quisquam officiis, nesciunt ad saepe iusto minus numquam dicta aperiam architecto eligendi nam omnis amet cumque.</div>
        
        
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <script>
        $(document).ready(function(){
            $('#imprimir').click(function(){
                window.print();
            });
        });
    </script>
    <?php
}
?>
</body>
</html>
