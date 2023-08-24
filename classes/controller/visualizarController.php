<?php
namespace controller;
use \views\mainView;

class visualizarController
{
    public function index(){
	    \views\mainView::render('visualizar-produto.php');
	}
	
	
}

?>