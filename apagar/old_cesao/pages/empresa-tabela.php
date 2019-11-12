<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Empresas</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="float-left">Tabela</span>

                <a class="btn btn-primary float-right cadastrar" href="?menu=empresa-tabela&submenu=empresa-cadastrar" role="button"><i class="fa fa-pencil fa-fw"></i> Cadastrar nova empresa</a>

                <div class="dropdown float-right">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="fa fa-gears fa-fw"></i> Opções <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="?menu=empresa-tabela&submenu=empresa-alterar">Alterar dados</a></li>
                        <li><a href="?menu=empresa-tabela&submenu=exclusividade">Exclusividade</a></li>
                        <li><a href="?menu=clientes&submenu=servicos-relatorio">Serviços cadastrados</a></li>
                        <li><a href="?menu=clientes&submenu=contrato-tabela">Contratos</a></li>
                    </ul>
                </div>
                <br clear="all">
            </div>
            <div class="panel-body ">
                <!--table-overflow-->
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Ativo</th>
                                <th>Nome fantasia</th>
                                <th>Razão social</th>
                                <th>E-mail contato</th>
                                <th>E-mail cobrança</th>
                                <th>Telefone</th>
                                <th>CNPJ</th>
                                <th>Insc Est</th>
                                <th>Endereço</th>
                                <th>Segmento</th>
                                <th>Porte</th>
                                <th>Responsável</th>
                                <th>Exclusividade</th>
                                <th>Cadastro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cliente_empresa = mysqli_query($con , "select e.*, p.tipo, r.nome, r.sobrenome from cliente_empresa e, porte_da_empresa p, cliente_responsavel r where e.porte_da_empresa_Id = p.Id and e.cliente_responsavel_Id = r.Id order by e.ativo desc");
                            while($cliente_empresaRow = mysqli_fetch_object($cliente_empresa)){
                                ?>
                                <tr class="<?php if( $cliente_empresaRow->ativo == 0){ echo " warning "; }else{ echo "success "; } ?>" id="<?php echo $cliente_empresaRow->Id; ?>">
                                    <td>
                                        <?php if( $cliente_empresaRow->ativo == 0){ echo "Inativo"; }else{ echo "Ativo"; } ?>
                                    </td>
                                    <td>
                                        <?php echo $cliente_empresaRow->nomeFantasia; ?>
                                    </td>
                                    <td>
                                        <?php echo $cliente_empresaRow->razaoSocial; ?>
                                    </td>
                                    <td>
                                        <?php echo $cliente_empresaRow->emailContato; ?>
                                    </td>
                                    <td>
                                        <?php echo $cliente_empresaRow->emailCobranca; ?>
                                    </td>
                                    <td>
                                        <?php echo $cliente_empresaRow->telefone; ?>
                                    </td>
                                    <td>
                                        <?php echo $cliente_empresaRow->cnpj; ?>
                                    </td>
                                    <td>
                                        <?php echo $cliente_empresaRow->inscricaoEstadual; ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo "CEP: ".$cliente_empresaRow->cep;
                                        if($cliente_empresaRow->numero !== ''){ echo "<br>Nº : ".$cliente_empresaRow->numero; }
                                        if($cliente_empresaRow->complemento !== ''){ echo "<br>Compl.:".$cliente_empresaRow->complemento; } 
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $cliente_empresaRow->segmento; ?>
                                    </td>
                                    <td>
                                        <?php echo $cliente_empresaRow->tipo; ?>
                                    </td>
                                    <td>
                                        <?php echo $cliente_empresaRow->nome." ".$cliente_empresaRow->sobrenome; ?>
                                    </td>
                                    <td>
                                        <?php
                                        $cliente_empresa_Id = $cliente_empresaRow->Id;
                                        $exclusividade = mysqli_query($con , "select * from exclusividade where cliente_empresa_Id = '$cliente_empresa_Id' and ativo = 1");
                                        $exclusividadeNumRows = mysqli_num_rows($exclusividade);
                                        $exclusividadeRow = mysqli_fetch_object($exclusividade);
                                        ?>
                                        <?php if($exclusividadeNumRows == 1){ echo $exclusividadeRow->prazoFidelidade;}else{ echo "Não"; } ?>
                                    </td>
                                    <td>
                                        <?php echo date("d/m/Y", strtotime($cliente_empresaRow->dataCad)); ?>
                                    </td>
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
