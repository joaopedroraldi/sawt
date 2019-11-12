<?php

if(isset($_COOKIE['pegaId'])){ 
    $empresaId = strip_tags(trim(utf8_decode($_COOKIE['pegaId']))); 
}else{
    $empresaId = 0;
}

include "connect.php";

$return['mensagem'] = '';

// Hospedagem Web Thomaz
$sql = "select h.*, p.tipo, e.nomeFantasia from hospedagem h, pacote p, cliente_empresa e where h.pacote_Id = p.Id and h.cliente_empresa_Id = e.Id";
if($empresaId > 0){
    $sql .= " and h.cliente_empresa_Id = '$empresaId'";
}
$sql .= " order by dataCad desc";
$sql = mysqli_query($con, $sql);

$cont = 1;
while($rows = mysqli_fetch_object($sql)){
    $return['mensagem'] .= '
    <div class="grid-item web-design hospedagem emrpesa'.$rows->cliente_empresa_Id.'">
        <div class="panel panel-primary">
            <div class="panel-heading">
                ';
                if($empresaId > 0){
                     $return['mensagem'] .= '
                     <label>
                        <input type="checkbox" class="contratoServico" name="hospedagem-'.$cont.'" value="'.$rows->Id.'"> Hospedagem Web Thomaz
                     </label>';
                }else{
                    $return['mensagem'] .= 'Hospedagem Web Thomaz';
                }
            $return['mensagem'] .= '
            </div>
            <ul class="list-group">
                <li class="list-group-item">Data do cadastro: '.date("d/m/Y", strtotime($rows->dataCad)).'</li>
                <li class="list-group-item">Pacote: '.$rows->tipo.'</li>
                ';
                if($rows->observacao != ''){
                    $return['mensagem'] .= '<li class="list-group-item">Observação: '.$rows->observacao.'</li>';
                }
                if($empresaId == 0){
                    $return['mensagem'] .= '<li class="list-group-item">Cliente: '.$rows->nomeFantasia.'</li>';
                }
                $return['mensagem'] .= '
            </ul>
        </div>
    </div>
    ';
    $cont++;
}

// Criação de página
$sql = "select p.*, m.tipo as manutencao, d.tipo as direitos, e.nomeFantasia from pagina p, manutencao_tipo m, de_quem d, cliente_empresa e where p.manutencao_tipo_Id = m.Id and p.direitos_Id = d.Id and p.cliente_empresa_Id = e.Id";
if($empresaId > 0){
    $sql .= " and p.cliente_empresa_Id = '$empresaId'";
}
$sql .= " order by dataCad desc";
$sql = mysqli_query($con, $sql);

$cont = 1;
while($rows = mysqli_fetch_object($sql)){
    $return['mensagem'] .= '
    <div class="grid-item web-design pagina emrpesa'.$rows->cliente_empresa_Id.'">
        <div class="panel panel-primary">
            <div class="panel-heading">
                ';
                if($empresaId > 0){
                     $return['mensagem'] .= '
                     <label>
                        <input type="checkbox" class="contratoServico" name="pagina-'.$cont.'" value="'.$rows->Id.'"> Criação de página
                     </label>';
                }else{
                    $return['mensagem'] .= 'Criação de página';
                }
            $return['mensagem'] .= '
            </div>
            <ul class="list-group">
                <li class="list-group-item">Data do cadastro: '.date("d/m/Y", strtotime($rows->dataCad)).'</li>';
                if($rows->layout == 1){
                    $return['mensagem'] .= '<li class="list-group-item">Layout</li>';
                }
                if($rows->front == 1){
                    $return['mensagem'] .= '<li class="list-group-item">Front-end</li>';
                }
                if($rows->back == 1){
                    $return['mensagem'] .= '<li class="list-group-item">Back-en</li>';
                }
                $return['mensagem'] .= '
                <li class="list-group-item">Manutenção : '.$rows->manutencao.'</li>
                <li class="list-group-item">Diteitos  : '.$rows->direitos.'</li>
                ';
                if($rows->observacao != ''){
                    $return['mensagem'] .= '<li class="list-group-item">Observação: '.$rows->observacao.'</li>';
                }
                if($empresaId == 0){
                    $return['mensagem'] .= '<li class="list-group-item">Cliente: '.$rows->nomeFantasia.'</li>';
                }
                $return['mensagem'] .= '
            </ul>
        </div>
    </div>
    ';
    $cont++;
}

