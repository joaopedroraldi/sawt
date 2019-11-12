<?php
$chat = 1;
?>
<div class="chat-panel panel panel-default">
    <div class="panel-heading">
        
        <form id="chat-enviar" name="chat-enviar" role="form" class="form">
            <div class="input-group">
                <input name="chatMensagem" id="btn-input" type="text" class="form-control input-sm requerido" placeholder="Escreva sua mensagem aqui..." maxlength="255"/>
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary btn-sm" id="btn-chat">
                        <span class="glyphicon glyphicon-send fa-fw" aria-hidden="true"></span> Enviar
                    </button>
                </span>
            </div>
        </form>
    </div>
    <!-- /.panel-heading -->
    
    <div class="panel-body panel-body-chat">
        <ul class="chat">
        <h4 class="text-center">Carregando <img src="img/loading.gif" alt=""></h4>
        </ul>
    </div>
    <!-- /.panel-body -->
    
            <!--<li class="left clearfix">
                <span class="chat-img pull-left">
                    <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                </span>
                <div class="chat-body clearfix">
                    <div class="header">
                        <strong class="primary-font">Jack Sparrow</strong>
                        <small class="pull-right text-muted">
                            <i class="fa fa-calendar fa-fw"></i>19/08/15 <i class="fa fa-clock-o fa-fw"></i>14:46:10
                        </small>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                    </p>
                </div>
            </li>
            <li class="right clearfix">
                <span class="chat-img pull-right">
                    <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                </span>
                <div class="chat-body clearfix">
                    <div class="header">
                        <small class=" text-muted">
                            <i class="fa fa-calendar fa-fw"></i>19/08/15 <i class="fa fa-clock-o fa-fw"></i>14:46:10
                        </small>
                        <strong class="pull-right primary-font">Bhaumik Patel</strong>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                    </p>
                </div>
            </li>-->
    
    <div class="panel-footer">
        <i class="fa fa-comments fa-fw"></i>
        Chat
    </div>
    <!-- /.panel-footer -->
    
</div>
<!-- /.panel .chat-panel -->