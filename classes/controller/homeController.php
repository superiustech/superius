<?php
namespace controller;
use \views\mainView;

class homeController
{
    public function index(){
		
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
		if(\Loja::logado() == false){
            \views\mainView::render('home.php');
        }else{
            \views\mainView::render('home.php');
        }
		
	}
	
	
}

?>