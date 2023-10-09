<?php 
include('config.php'); 
Site::updateUsuarioOnline(); 
Site::contadorVisitas(); 
	
$homeController = new controller\homeController();
$finalizarController = new controller\finalizarController();
$visualizarController = new controller\visualizarController();
$landingPage = new controller\landingController();
$loginController = new controller\loginController();
$servicos = new controller\servicosController();
$cadastro = new controller\cadastroController();
$contato = new controller\contatoController();
$visualizarServico = new controller\visualizarServicoController();
//http://superiustech.com.br/

Router::rota('', function() use ($landingPage) {
	$landingPage->index();
});

Router::rota('home', function() use ($homeController) {
	$homeController->index();
});

Router::rota('cadastro', function() use ($cadastro) {
	$cadastro->index();
});
Router::rota('contato', function() use ($contato) {
	$contato->index();
});
Router::rota('finalizar', function() use ($finalizarController) {
	$finalizarController->index();
});

Router::rota('visualizar-produto', function() use ($visualizarController) {
	$visualizarController->index();
});

Router::rota('servicos', function() use ($servicos) {
	$servicos->index();
});

Router::rota('login', function() use ($loginController) {
	$loginController->index();
});
Router::rota('visualizar-servico', function() use ($visualizarServico) {
	$visualizarServico->index();
});




?>
