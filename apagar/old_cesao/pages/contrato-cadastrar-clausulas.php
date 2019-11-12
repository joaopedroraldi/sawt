<?php

// Hospedagem Web Thomaz
if($clausula == 'hospedagem'){
    $paragrafoNum = 1;
    $sql = "select h.*, p.tipo, e.nomeFantasia from hospedagem h, pacote p, cliente_empresa e where h.pacote_Id = p.Id and h.cliente_empresa_Id = e.Id and h.cliente_empresa_Id = '$empresaId' and h.Id = '$value' order by dataCad desc";
    $sql = mysqli_query($con, $sql);
    while($rows = mysqli_fetch_object($sql)){
        ?>
        <li><strong>Cláusula <?php echo $clausulaNum; ?>ª:</strong> Hospedagem Web Thomaz
            <ul>
                <li><strong>Parágrafo <?php echo $paragrafoNum; ?>º:</strong> 
                    Pacote: <?php echo $rows->tipo; ?>; 
                    <?php
                    if($rows->observacao != ''){ 
                        ?>
                        Observação: <?php echo $rows->observacao; ?>.
                        <?php 
                    }
                    ?>
                    Seguem expecificações no anexo <?php echo $clausulaNum; ?>
                </li>
            </ul>
        </li>
        <?php
        $paragrafoNum++;
    }
    $clausulaNum++;
}

// Criação de página
if($clausula == 'pagina'){
    $paragrafoNum = 1;
    $sql = "select p.*, m.tipo as manutencao, d.tipo as direitos, e.nomeFantasia from pagina p, manutencao_tipo m, de_quem d, cliente_empresa e where p.manutencao_tipo_Id = m.Id and p.direitos_Id = d.Id and p.cliente_empresa_Id = e.Id and p.cliente_empresa_Id = '$empresaId' and p.Id = '$value' order by dataCad desc";
    $sql = mysqli_query($con, $sql);
    while($rows = mysqli_fetch_object($sql)){
        ?>
        <li><strong>Cláusula <?php echo $clausulaNum; ?>ª:</strong> Criação de página
            <ul>
                <li><strong>Parágrafo <?php echo $paragrafoNum; ?>º:</strong> 
                    <?php
                    if($rows->layout == 1){
                        ?>
                        Layout; 
                        <?php
                    }
                    if($rows->front == 1){
                        ?>
                        Front-end; 
                        <?php
                    }
                    if($rows->back == 1){
                        ?>
                        Back-en; 
                        <?php
                    }
                    ?>
                    Manutenção: <?php echo $rows->manutencao; ?>; 
                    Diteitos: <?php echo $rows->direitos; ?>; 
                    <?php
                    if($rows->observacao != ''){ 
                        ?>
                        Observação: <?php echo $rows->observacao; ?>.
                        <?php 
                    }
                    ?>
                    Seguem expecificações no anexo <?php echo $clausulaNum; ?>
                </li>
            </ul>
        </li>
        <?php
        $paragrafoNum++;
    }
    $clausulaNum++;
}

// Registro de domínio
if($clausula == 'dominio'){
    $paragrafoNum = 1;
    $sql = "select m.*, d.tipo as responsabilidade, d.tipo as direitos, e.nomeFantasia from dominio m, de_quem d, de_quem q, cliente_empresa e where m.responsabilidade_Id = d.Id and m.direitos_Id = q.Id and m.cliente_empresa_Id = e.Id and m.cliente_empresa_Id = '$empresaId' and m.Id = '$value' order by dataCad desc";
    $sql = mysqli_query($con, $sql);
    while($rows = mysqli_fetch_object($sql)){
        ?>
        <li><strong>Cláusula <?php echo $clausulaNum; ?>ª:</strong> Registro de domínio
            <ul>
                <li><strong>Parágrafo <?php echo $paragrafoNum; ?>º:</strong>  
                   Responsabilidade: <?php echo $rows->responsabilidade; ?>; 
                    Direitos: <?php echo $rows->direitos; ?>; 
                    <?php
                    if($rows->observacao != ''){ 
                        ?>
                        Observação: <?php echo $rows->observacao; ?>.
                        <?php 
                    }
                    ?>
                    Seguem expecificações no anexo <?php echo $clausulaNum; ?>
                </li>
            </ul>
        </li>
        <?php
        $paragrafoNum++;
    }
    $clausulaNum++;
}

