<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

class Painel
{
	public static function logado(){
		return isset($_SESSION['login']) ? true : false;
	}

	public static function logout(){
		session_destroy();
	}
	public static function redirecionar(){
		header('Location: '.INCLUDE_PATH_PAINEL);
	}
	public static function pegaCargo($nome) {
		$sql = MySql::conectar()->prepare(PainelSQL::pegaCargo());
		$sql->execute(array($nome));
		$cargo = $sql->fetch();
		return $cargo['sNmCargo'];
	}
	public static function pegaAvatar($nome){
		$sql = MySql::conectar()->prepare(PainelSQL::pegaAvatar());
		$sql->execute(array($nome));
		$imagem = $sql->fetch();
		return $imagem['sDsImagem'];
	}

	public static function carregarPagina(){
		if(isset($_GET['url'])){
			$url = explode('/',$_GET['url']);
			if(file_exists('pages/'.$url[0].'.php')){
				include('pages/'.$url[0].'.php');
			}else{
				// pagina nao existe!
				header('Location: '.INCLUDE_PATH_PAINEL);
			}
		}else{
			include('pages/home.php');
		}
	}

	public static function listarUsuariosOnline(){
		self::limparUsuariosOnline();
		$sql = MySql::conectar()->prepare(PainelSQL::listarUsuariosOnline());
		$sql->execute();
		return $sql->fetchAll();
	}
	
	public static function limparUsuariosOnline(){
		$date = date('Y-m-d H:i:s');
		$sql = MySql::conectar()->prepare(PainelSQL::limparUsuariosOnline());
		$sql->execute(['date' => $date]);
	}
	public static function mostrarVisitas(){
		$sql = MySql::conectar()->prepare(PainelSQL::mostrarVisitas());
		$sql->execute();
		return $sql->fetchAll();
	}
	public static function mostrarVisitasHoje(){
		$sql = MySql::conectar()->prepare(PainelSQL::mostrarVisitasHoje());
		$sql->execute(array(DATA_ATUAL));
		return $sql->fetchAll();
	}
	public static function atualizarUsuario($senha,$nome){
		$sql = MySql::conectar()->prepare(PainelSQL::atualizarUsuario());
		if($sql->execute(array($senha, $nome)))
			return true;
		else 
			return false;
	}
	public static function verificarRetorno($nome,$senha){
		$sql = MySql::conectar()->prepare(PainelSQL::atualizarUsuario());
		$sql->execute(array($senha, $nome));
		$sql->fetchAll();
		if ($sql->rowCount() == 1)
			return true;
		else
			return false;
	}
	public static function cadastrarUsuario($nome, $senha, $imagem, $cargo, $nomePessoal){
		$sql = MySql::conectar()->prepare(PainelSQL::cadastrarUsuario());
		$sql->execute(array($nome, $senha, $imagem, $cargo, $nomePessoal));
	}
	public static function verificarUsuario($nome){
		$sql = MySql::conectar()->prepare(PainelSQL::verificarUsuario());
		$sql->execute(array($nome));
		$sql->fetchAll();
		if ($sql->rowCount() >= 1)
			return true;
		else
			return false;
	}
	public static function verificarCliente($nome){
		$sql = MySql::conectar()->prepare(PainelSQL::verificarCliente());
		$sql->execute(array($nome));
		$sql->fetchAll();
		if ($sql->rowCount() >= 1)
			return true;
		else
			return false;
	}
	public static function imagemValida($imagem){
		if($imagem['type'] == 'image/jpeg' ||
			$imagem['type'] == 'image/jpg' ||
			$imagem['type'] == 'image/png'){
	
			$tamanho = intval($imagem['size'] / 1024);
			if($tamanho < 900)
				return true;
			else
				return false;
		} else {
			return false;
		}
	}
	
	
	public static function alert($tipo,$mensagem){
		if($tipo == 'sucesso'){
			echo '<div class="box-alert sucesso"><i class="fa fa-check"></i> '.$mensagem.'</div>';
		}else if($tipo == 'erro'){
			echo '<div class="box-alert erro"><i class="fa fa-times"></i> '.$mensagem.'</div>';
		}
	}
	
