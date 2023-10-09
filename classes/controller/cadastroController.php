<?php
namespace controller;
use \views\mainView;

class cadastroController
{
    public function index(){

        if(\Loja::logado() == false){
            \views\mainView::render('cadastro.php');
        }else{
            \views\mainView::render('cadastro.php');
        }

	
	}
	
	
}

?>