// Manutenção de terceiros
if($clausula == 'manutencao'){
    $paragrafoNum = 1;
    $sql = "select m.*, t.tipo, e.nomeFantasia from manutencao m, manutencao_tipo t, cliente_empresa e where m.manutencao_tipo_Id = t.Id and m.cliente_empresa_Id = e.Id and m.cliente_empresa_Id = '$empresaId' and m.Id = '$value' order by dataCad desc";
    $sql = mysqli_query($con, $sql);
    while($rows = mysqli_fetch_object($sql)){
        ?>
        <li><strong>Cláusula <?php echo $clausulaNum; ?>ª:</strong> Manutenção e/ou alteração de site
            <ul>
                <li><strong>Parágrafo <?php echo $paragrafoNum; ?>º:</strong> 
                    <?php echo $rows->tipo; ?>; 
                    <?php
                    if($rows->observacao != ''){ 
                        ?>
                        Observação: <?php echo $rows->observacao; ?>.
                        <?php 
                    }
                    ?>
                    Seguem expecificações no anexo <?php echo $clausulaNum; ?>
                </li>
            </ul>
        </li>
        <?php
        $paragrafoNum++;
    }
    $clausulaNum++;
}

// Criação de logo
if($clausula == 'criacao_de_logo'){
    $paragrafoNum = 1;
    $sql = "select c.*, e.nomeFantasia from criacao_de_logo c, cliente_empresa e where c.cliente_empresa_Id = e.Id and c.cliente_empresa_Id = '$empresaId' and c.Id = '$value' order by dataCad desc";
    $sql = mysqli_query($con, $sql);
    while($rows = mysqli_fetch_object($sql)){
        ?>
        <li><strong>Cláusula <?php echo $clausulaNum; ?>ª:</strong> Criação de logo
            <ul>
                <li><strong>Parágrafo <?php echo $paragrafoNum; ?>º:</strong> 
                    
                    <?php
                    if($rows->observacao != ''){ 
                        ?>
                        Observação: <?php echo $rows->observacao; ?>.
                        <?php 
                    }
                    ?>
                    Seguem expecificações no anexo <?php echo $clausulaNum; ?>
                </li>
            </ul>
        </li>
        <?php
        $paragrafoNum++;
    }
    $clausulaNum++;
}

// Design
if($clausula == 'design'){
    $paragrafoNum = 1;
    $sql = "select d.*, e.nomeFantasia from design d, cliente_empresa e where d.cliente_empresa_Id = e.Id and d.cliente_empresa_Id = '$empresaId' and d.Id = '$value' order by dataCad desc";
    $sql = mysqli_query($con, $sql);
    while($rows = mysqli_fetch_object($sql)){
        ?>
        <li><strong>Cláusula <?php echo $clausulaNum; ?>ª:</strong> Design
            <ul>
                <li><strong>Parágrafo <?php echo $paragrafoNum; ?>º:</strong> 
                    <?php
                    if($rows->catalogo == 1){
                        ?>
                        Catalogo; 
                        <?php
                    }
                    if($rows->cartao == 1){
                        ?>
                        Cartão; 
                        <?php
                    }
                    if($rows->banner == 1){
                        ?>
                        Banner; 
                        <?php
                    }
                    if($rows->outdoor == 1){
                        ?>
                        Outdoor; 
                        <?php
                    }
                    if($rows->midiakit == 1){
                        ?>
                        Midia Kit; 
                        <?php
                    }
                    if($rows->papelaria == 1){
                        ?>
                        Papelaria; 
                        <?php
                    }
                    if($rows->assinaturaEmail == 1){
                        ?>
                        Assinatura para E-Mail; 
                        <?php
                    }
                    if($rows->observacao != ''){ 
                        ?>
                        Observação: <?php echo $rows->observacao; ?>.
                        <?php 
                    }
                    ?>
                    Seguem expecificações no anexo <?php echo $clausulaNum; ?>
                </li>
            </ul>
        </li>
        <?php
        $paragrafoNum++;
    }
    $clausulaNum++;
}

