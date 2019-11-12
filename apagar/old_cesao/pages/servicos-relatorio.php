<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Serviços cadastrados</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<?php

if(isset($_COOKIE['pegaId'])){ 
    $empresaId = strip_tags(trim(utf8_decode($_COOKIE['pegaId']))); 
}else{
    $empresaId = 0;
}

if($empresaId == 0){ 
    ?>
    <div class="row">
        <div class="col-md-6">
            <h3>Empresas</h3>
            <select class="form-control empresas">
                <option value="*">Todas</option>
                <?php
                $cliente_empresa = mysqli_query($con, "select * from cliente_empresa order by nomeFantasia"); 
                while($cliente_empresaRow = mysqli_fetch_object($cliente_empresa)){
                    ?>
                    <option value="<?php echo $cliente_empresaRow->Id; ?>" >
                        <?php echo $cliente_empresaRow->nomeFantasia; ?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <hr>
    <?php
}
?>

<div class="button-group filters-button-group">
    <h3>Web designer</h3>
    <button class="btn btn-success" data-filter=".web-design">Todos</button>
    <button class="btn btn-primary" data-filter=".hospedagem">Hospedagem Web Thomaz</button>
    <button class="btn btn-primary" data-filter=".pagina">Criação de página</button>
    <button class="btn btn-primary" data-filter=".dominio">Registro de domínio</button>
    <button class="btn btn-primary" data-filter=".manutencao">Manutenção de terceiros</button>
    <h3>Publicidade</h3>
    <button class="btn btn-success" data-filter=".publicidade">Todos</button>
    <button class="btn btn-primary" data-filter=".criacao_de_logo">Criação de logo</button>
    <button class="btn btn-primary" data-filter=".design">Design</button>
    <button class="btn btn-primary" data-filter=".email_marketing">E-Mail Marketing</button>
    <button class="btn btn-primary" data-filter=".facebook">Facebook</button>
</div>
<hr>

<?php
if($empresaId > 0){ 
    $cliente_empresa = mysqli_query($con, "select * from cliente_empresa where Id = $empresaId"); 
    $cliente_empresaRow = mysqli_fetch_object($cliente_empresa);
    ?>
    <form id="servicos-selecionar" name="servicos-selecionar" enctype="multipart/form-data" role="form" class="form">
        <div class="row">
            <div class="col-md-8">
                <h3>Empresa: <?php echo $cliente_empresaRow->nomeFantasia; ?> <a href="#" class="limpar-selecao"><i class="glyphicon glyphicon-erase fa-fw"></i></a></h3>
            </div>
            <div class="col-md-4">
                <br>
                <button type="submit" class="btn btn-success form-control float-right" data-loading-text="Carregando..." autocomplete="off">Adicionar serviços para novo contrato</button>
            </div>
        </div>
        <hr>
        <div class="grid">
            <div class="grid-sizer"></div>
        </div>
    </form>
    <?php
}else{
    ?>
    <div class="grid">
        <div class="grid-sizer"></div>
    </div>
    <?php
}
if(isset($_SESSION['servicos'])){
    //unset($_SESSION['servicos']);
}
?>