// Registro de domínio
$sql = "select m.*, d.tipo as responsabilidade, d.tipo as direitos, e.nomeFantasia from dominio m, de_quem d, de_quem q, cliente_empresa e where m.responsabilidade_Id = d.Id and m.direitos_Id = q.Id and m.cliente_empresa_Id = e.Id";
if($empresaId > 0){
    $sql .= " and m.cliente_empresa_Id = '$empresaId'";
}
$sql .= " order by dataCad desc";
$sql = mysqli_query($con, $sql);

$cont = 1;
while($rows = mysqli_fetch_object($sql)){
    $return['mensagem'] .= '
    <div class="grid-item web-design dominio emrpesa'.$rows->cliente_empresa_Id.'">
        <div class="panel panel-primary">
            <div class="panel-heading">
                ';
                if($empresaId > 0){
                     $return['mensagem'] .= '
                     <label>
                        <input type="checkbox" class="contratoServico" name="dominio-'.$cont.'" value="'.$rows->Id.'"> Registro de domínio
                     </label>';
                }else{
                    $return['mensagem'] .= 'Registro de domínio';
                }
            $return['mensagem'] .= '
            </div>
            <ul class="list-group">
                <li class="list-group-item">Data do cadastro: '.date("d/m/Y", strtotime($rows->dataCad)).'</li>
                <li class="list-group-item">Responsabilidade: '.$rows->responsabilidade.'</li>
                <li class="list-group-item">Direitos: '.$rows->direitos.'</li>
                ';
                if($rows->observacao != ''){
                    $return['mensagem'] .= '<li class="list-group-item">Observação: '.$rows->observacao.'</li>';
                }
                if($empresaId == 0){
                    $return['mensagem'] .= '<li class="list-group-item">Cliente: '.$rows->nomeFantasia.'</li>';
                }
                $return['mensagem'] .= '
            </ul>
        </div>
    </div>
    ';
    $cont++;
}

// Manutenção de terceiros
$sql = "select m.*, t.tipo, e.nomeFantasia from manutencao m, manutencao_tipo t, cliente_empresa e where m.manutencao_tipo_Id = t.Id and m.cliente_empresa_Id = e.Id";
if($empresaId > 0){
    $sql .= " and m.cliente_empresa_Id = '$empresaId'";
}
$sql .= " order by dataCad desc";
$sql = mysqli_query($con, $sql);

$cont = 1;
while($rows = mysqli_fetch_object($sql)){
    $return['mensagem'] .= '
    <div class="grid-item web-design manutencao emrpesa'.$rows->cliente_empresa_Id.'">
        <div class="panel panel-primary">
            <div class="panel-heading">
                ';
                if($empresaId > 0){
                     $return['mensagem'] .= '
                     <label>
                        <input type="checkbox" class="contratoServico" name="manutencao-'.$cont.'" value="'.$rows->Id.'"> Manutenção de terceiros
                     </label>';
                }else{
                    $return['mensagem'] .= 'Manutenção de terceiros';
                }
            $return['mensagem'] .= '
            </div>
            <ul class="list-group">
                <li class="list-group-item">Data do cadastro: '.date("d/m/Y", strtotime($rows->dataCad)).'</li>
                <li class="list-group-item">Pacote: '.$rows->tipo.'</li>
                ';
                if($rows->observacao != ''){
                    $return['mensagem'] .= '<li class="list-group-item">Observação: '.$rows->observacao.'</li>';
                }
                if($empresaId == 0){
                    $return['mensagem'] .= '<li class="list-group-item">Cliente: '.$rows->nomeFantasia.'</li>';
                }
                $return['mensagem'] .= '
            </ul>
        </div>
    </div>
    ';
    $cont++;
}

// Criação de logo
$sql = "select c.*, e.nomeFantasia from criacao_de_logo c, cliente_empresa e where c.cliente_empresa_Id = e.Id";
if($empresaId > 0){
    $sql .= " and c.cliente_empresa_Id = '$empresaId'";
}
$sql .= " order by dataCad desc";
$sql = mysqli_query($con, $sql);