// E-Mail Marketing
if($clausula == 'email_marketing'){
    $paragrafoNum = 1;
    $sql = "select m.*, e.nomeFantasia from email_marketing m, cliente_empresa e where m.cliente_empresa_Id = e.Id and m.cliente_empresa_Id = '$empresaId' and m.Id = '$value' order by dataCad desc";
    $sql = mysqli_query($con, $sql);
    while($rows = mysqli_fetch_object($sql)){
        ?>
        <li><strong>Cláusula <?php echo $clausulaNum; ?>ª:</strong> E-Mail Marketing
            <ul>
                <li><strong>Parágrafo <?php echo $paragrafoNum; ?>º:</strong>               
                    <?php
                    if($rows->redacao == 1){
                        ?>
                        Redação; 
                        <?php
                    }
                    if($rows->design == 1){
                        ?>
                        Design; 
                        <?php
                    }
                    if($rows->disparo == 1){
                        ?>
                        Disparo; 
                        <?php
                    }
                    if($rows->relatorio == 1){
                        ?>
                        Relatório; 
                        <?php
                    }
                    if($rows->bancoEmails == 1){
                        ?>
                        Banco de E-Mails; 
                        <?php
                    }
                    if($rows->observacao != ''){ 
                        ?>
                        Observação: <?php echo $rows->observacao; ?>.
                        <?php 
                    }
                    ?>
                    Seguem expecificações no anexo <?php echo $clausulaNum; ?>
                </li>
            </ul>
        </li>
        <?php
        $paragrafoNum++;
    }
    $clausulaNum++;
}

// Facebook
if($clausula == 'facebook'){
    $paragrafoNum = 1;
    $sql = "select f.*, i.tipo imagens, m.tipo impulsionamento, e.nomeFantasia from facebook f, imagens i, impulsionamento m, cliente_empresa e where f.imagens_Id = i.Id and f.impulsionamento_Id = m.Id and f.cliente_empresa_Id = e.Id and f.cliente_empresa_Id = '$empresaId' and f.Id = '$value' order by dataCad desc";
    $sql = mysqli_query($con, $sql);
    while($rows = mysqli_fetch_object($sql)){
        ?>
        <strong>Cláusula <?php echo $clausulaNum; ?>ª:</strong> Facebook
            <ul>
                <li><strong>Parágrafo <?php echo $paragrafoNum; ?>º:</strong>                     
                    <?php
                    if($rows->redacao == 1){
                        ?>
                        Redação; 
                        <?php
                    }
                    ?>
                    Imagens: <?php echo $rows->imagens; ?>; 
                    Impulsionamento: <?php echo $rows->impulsionamento; ?>; 
                    Frequência quantidade: <?php echo $rows->frequenciaQuantidade; ?>; 
                    Frequência dias da semana: <?php echo $rows->frequenciaDiasSenama; ?>; 
                    <?php
                    if($rows->observacao != ''){ 
                        ?>
                        Observação: <?php echo $rows->observacao; ?>.
                        <?php 
                    }
                    ?>
                    Seguem expecificações no anexo <?php echo $clausulaNum; ?>
                </li>
            </ul>
        </li>
        <?php
        $paragrafoNum++;
    }
    $clausulaNum++;
}
?>
