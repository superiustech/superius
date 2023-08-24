
<?php

class Loja
{

public static function logado(){
		return isset($_SESSION['login']) ? true : false;
	}
	public static function verificaLogin($nome, $senha) {
		$sql = MySql::conectar()->prepare(LojaSQL::verificaLogin());
		$sql->execute(array($nome, $senha));
		
		$resultados = $sql->fetchAll();  // Obtém os resultados da consulta
		
		if (count($resultados) == 1) {
			return true;  // Se há um resultado, retorna verdadeiro
		} else {
			return false;  // Se não há resultados, retorna falso
		}
	}
	public static function retornaProdutoPorId($id_produto) {
        $sql = MySql::conectar()->prepare(LojaSQL::retornaProdutoPorId());
        $sql->execute(array($id_produto));
        return $sql->fetch(); 
    }
	public static function convertMoney($valor){
		return number_format($valor, 2, ',', '.');
	}
	

}

?>