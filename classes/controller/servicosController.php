<?php
namespace controller;
use \views\mainView;

class servicosController
{
    public function index(){
		if(\Loja::logado() == false){
            \views\mainView::render('servicos.php');
        }else{
            \views\mainView::render('servicos.php');
        }
	    
	}
	
	
}

?>