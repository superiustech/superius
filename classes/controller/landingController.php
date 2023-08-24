<?php
namespace controller;
use \views\mainView;

class landingController
{
    public function index(){
	    \views\mainView::render('landing-page.php');
	}
	
	
}

?>