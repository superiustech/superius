<?php
namespace controller;
use \views\mainView;

class loginController
{
    public function index(){

        if(\Loja::logado() == false){
            \views\mainView::render('login.php');
        }else{
            \views\mainView::render('finalizar.php');
        }

	
	}
	
	
}

?>