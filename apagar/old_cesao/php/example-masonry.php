<?php
$return['mensagem'] = '
        <div class="grid-item">
            <div class="panel panel-default">
                <div class="panel-heading number">O último bom lugar 0</div>
                <div class="panel-body fodase">
                    est in despicationes, offendit nam vidisse, enim voluptate se elit aute, ut 
                    velit lorem de offendit ubi te lorem officia. Incurreret quorum elit non magna 
                    ne laboris nulla mandaremus est duis aliquip do praetermissum ad id est minim 
                    excepteur. De quorum admodum quamquam, offendit quae admodum senserit, malis 
                    admodum se eram summis, iis cupidatat concursionibus e non nulla ad dolor iis ea fodase 
                </div>
            </div>
        </div>
        ';
for($i=1;$i<20;$i++){
    $return['mensagem'] .= '
        <div class="grid-item metal">
            <div class="panel panel-default">
                <div class="panel-heading number">O último bom lugar '.$i.'</div>
                <div class="panel-body fodase">
                    est in despicationes, offendit nam vidisse, enim voluptate se elit aute, ut 
                    velit lorem de offendit ubi te lorem officia. Incurreret quorum elit non magna 
                    ne laboris nulla mandaremus est duis aliquip do praetermissum ad id est minim 
                    excepteur. De quorum admodum quamquam, offendit quae admodum senserit, malis 
                    admodum se eram summis, iis cupidatat concursionibus e non nulla ad dolor iis ea 
                </div>
            </div>
        </div>
        ';
    $return['mensagem'] .= '
        <div class="grid-item transition">
            <div class="panel panel-default">
                <div class="panel-heading number">O último bom lugar '.$i.'</div>
                <div class="panel-body fodase">
                    Mentitum de labore occaecat hic an fugiat despicationes. Fore probant ex aliqua 
                    nisi sed offendit illum ex incididunt transferrem, ita cupidatat aut commodo qui 
                    est in despicationes, offendit nam vidisse, enim voluptate se elit aute, ut 
                </div>
            </div>
        </div>
        ';
    $return['mensagem'] .= '
        <div class="grid-item metal transition">
            <div class="panel panel-default">
                <div class="panel-heading number">O último bom lugar '.$i.'</div>
                <div class="panel-body fodase">
                    Mentitum de labore occaecat hic an fugiat despicationes. Fore probant ex aliqua 
                    nisi sed offendit illum ex incididunt transferrem, ita cupidatat aut commodo qui 
                    est in despicationes, offendit nam vidisse, enim voluptate se elit aute, ut 
                </div>
            </div>
        </div>
        ';
}

//$return["json"] = json_encode($return);
echo json_encode($return);
?>