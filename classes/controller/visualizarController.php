<?php
namespace controller;
use \views\mainView;

class visualizarController
{
    public function index(){

		if(\Loja::logado() == false){
			\views\mainView::render('visualizar-produto.php');
		}else{
			\views\mainView::render('visualizar-produto.php');
		}
	}
	public function adicionarProduto(){
		
		if(isset($_GET['adicionar-carrinho'])){
			$id_produto = (int)$_GET['adicionar-carrinho'];
			if(!isset($_SESSION['carrinho'])){
				$_SESSION['carrinho'] = array();
			}
			if(isset($_SESSION['carrinho'][$id_produto])){
				$_SESSION['carrinho'][$id_produto]++;
			}else{
				$_SESSION['carrinho'][$id_produto] = 1;
			}
			
		}
	}
	
	
	
}

?>