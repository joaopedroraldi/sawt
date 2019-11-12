<?php 
	session_start();
	if(!isset($_SESSION['carrinho'])){
       $_SESSION['carrinho'] = array();
    }
     	
    if(isset($_POST['acao'])){

      //ADICIONAR CARRINHO
      if($_POST['acao'] == 'add'){
          $id = intval($_POST['id']);
          if(!isset($_SESSION['carrinho'][$id])){
             $_SESSION['carrinho'][$id] = $_POST['qtd'];
             echo "Novo produto adicionado ao carrinho";
          }else{
             $_SESSION['carrinho'][$id] += $_POST['qtd'];
             echo "Quantidade atualizada";
          }
      }

      //ALTERAR QUANTIDADE
      if($_POST['acao'] == 'up'){
         $id = intval($_POST['id']);
         if(isset($_SESSION['carrinho'][$id])){
            echo $_POST['qtd'];
            $_SESSION['carrinho'][$id] = $_POST['qtd'];
         }

      }

      //REMOVER CARRINHO
      if($_POST['acao'] == 'del'){
        $id = intval($_POST['id']);
        if(isset($_SESSION['carrinho'][$id])){
           unset($_SESSION['carrinho'][$id]);
           echo "Produto removido do carrinho";
	      }
	    }
	}
?>

