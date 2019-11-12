body, html{padding: 0; margin: 0; width: 100%; height: 100%; background: url(img/bg.jpg) top center fixed;}
.transition{-webkit-transition: all 0.3s ease;
-moz-transition: all 0.3s ease;
-ms-transition: all 0.3s ease;
-o-transition: all 0.3s ease;
transition: all 0.3s ease;}

a:hover{text-decoration: none;}

.clear{width: 100%; clear: both;}
.clear10{width: 100%; height: 10px; clear: both;}
.clear20{width: 100%; height: 20px; clear: both;}
.clear30{width: 100%; height: 30px; clear: both;}
.clear40{width: 100%; height: 40px; clear: both;}
.clear60{width: 100%; height: 60px; clear: both;}

.height100{height: 100%; height: 100%;  overflow: hidden;}
#header{width: 100%; padding:12px 0; background: rgba(0,0,0,0.5); float: left;}
.top-usuario{font-size: 14px; color: #fff; display: inline-block; margin-right: 30px; margin-top: 8px !important;}
.top-usuario span{font-weight: bold;}
.top-link{font-size: 14px; color: #fff; display: inline-block; margin-right: 30px;}

.navegacao{width: 15%; float: left;}

.breadcrumb{margin: 20px 0;}

.body{width: 85%; float: left; background: #fff; min-height: 100%; padding: 20px;}

h1{color: #777; font-size: 20px; }

#content{overflow-x: hidden; width: 100%; height: 100%;}

.user-logado{width:100%; background: #222; padding: 10px 0 10px 10px; color: #777; border-bottom: solid 1px #333;}
.menu{padding: 0px; margin: 0; width: 100%; height: 100%;  list-style: none}
.menu > li{height: auto;   width: 100%; float: left;}
.menu > li:first-child{border-top:none; }
.menu > li:last-child{border-bottom:none; }
.menu > li > a{color: #ccc; margin-left: 10px; padding: 20px 0; float: left; width: 100%; height: 100%; cursor: pointer;}
.menu > li:hover{background: rgba(0,0,0,0.5); }
.menu > li:hover > a{margin-left: 20px;}
.menu > li > ul{display: none ;width: 100%; position: relative; float: left; padding-left: 10px; margin-top: -20px;}
.menu > li > ul > li > a{color: #ccc; margin-left: 10px; padding: 10px 0; float: left; width: 100%; height: 100%; cursor: pointer; font-size: 12px;}
.menu > li > ul > li > a:hover{color: #fff;}


#header .fa-bars{color: #ddd; border:solid 1px #777; padding: 8px; cursor: pointer; }
.navegacao-mobile{display: none;}

.checkEscolha{margin-right: 20px; float: left; background: #eee; padding: 10px;}

table td{border-top: solid 1px #eee !important;}

.formulario input{border-radius: 0; padding-top:25px; padding-bottom:25px; margin-bottom: 10px;}
.formulario select{border-radius: 0; height:52px; margin-bottom: 10px;}

.load{display: none; position: fixed; width: 100%; height: 100%; z-index: 9999999; background: rgba(0,0,0,0.6); text-align: center; top: 0; left: 0; color: #fff; font-size: 14px;}
.load span{position: fixed; top: 48%; width: 100%; text-align: center; float: left; left: 0; margin-top: -25px;}

.item-home{background: #fff; border-radius: 5px; border:solid 1px #fff; background: #eee; padding: 20px; text-align: center; color: #444;/*-webkit-border-radius: 10px 10px 10px 10px;border-radius: 10px 10px 10px 10px;*/}
.item-home i{font-size: 20px;}
.item-home h3{font-size: 16px; font-weight: bold;}
.item-home:hover{background: #ccc; border:solid 1px #ddd;}

.paginas-opcoes{float: left; width: auto; padding: 10px; border:solid 1px #eee; margin-right: 10px; margin-bottom: 10px;}
.paginas-opcoes:hover{border-color: #777; cursor: pointer;}

.table-registros{border-left: solid 2px #286090}
.titulo-registros{color:#286090}

.table-categorias{border-left: solid 2px #449D44}
.titulo-categorias{color:#449D44}

#paginas_ordem li:hover{background: #eee;}

.form-control{height: 50px;}
label{color: #00bdda}
@media (max-width: 1199px) {
	.navegacao{width: 20%;}
	.body{width: 80%;}
}

@media (max-width: 767px) {
	.body{width: 100%;}
	#header{text-align: center; padding-bottom: 0px;}
	.top-usuario{width: 100%; text-align: center; border-top: solid 1px #222; padding-top: 20px; margin-top: 20px;}
	.top-link{width: 100%; text-align: center;}
	.row{overflow-x:hidden; text-align: center;}

}
.form-group {
	position: relative;
}
.autocom {
	height: 20px;
	line-height: 20px;
}
.is-invalid {
    border-color: rgba(255, 0, 0, 1)!important;
    background: rgba(255, 0, 0, 0.06)!important;
}
.is-valid {
    border-color: green!important;
}