	public static function uploadFile($file){
		$formatoArquivo = explode('.',$file['name']);
		$imagemNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];
		if(move_uploaded_file($file['tmp_name'],BASE_DIR_PAINEL.'/uploads/'.$imagemNome))
			return $imagemNome;
		else
			return false;
	}

	public static function deleteFile($file){
		@unlink('uploads/'.$file);
	}
	public static function cadastrarProduto($nome,$quantidade, $descricao,$largura, $altura, $peso, $comprimento){
		$sql = MySql::conectar()->prepare(PainelSQL::cadastrarProduto());
		$sql->execute(array($nome,$quantidade, $descricao, $largura, $altura, $peso, $comprimento));

	}
	public static function lastIdProduto($nome,$quantidade, $descricao,$largura, $altura, $peso, $comprimento){
		$sql = MySql::conectar()->prepare(PainelSQL::cadastrarProduto());
		return $sql->execute(array($nome,$quantidade, $descricao, $largura, $altura, $peso, $comprimento));

	}
	public static function insereImagem($lastId, $value)
	{
		$sql = MySql::conectar()->prepare(PainelSQL::insereImagem());
		$sql->execute(array($lastId, $value));
	}
	public static function insereCliente($nome,$apelido,$email,$senha,$tipo,$documento){
		$sql = MySql::conectar()->prepare(PainelSQL::insereCliente());
		$sql->execute(array($nome,$apelido,$email,$senha,$tipo,$documento));
	}
	public static function atualizarCliente($nome,$apelido,$email,$senha,$tipo,$documento,$imagem,$id){
		$sql = MySql::conectar()->prepare(PainelSQL::atualizarCliente());
		if($sql->execute(array($nome,$apelido,$email,$senha,$tipo,$documento,$imagem,$id)))
			return true;
		else 
			return false;
	
	}
	public static function loadJs($files,$page){
		$url = explode('/',@ $_GET['url'])[0];
		if($page == $url){
			foreach( $files as $key => $value){
				echo '<script src="' . INCLUDE_PATH_PAINEL . 'js/' . $value . '"></script>';
			}
		}
	}
	public static function carregarClientesComFiltro($query){
		$sql = MySql::conectar()->prepare(PainelSQL::carregarClientesComFiltro($query));
		$sql->execute();
		return $sql->fetchAll();
		return $sql->rowCount();
	}
	public static function carregarUsuarios(){
		$sql = MySql::conectar()->prepare(PainelSQL::carregarUsuarios());
		$sql->execute();
		return $sql->fetchAll();
	}
	public static function inserirPagamento($cliente_id,$valor,$vencimento,$nome,$status){
		$sql = MySql::conectar()->prepare(PainelSQL::inserirPagamento());
		if($sql->execute(array($cliente_id,$valor,$vencimento,$nome,$status)) == true)
			return true;
		else
			return false;
		
	}
	public static function retornaFinanceiroCliente($cliente_id, $bFlStatus){
	$sql = MySql::conectar()->prepare(PainelSQL::retornaFinanceiroCliente());
	$sql->execute(array($cliente_id, $bFlStatus));
	return $sql->fetchAll();	
	}
	public static function retornaTodoFinanceiro($bFlStatus){
		$sql = MySql::conectar()->prepare(PainelSQL::retornaTodoFinanceiro());
		$sql->execute(array($bFlStatus));
		return $sql->fetchAll();	
		}
	public static function atualizarStatusFinanceiro($nCdControleFinanceiro){
		$sql = MySql::conectar()->prepare(PainelSQL::atualizarStatusFinanceiro());
		if($sql->execute(array($nCdControleFinanceiro)) == true)
			return true;
		else
			return false;
	}
	public static function retornaEstoqueCompleto (){
		$sql = MySql::conectar()->prepare(PainelSQL::retornaEstoqueCompleto());
		$sql->execute();
		return $sql->fetchAll();
	}
	public static function atualizarQuantidadeProduto($quantidade,$produto_id){
		$sql = MySql::conectar()->prepare(PainelSQL::atualizarQuantidadeProduto());
		if($sql->execute(array($quantidade,$produto_id)) == true)
			return true;
		else
			return false;
	}
	
}


?>