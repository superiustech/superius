<?php
namespace controller;
use \views\mainView;

class visualizarServicoController
{
    public function index(){

		if(\Loja::logado() == false){
			\views\mainView::render('visualizar-servico.php');
		}else{
			\views\mainView::render('visualizar-servico.php');
		}
	}
}