$cont = 1;
while($rows = mysqli_fetch_object($sql)){
    $return['mensagem'] .= '
    <div class="grid-item publicidade criacao_de_logo emrpesa'.$rows->cliente_empresa_Id.'">
        <div class="panel panel-primary">
            <div class="panel-heading">
                ';
                if($empresaId > 0){
                     $return['mensagem'] .= '
                     <label>
                        <input type="checkbox" class="contratoServico" name="criacao_de_logo-'.$cont.'" value="'.$rows->Id.'"> Criação de logo
                     </label>';
                }else{
                    $return['mensagem'] .= 'Criação de logo';
                }
            $return['mensagem'] .= '
            </div>
            <ul class="list-group">
                <li class="list-group-item">Data do cadastro: '.date("d/m/Y", strtotime($rows->dataCad)).'</li>
                ';
                if($rows->observacao != ''){
                    $return['mensagem'] .= '<li class="list-group-item">Observação: '.$rows->observacao.'</li>';
                }
                if($empresaId == 0){
                    $return['mensagem'] .= '<li class="list-group-item">Cliente: '.$rows->nomeFantasia.'</li>';
                }
                $return['mensagem'] .= '
            </ul>
        </div>
    </div>
    ';
    $cont++;
}

// Design
$sql = "select d.*, e.nomeFantasia from design d, cliente_empresa e where d.cliente_empresa_Id = e.Id";
if($empresaId > 0){
    $sql .= " and d.cliente_empresa_Id = '$empresaId'";
}
$sql .= " order by dataCad desc";
$sql = mysqli_query($con, $sql);

$cont = 1;
while($rows = mysqli_fetch_object($sql)){
    $return['mensagem'] .= '
    <div class="grid-item publicidade design emrpesa'.$rows->cliente_empresa_Id.'">
        <div class="panel panel-primary">
            <div class="panel-heading">
                ';
                if($empresaId > 0){
                     $return['mensagem'] .= '
                     <label>
                        <input type="checkbox" class="contratoServico" name="design-'.$cont.'" value="'.$rows->Id.'"> Design
                     </label>';
                }else{
                    $return['mensagem'] .= 'Design';
                }
            $return['mensagem'] .= '
            </div>
            <ul class="list-group">
                <li class="list-group-item">Data do cadastro: '.date("d/m/Y", strtotime($rows->dataCad)).'</li>';
                if($rows->catalogo == 1){
                    $return['mensagem'] .= '<li class="list-group-item">Catalogo</li>';
                }
                if($rows->cartao == 1){
                    $return['mensagem'] .= '<li class="list-group-item">Cartão</li>';
                }
                if($rows->banner == 1){
                    $return['mensagem'] .= '<li class="list-group-item">Banner</li>';
                }
                if($rows->outdoor == 1){
                    $return['mensagem'] .= '<li class="list-group-item">Outdoor</li>';
                }
                if($rows->midiakit == 1){
                    $return['mensagem'] .= '<li class="list-group-item">Midia Kit</li>';
                }
                if($rows->papelaria == 1){
                    $return['mensagem'] .= '<li class="list-group-item">Papelaria</li>';
                }
                if($rows->assinaturaEmail == 1){
                    $return['mensagem'] .= '<li class="list-group-item">Assinatura para E-Mail</li>';
                }
                if($rows->observacao != ''){
                    $return['mensagem'] .= '<li class="list-group-item">Observação: '.$rows->observacao.'</li>';
                }
                if($empresaId == 0){
                    $return['mensagem'] .= '<li class="list-group-item">Cliente: '.$rows->nomeFantasia.'</li>';
                }
                $return['mensagem'] .= '
            </ul>
        </div>
    </div>
    ';
    $cont++;
}

// E-Mail Marketing
$sql = "select m.*, e.nomeFantasia from email_marketing m, cliente_empresa e where m.cliente_empresa_Id = e.Id";
if($empresaId > 0){
    $sql .= " and m.cliente_empresa_Id = '$empresaId'";
}
$sql .= " order by dataCad desc";
$sql = mysqli_query($con, $sql);

