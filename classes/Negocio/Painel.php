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
	public static function redirecionarInicio(){
		header('Location: '.INCLUDE_PATH);
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
		}else if($tipo == 'atencao')
			echo '<div class="box-alert atencao"><i class="fa fa-warning"></i> '.$mensagem.'</div>';
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
	public static function lastIdProduto($nome,$quantidade, $descricao,$largura, $altura, $peso, $comprimento, $preco, $precoDescnto, $desconto ,$descricaoDetalhada){
		$sql = MySql::conectar()->prepare(PainelSQL::cadastrarProduto());
		return $sql->execute(array($nome,$quantidade, $descricao,$largura, $altura, $peso, $comprimento, $preco, $precoDescnto, $desconto ,$descricaoDetalhada));

	}
	public static function cadastrarServico($nome,$descricao,$descricaoDetalhada, $preco, $categoria,$bFlAtivo){
		$sql = MySql::conectar()->prepare(PainelSQL::cadastrarServico());
		return $sql->execute(array($nome,$descricao,$descricaoDetalhada, $preco, $categoria,$bFlAtivo));

	}
	public static function insereImagem($lastId, $value)
	{
		$sql = MySql::conectar()->prepare(PainelSQL::insereImagem());
		$sql->execute(array($lastId, $value));
	}
	public static function insereImagemServico($lastId, $value)
	{
		$sql = MySql::conectar()->prepare(PainelSQL::insereImagemServico());
		$sql->execute(array($lastId, $value));
	}
	public static function insereCliente($nome,$apelido,$email,$senha,$tipo,$documento,$imagem){
		$sql = MySql::conectar()->prepare(PainelSQL::insereCliente());
		$sql->execute(array($nome,$apelido,$email,$senha,$tipo,$documento,$imagem));
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
	public static function carregarProdutosComFiltro($query){
		$sql = MySql::conectar()->prepare(PainelSQL::carregarProdutosComFiltro($query));
		$sql->execute();
		return $sql->fetchAll();
	}
	public static function carregarServicoComFiltroDesativado($query){
		$sql = MySql::conectar()->prepare(PainelSQL::carregarServicoComFiltroDesativado($query));
		$sql->execute();
		return $sql->fetchAll();
	}
	public static function carregarServicoComFiltro($query){
		$sql = MySql::conectar()->prepare(PainelSQL::carregarServicoComFiltro($query));
		$sql->execute();
		return $sql->fetchAll();
	}
	public static function carregarProdutosFalta(){
		$sql = MySql::conectar()->prepare(PainelSQL::carregarProdutosFalta());
		$sql->execute();
		return $sql->fetchAll();
		
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
	public static function retornaTodoFinanceiro($bFlStatus, $query){
		$sql = MySql::conectar()->prepare(PainelSQL::retornaTodoFinanceiro($query));
		$sql->execute(array($bFlStatus));
		return $sql->fetchAll();	
	}
		public static function retornaTodoFinanceiroSemStatus($query){
			$sql = MySql::conectar()->prepare(PainelSQL::retornaTodoFinanceiroSemStatus($query));
			$sql->execute();
			return $sql->fetchAll();	
			}
			public static function retornaAgendaServico($query , $bFlStatus){
				$sql = MySql::conectar()->prepare(PainelSQL::retornaAgendaServico($query));
				$sql->execute(array($bFlStatus));
				return $sql->fetchAll();	
				}
				public static function retornaAgendaServicoTMP($query , $bFlStatus , $prestador){
					$sql = MySql::conectar()->prepare(PainelSQL::retornaAgendaServicoTMP($query));
					$sql->execute(array($bFlStatus , $prestador));
					return $sql->fetchAll();	
					}		
				public static function retornaAgendaServicoId($query , $bFlStatus, $usuario_id){
					$sql = MySql::conectar()->prepare(PainelSQL::retornaAgendaServicoId($query));
					$sql->execute(array($bFlStatus, $usuario_id));
					return $sql->fetchAll();	
					}	
				public static function retornaAgendaServicoPorId($agenda_id){
					$sql = MySql::conectar()->prepare(PainelSQL::retornaAgendaServicoPorId());
					$sql->execute(array($agenda_id));
					return $sql->fetch();	
					}
	public static function retornaProdutoComFiltro($query){
		$sql = MySql::conectar()->prepare(PainelSQL::retornaProdutoComFiltro($query));
		$sql->execute();
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
	public static function verificaEstoque(){
		$sql = MySql::conectar()->prepare(PainelSQL::verificaEstoque());
		$sql->execute();
		return $sql;
	}
	public static function verificaServicos(){
		$sql = MySql::conectar()->prepare(PainelSQL::verificaServicos());
		$sql->execute();
		return $sql;
	}
	public static function deletarProduto($produto_id){
		$sql = MySQl::conectar()->prepare(PainelSQL::deletarProduto());
		if($sql->execute(array($produto_id)) == true)
			return true;
		else	
			return false;
	}
	
	public static function deletarServico($servico_id){
		$sql = MySQl::conectar()->prepare(PainelSQL::deletarServico());
		if($sql->execute(array($servico_id)) == true)
			return true;
		else	
			return false;
	}
	public static function deletarImagemServico($servico_id){
		$sql = MySQl::conectar()->prepare(PainelSQL::deletarImagemServico());
		if($sql->execute(array($servico_id)) == true)
			return true;
		else	
			return false;
	}
	public static function deletarImagemProduto($produto_id){
		$sql = MySQl::conectar()->prepare(PainelSQL::deletarImagemProduto());
		if($sql->execute(array($produto_id)) == true)
			return true;
		else	
			return false;
	}
	public static function deletarImagemPorId($idImagem){
		$sql = MySQl::conectar()->prepare(PainelSQL::deletarImagemPorId());
		if($sql->execute(array($idImagem)) == true)
			return true;
		else	
			return false;
	}
	public static function deletarImagemServicoPorId($idImagem){
		$sql = MySQl::conectar()->prepare(PainelSQL::deletarImagemServicoPorId());
		if($sql->execute(array($idImagem)) == true)
			return true;
		else	
			return false;
	}
	public static function retornaImagem($produto_id){
		$sql = MySql::conectar()->prepare(PainelSQL::retornaImagem());
		if ($sql->execute(array($produto_id)) == true)
			return $sql->fetchAll();
	}
	public static function retornaImagemServico($produto_id){
		$sql = MySql::conectar()->prepare(PainelSQL::retornaImagemServico());
		if ($sql->execute(array($produto_id)) == true)
			return $sql->fetchAll();
	}
	public static function retornaImagemPorId($id_imagem){
		$sql = MySql::conectar()->prepare(PainelSQL::retornaImagemPorId());
		if ($sql->execute(array($id_imagem)) == true)
			return $sql->fetchAll();
	}
	public static function retornaImagemServicoPorId($id_imagem){
		$sql = MySql::conectar()->prepare(PainelSQL::retornaImagemServicoPorId());
		if ($sql->execute(array($id_imagem)) == true)
			return $sql->fetchAll();
	}
	public static function retornaProdutoPorId($id_produto) {
        $sql = MySql::conectar()->prepare(PainelSQL::retornaProdutoPorId());
        $sql->execute(array($id_produto));
        return $sql->fetch(); 
    }
	public static function retornaServicoPorId($id_produto) {
        $sql = MySql::conectar()->prepare(PainelSQL::retornaServicoPorId());
        $sql->execute(array($id_produto));
        return $sql->fetch(); 
    }
	public static function atualizaProdutoPorId($nome, $descricao , $largura , $altura , $comprimento ,$peso, $quantidade ,$preco,$descricaoDetalhada , $id) {
		$sql = MySql::conectar()->prepare(PainelSQL::atualizaProdutoPorId());
		if ($sql->execute(array($nome, $descricao , $largura , $altura , $comprimento , $peso,$quantidade,$preco,$descricaoDetalhada ,$id)) == true)
			return true;
		else
			return false;
	}
	public static function atualizaServicoPorId($nome,$descricao,$descricaoDetalhada, $preco, $categoria, $bFlAtivo, $id) {
		$sql = MySql::conectar()->prepare(PainelSQL::atualizaServicoPorId());
		if ($sql->execute(array($nome,$descricao,$descricaoDetalhada, $preco, $categoria, $bFlAtivo, $id)) == true)
			return true;
		else
			return false;
	}
	public static function formataMoedaBD($valor) {
		$valor = str_replace('.','',$valor);
		$valor = str_replace(',','.',$valor);
		return $valor;
	}
	public static function insereDesconto($precoDesconto, $desconto, $id_produto){
		$sql = MySql::conectar()->prepare(PainelSQL::insereDesconto());
		if($sql->execute(array($precoDesconto, $desconto, $id_produto)) == true)
			return true;
		else
			return false;
	}
	public static function retornaClientePorId($id){
		$sql = MySql::conectar()->prepare(PainelSQL::retornaClientePorId());
		$sql->execute($id);
		return $sql->fetch();
	}
	public static function enviarMensagem($id, $mensagem) {
		$sql = MySql::conectar()->prepare(PainelSQL::enviarMensagem());
		if ($sql->execute(array($id, $mensagem))) {
			return true; // Sucesso na inserção
		} else {
			return false; // Falha na inserção
		}
	}
	public static function retornaMensagem() {
		$sql = MySql::conectar()->prepare(PainelSQL::retornaMensagem());
		$sql->execute(array());
		return $sql->fetchAll();
	}
	public static function aceitaServico($servico_id, $agenda_id,$usuario_id){
		$sql = MySql::conectar()->prepare(PainelSQL::aceitaServico());
		if ($sql->execute(array($servico_id, $agenda_id, $usuario_id)) == true){
			return true;
		}else{
			return false;
		}
	}
	public static function verificaAgenda($agenda_id){
		$sql = MySql::conectar()->prepare(PainelSQL::verificaAgenda());
		$sql->execute(array($agenda_id));
		if ($sql->rowCount() >= 1)
			return true;
		else
			return false;
	}
	public static function atualizaStatusServicoAgenda($status, $prestador , $agenda_id ){
		$sql = MySql::conectar()->prepare(PainelSQL::atualizaStatusServicoAgenda());
		if($sql->execute(array($status, $prestador ,$agenda_id)) == true){
			return true;
		}else{
			return false;
		}
		
	}	
	public static function atualizaStatusServicoRealizar($status, $agenda_id ){
		$sql = MySql::conectar()->prepare(PainelSQL::atualizaStatusServicoRealizar());
		if($sql->execute(array($status, $agenda_id)) == true){
			return true;
		}else{
			return false;
		}
		
	}
	public static function deletaAgendarServico($agenda_id){
		$sql = MySql::conectar()->prepare(PainelSQL::deletaAgendarServico());
		if($sql->execute(array($agenda_id)) == true){
			return true;
		}else{
			return false;
		}
		
	}
}


?>