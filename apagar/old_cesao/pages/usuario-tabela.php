<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Usuários</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="float-left">Tabela</span>
                
                <a class="btn btn-primary float-right cadastrar" href="?menu=usuario-tabela&submenu=usuario-cadastrar" role="button"><i class="fa fa-pencil fa-fw"></i> Cadastrar novo usuário</a>
                
                <div class="dropdown float-right">
                  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <i class="fa fa-gears fa-fw"></i> Opções <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="?menu=usuario-tabela&submenu=usuario-alterar">Alterar dados</a></li>
                    <li><a href="#">Permições</a></li>
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
                                <th>Sexo</th>
                                <th>Telefone</th>
                                <th>E-mail</th>
                                <th>CPF</th>
                                <th>RG</th>
                                <th>Cadastro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $usuarios = mysqli_query($con , "select * from usuario order by ativo desc, nome asc");
                            while($usuariosRow = mysqli_fetch_object($usuarios)){
                                ?>
                                <tr class="<?php if( $usuariosRow->ativo == 0){ echo "warning"; }else{ echo "success"; } ?>"  id="<?php echo $usuariosRow->Id; ?>">
                                    <td><?php if( $usuariosRow->ativo == 0){ echo "Inativo"; }else{ echo "Ativo"; } ?></td>
                                    <td><?php echo $usuariosRow->nome." ".$usuariosRow->sobrenome; ?></td>
                                    <td><?php if( $usuariosRow->sexo == 0){ echo "Feminino"; }else{ echo "Masculino"; } ?></td>
                                    <td><?php echo $usuariosRow->telefone; ?></td>
                                    <td><?php echo $usuariosRow->email; ?></td>
                                    <td><?php echo $usuariosRow->cpf; ?></td>
                                    <td><?php echo $usuariosRow->rg; ?></td>
                                    <td><?php echo date("d/m/Y", strtotime($usuariosRow->dataCad)); ?></td>
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