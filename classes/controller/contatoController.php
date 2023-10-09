<?php
namespace controller;
use \views\mainView;

class contatoController
{
    public function index(){

        if(\Loja::logado() == false){
            \views\mainView::render('login.php');
        }else{
            \views\mainView::render('contato.php');
        }

	
	}
	
	
}

?>