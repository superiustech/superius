<?php 


class LojaSQL
{
    public static function verificaLogin(){
        return 'SELECT * FROM CLIENTES WHERE sNmCliente = ? AND sDsSenha = ?';
    }
    public static function retornaEstoqueCompleto (){
		$sql = MySql::conectar()->prepare(PainelSQL::retornaEstoqueCompleto());
		$sql->execute();
		return $sql->fetchAll();
	}
    public static function retornaProdutoPorId(){
        return "SELECT * FROM CONTROLE_ESTOQUE WHERE nCdProduto = ?";
    }
}

?>
