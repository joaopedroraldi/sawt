<style type="text/css">
	#menu-mensagens .active{background: #337ab7; color: #fff;}
</style>
<ul id="menu-mensagens" class="nav nav-pills">
	  <li role="presentation"><a href="?page=contatos" <?php if($_GET['page'] == "contatos"){echo "class='active'";} ?>><i class="fa fa-envelope"></i> Contatos</a></li>
	  <li role="presentation"><a href="?page=curriculos" <?php if($_GET['page'] == "curriculos"){echo "class='active'";} ?>><i class="fa fa-user"></i> Curriculos</a></li>
</ul>
<div class="clear10"></div>