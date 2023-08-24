<?php

	class homeModel{
		

		public static function retornaProdutos(){

	    	$sql = MySql::conectar()->prepare("SELECT * FROM CONTROLE_ESTOQUE");
			$sql->execute();
			return $sql->fetchAll();
	}

	public static function retornaTotalCarrinho(){

		if(isset($_SESSION['carrinho'])){
		$amount = 0;
		foreach($_SESSION['carrinho'] as $value){
			$amount+=$value;
		}
		return $amount;
		}else{return 0;}
	}
}
?>