<?php 
include('config.php'); 
Site::updateUsuarioOnline(); 
Site::contadorVisitas(); 
	
$homeController = new controller\homeController();
$finalizarController = new controller\finalizarController();
$visualizarController = new controller\visualizarController();
$landingPage = new controller\landingController();

Router::rota('', function() use ($landingPage) {
	$landingPage->index();
});

Router::rota('home', function() use ($homeController) {
	$homeController->index();
});


Router::rota('finalizar', function() use ($finalizarController) {
	$finalizarController->index();
});

Router::rota('visualizar-produto', function() use ($visualizarController) {
	$visualizarController->index();
});




?>
