<?php

	class homeModel{
		

		public static function retornaProdutos(){

		$sql = MySql::conectar()->prepare("SELECT * FROM CONTROLE_ESTOQUE");
			$sql->execute();
			return $sql->fetchAll();
	}
	public static function retornaEstoqueCompleto(){
        
		$sql = MySql::conectar()->prepare("SELECT CE.*, CEI.*
        FROM CONTROLE_ESTOQUE CE
        INNER JOIN CONTROLE_ESTOQUE_IMAGEM CEI ON CEI.nCdProduto = CE.nCdProduto
        WHERE CEI.nCdImagem = 
			(SELECT MIN(nCdImagem)
            FROM CONTROLE_ESTOQUE_IMAGEM
            WHERE nCdProduto = CE.nCdProduto) AND CE.dQtItem > 0");
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