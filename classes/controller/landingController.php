<?php
namespace controller;
use \views\mainView;

class landingController
{
    public function index(){
		if(\Loja::logado() == false){
            \views\mainView::render('landing-page.php');
        }else{
            \views\mainView::render('landing-page.php');
        }
	    
	}
	
	
}

?>