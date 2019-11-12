<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Administração</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                        //$usuarios = mysqli_query($con, "select COUNT(Id) as total from usuario where ativo = 1");
                        //$usuariosRow = mysqli_fetch_object($usuarios);
                        ?>  
                        <div class="huge"><?php //echo $usuariosRow->total; ?>372</div>
                        <div>Responsáveis ativos!</div>
                    </div>
                </div>
            </div>
            <a href="?menu=responsavel-tabela&submenu=responsavel-cadastrar">
                <div class="panel-footer">
                    <span class="pull-left">Novo cadastro</span>
                    <span class="pull-right"><i class="fa fa-pencil-square-o"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-institution fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                        //$clientes = mysqli_query($con, "select COUNT(Id) as total from cliente_empresa where ativo = 1");
                        //$clientesRow = mysqli_fetch_object($clientes);
                        ?>  
                        <div class="huge"><?php //echo $clientesRow->total; ?>361</div>
                        <div>Empresas ativas!</div>
                    </div>
                </div>
            </div>
            <a href="?menu=empresa-tabela&submenu=empresa-cadastrar">
                <div class="panel-footer">
                    <span class="pull-left">Novo cadastro</span>
                    <span class="pull-right"><i class="fa fa-pencil-square-o"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-code fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">1452</div>
                        <div>Web design</div>
                    </div>
                </div>
            </div>
            <a href="?menu=servicos&submenu=webdesign-cadastrar">
                <div class="panel-footer">
                    <span class="pull-left">Novo cadastro</span>
                    <span class="pull-right"><i class="fa fa-pencil-square-o"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-bullhorn fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">847</div>
                        <div>Publicidade</div>
                    </div>
                </div>
            </div>
            <a href="?menu=servicos&submenu=publicidade-cadastrar">
                <div class="panel-footer">
                    <span class="pull-left">Novo cadastro</span>
                    <span class="pull-right"><i class="fa fa-pencil-square-o"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-8">
       
        <?php include "pages/chat.php"; ?>
       
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-file-text-o fa-fw"></i> Frases de reflexão
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <ul class="timeline">
                    <li>
                        <div class="timeline-badge info"><i class="fa fa-comment"></i>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">Pense e reflita</h4>
                                </p>
                            </div>
                            <div class="timeline-body">
                                <blockquote>
                                    <p>O segredo da vida não é ter tudo que você quer, mas amar tudo que você tem!</p>
                                    <small>
                                        <cite title="Source Title">George Carlin</cite>
                                    </small>
                                </blockquote>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-badge warning"><i class="fa fa-comment"></i>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">Pense e reflita</h4>
                                </p>
                            </div>
                            <div class="timeline-body">
                                <blockquote>
                                    <p>Todos querem o perfume das flores, mas poucos sujam suas mãos para cultivá-las.</p>
                                    <small>
                                        <cite title="Source Title">Augusto Cury</cite>
                                    </small>
                                </blockquote>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-badge info"><i class="fa fa-comment"></i>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">Pense e reflita</h4>
                                </p>
                            </div>
                            <div class="timeline-body">
                                <blockquote>
                                    <p>A maneira como você coleta, gerencia e utiliza as informações determina se você vai vencer ou perder.</p>
                                    <small>
                                        <cite title="Source Title">Bill Gates</cite>
                                    </small>
                                </blockquote>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-badge warning"><i class="fa fa-comment"></i>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">Pense e reflita</h4>
                                </p>
                            </div>
                            <div class="timeline-body">
                                <blockquote>
                                    <p>A mudança não virá se esperarmos por outra pessoa ou outros tempos. Nós somos aqueles por quem estávamos esperando. Nós somos a mudança que procuramos.</p>
                                    <small>
                                        <cite title="Source Title">Barack Obama</cite>
                                    </small>
                                </blockquote>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- /.panel-body -->
        </div>
        
    </div>
    <!-- /.col-lg-8 -->
    <div class="col-lg-4">
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bell fa-fw"></i> Serviços a vencer
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="list-group">
                    <a href="#" class="list-group-item" title="Visualizar">
                        <i class="fa fa-chain fa-fw"></i> Domínios
                        <span class="pull-right badge">4</span>
                    </a>
                    <a href="#" class="list-group-item" title="Visualizar">
                        <i class="fa fa-suitcase fa-fw"></i> Hospedagens
                        <span class="pull-right badge">4</span>
                    </a>
                    <a href="#" class="list-group-item" title="Visualizar">
                        <i class="fa fa-money fa-fw"></i> Mensalidade
                        <span class="pull-right badge">4</span>
                    </a>
                </div>
                <!-- /.list-group -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Donut Chart Example
            </div>
            <div class="panel-body">
                <div id="morris-donut-chart"></div>
                <a href="#" class="btn btn-default btn-block">View Details</a>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
        
        <!-- /.panel -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div id="morris-area-chart"></div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
        
    </div>
    <!-- /.col-lg-4 -->
    
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Bar Chart Example
                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            Actions
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li><a href="#">Action</a>
                            </li>
                            <li><a href="#">Another action</a>
                            </li>
                            <li><a href="#">Something else here</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>3326</td>
                                        <td>10/21/2013</td>
                                        <td>3:29 PM</td>
                                        <td>$321.33</td>
                                    </tr>
                                    <tr>
                                        <td>3325</td>
                                        <td>10/21/2013</td>
                                        <td>3:20 PM</td>
                                        <td>$234.34</td>
                                    </tr>
                                    <tr>
                                        <td>3324</td>
                                        <td>10/21/2013</td>
                                        <td>3:03 PM</td>
                                        <td>$724.17</td>
                                    </tr>
                                    <tr>
                                        <td>3323</td>
                                        <td>10/21/2013</td>
                                        <td>3:00 PM</td>
                                        <td>$23.71</td>
                                    </tr>
                                    <tr>
                                        <td>3322</td>
                                        <td>10/21/2013</td>
                                        <td>2:49 PM</td>
                                        <td>$8345.23</td>
                                    </tr>
                                    <tr>
                                        <td>3321</td>
                                        <td>10/21/2013</td>
                                        <td>2:23 PM</td>
                                        <td>$245.12</td>
                                    </tr>
                                    <tr>
                                        <td>3320</td>
                                        <td>10/21/2013</td>
                                        <td>2:15 PM</td>
                                        <td>$5663.54</td>
                                    </tr>
                                    <tr>
                                        <td>3319</td>
                                        <td>10/21/2013</td>
                                        <td>2:13 PM</td>
                                        <td>$943.45</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.col-lg-4 (nested) -->
                    <div class="col-lg-8">
                        <div id="morris-bar-chart"></div>
                    </div>
                    <!-- /.col-lg-8 (nested) -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>
<!-- /.row -->
