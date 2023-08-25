<?php
	include('../arquivos/includeConstants.php');
	$data['token'] = 'A9D068C4D56A478AA8B4B0C94BC9B145';
	$data['email'] = 'nogueiralucas.pessoal@gmail.com';
	$data['currency'] = 'BRL';
	$data['notificationURL'] = 'http://localhost/loja_virtual/retorno.php';
	$data['reference'] = uniqid();
	$index = 1;
	$itemsCarrinho = $_SESSION['carrinho'];

	$index = 1;
	$total =0;  
	$itens = $_SESSION['carrinho']; 
	foreach($itens as $prod => $values){
	$id_produto = $prod;;
	$produto = Loja::retornaProdutoPorId($id_produto);
	$preco = $produto['dVlPreco'];
	$data["itemId$index"] = $index;
	$data["itemQuantity$index"] = $values;
	$data["itemDescription$index"] = $produto['sNmProduto'];
	$data["itemAmount$index"] = number_format($produto['dVlPrecoDesconto'], 2, '.', '');
	//$total += $preco;

	$index++;
	}


	$url = "https://ws.sandbox.pagseguro.uol.com.br/v2/checkout";
	$data = http_build_query($data);

	$curl = curl_init($url);
	curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
	curl_setopt($curl,CURLOPT_POST,true);
	curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
	curl_setopt($curl,CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
	$xml = curl_exec($curl);


	curl_close($curl);
	$xml = simplexml_load_string($xml);

	echo $xml->code;

	$_SESSION['carrinho'] = array();
?>