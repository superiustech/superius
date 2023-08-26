
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
	public static function retornaUmaImagem($produto_id){
		$sql = MySql::conectar()->prepare(LojaSQL::retornaUmaImagem());
		if ($sql->execute(array($produto_id)) == true)
			return $sql->fetch();
	}
	public static function calcularFrete($cepOrigem,$cepDestino,$peso,$altura,$largura,$comprimento,$valor,$tipo_frete){
		$url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";

		$url .= "nCdEmpresa=";
		$url .= "&nDsSenha=";
		$url .= "&sCepOrigem=" . $cepOrigem;
		$url .= "&sCepDestino=" . $cepDestino;
		$url .= "&nVlPeso=" . $peso;
		$url .= "&nVlLargura=" . $largura;
		$url .= "&nVlAltura=" . $altura;
		$url .= "&nCdFormato=1";
		$url .= "&nVlComprimento=" . $comprimento;
		$url .= "&sCdMaoPropria=n";
		$url .= "&nVlValorDeclarado=" . $valor;
		$url .= "&sCdAvisoRecebimento=n";
		$url .= "&nCdServico=" . $tipo_frete;
		$url .= "&nVlDiametro=0";
		$url .= "&StrRetorno=xml";

		$xml = simplexml_load_file($url);
		return $xml;

	}

}

?>