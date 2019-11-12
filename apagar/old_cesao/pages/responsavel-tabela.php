<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Responsáveis</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="float-left">Tabela</span>
                
                <a class="btn btn-primary float-right cadastrar" href="?menu=responsavel-tabela&submenu=responsavel-cadastrar" role="button"><i class="fa fa-pencil fa-fw"></i> Cadastrar novo responsável</a>
                
                <div class="dropdown float-right">
                  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <i class="fa fa-gears fa-fw"></i> Opções <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="?menu=responsavel-tabela&submenu=responsavel-alterar">Alterar dados</a></li>
                    <li><a href="?menu=empresa-tabela&submenu=empresa-cadastrar">Cadastrar empresa</a></li>
                  </ul>
                </div>
                <br clear="all">
            </div>
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Ativo</th>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>RG</th>
                                <th>Telefone</th>
                                <th>E-mail</th>
                                <th>Endereço</th>
                                <th>Cadastro</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $cliente_responsavel = mysqli_query($con , "select * from cliente_responsavel order by ativo desc");
                            while($cliente_responsavelRow = mysqli_fetch_object($cliente_responsavel)){
                                ?>
                                <tr class="<?php if( $cliente_responsavelRow->ativo == 0){ echo "warning"; }else{ echo "success"; } ?>" id="<?php echo $cliente_responsavelRow->Id; ?>">
                                    <td><?php if( $cliente_responsavelRow->ativo == 0){ echo "Inativo"; }else{ echo "Ativo"; } ?></td>
                                    <td><?php echo $cliente_responsavelRow->nome." ".$cliente_responsavelRow->sobrenome; ?></td>
                                    <td><?php echo $cliente_responsavelRow->cpf; ?></td>
                                    <td><?php echo $cliente_responsavelRow->rg; ?></td>
                                    <td><?php echo $cliente_responsavelRow->telefone; if($cliente_responsavelRow->telefone !== ''){ echo "<br>".$cliente_responsavelRow->telefone2; } ?></td>
                                    <td><?php echo $cliente_responsavelRow->email; ?></td>
                                    <td>
                                        <?php
                                        echo "CEP: ".$cliente_responsavelRow->cep;
                                        if($cliente_responsavelRow->numero !== ''){ echo "<br>Nº : ".$cliente_responsavelRow->numero; }
                                        if($cliente_responsavelRow->complemento !== ''){ echo "<br>Compl.:".$cliente_responsavelRow->complemento; } 
                                        ?>
                                    </td>
                                    <td><?php echo date("d/m/Y", strtotime($cliente_responsavelRow->dataCad)); ?></td>
                                    
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>