$cont = 1;
while($rows = mysqli_fetch_object($sql)){
    $return['mensagem'] .= '
    <div class="grid-item publicidade email_marketing emrpesa'.$rows->cliente_empresa_Id.'">
        <div class="panel panel-primary">
            <div class="panel-heading">
                ';
                if($empresaId > 0){
                     $return['mensagem'] .= '
                     <label>
                        <input type="checkbox" class="contratoServico" name="email_marketing-'.$cont.'" value="'.$rows->Id.'"> E-Mail Marketing
                     </label>';
                }else{
                    $return['mensagem'] .= 'E-Mail Marketing';
                }
            $return['mensagem'] .= '
            </div>
            <ul class="list-group">
                <li class="list-group-item">Data do cadastro: '.date("d/m/Y", strtotime($rows->dataCad)).'</li>';
                if($rows->redacao == 1){
                    $return['mensagem'] .= '<li class="list-group-item">Redação</li>';
                }
                if($rows->design == 1){
                    $return['mensagem'] .= '<li class="list-group-item">Design</li>';
                }
                if($rows->disparo == 1){
                    $return['mensagem'] .= '<li class="list-group-item">Disparo</li>';
                }
                if($rows->relatorio == 1){
                    $return['mensagem'] .= '<li class="list-group-item">Relatório</li>';
                }
                if($rows->bancoEmails == 1){
                    $return['mensagem'] .= '<li class="list-group-item">Banco de E-Mails</li>';
                }
                if($rows->observacao != ''){
                    $return['mensagem'] .= '<li class="list-group-item">Observação: '.$rows->observacao.'</li>';
                }
                if($empresaId == 0){
                    $return['mensagem'] .= '<li class="list-group-item">Cliente: '.$rows->nomeFantasia.'</li>';
                }
                $return['mensagem'] .= '
            </ul>
        </div>
    </div>
    ';
    $cont++;
}

// Facebook
$sql = "select f.*, i.tipo imagens, m.tipo impulsionamento, e.nomeFantasia from facebook f, imagens i, impulsionamento m, cliente_empresa e where f.imagens_Id = i.Id and f.impulsionamento_Id = m.Id and f.cliente_empresa_Id = e.Id";
if($empresaId > 0){
    $sql .= " and f.cliente_empresa_Id = '$empresaId'";
}
$sql .= " order by dataCad desc";
$sql = mysqli_query($con, $sql);

$cont = 1;
while($rows = mysqli_fetch_object($sql)){
    $return['mensagem'] .= '
    <div class="grid-item publicidade facebook emrpesa'.$rows->cliente_empresa_Id.'">
        <div class="panel panel-primary">
            <div class="panel-heading">
                ';
                if($empresaId > 0){
                     $return['mensagem'] .= '
                     <label>
                        <input type="checkbox" class="contratoServico" name="facebook-'.$cont.'" value="'.$rows->Id.'"> Facebook
                     </label>';
                }else{
                    $return['mensagem'] .= 'Facebook';
                }
            $return['mensagem'] .= '
            </div>
            <ul class="list-group">
                <li class="list-group-item">Data do cadastro: '.date("d/m/Y", strtotime($rows->dataCad)).'</li>';
                if($rows->redacao == 1){
                    $return['mensagem'] .= '<li class="list-group-item">Redação</li>';
                }
                $return['mensagem'] .= '
                <li class="list-group-item">Imagens: '.$rows->imagens.'</li>
                <li class="list-group-item">Impulsionamento: '.$rows->impulsionamento.'</li>
                <li class="list-group-item">Frequência quantidade: '.$rows->frequenciaQuantidade.'</li>
                <li class="list-group-item">Frequência dias da semana: '.$rows->frequenciaDiasSenama.'</li>
                ';
                if($rows->observacao != ''){
                    $return['mensagem'] .= '<li class="list-group-item">Observação: '.$rows->observacao.'</li>';
                }
                if($empresaId == 0){
                    $return['mensagem'] .= '<li class="list-group-item">Cliente: '.$rows->nomeFantasia.'</li>';
                }
                $return['mensagem'] .= '
            </ul>
        </div>
    </div>
    ';
    $cont++;
}


//$return["json"] = json_encode($return);
echo json_encode($return);
?>