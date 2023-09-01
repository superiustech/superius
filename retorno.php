<?php
//TO DO FICAR DE OLHO PRA VER SE NAO AFETA.
include('config.php');
if(isset($_POST['notificationType']) && $_POST['notificationType'] == 'transaction'){
    //Todo resto do código iremos inserir aqui.
    $token = 'A9D068C4D56A478AA8B4B0C94BC9B145';
	$email = 'nogueiralucas.pessoal@gmail.com';

    $url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/notifications/' . $_POST['notificationCode'] . '?email=' . $email . '&token=' . $token;
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $transaction= curl_exec($curl);
    curl_close($curl);

    if($transaction == 'Unauthorized'){
       die('Um erro ocorreu!');
    }
    $transaction = simplexml_load_string($transaction);
    $transactionStatus = $transaction->status;
    if($transactionStatus == 1){
        $transactionStatus = 'Aguardando pagamento';
    } elseif($transactionStatus == 2){
        $transactionStatus = 'Em análise';
    } elseif($transactionStatus == 3){ // :)
        $transactionStatus = 'Paga';
        $reference_id = $transaction->reference; 
        if(\MySql::conectar()->exec("UPDATE `PEDIDOS` SET sDsStatus = 'pago' WHERE nCdReference = '$reference_id'") == false)
            echo 'Erro no processamento';
    } elseif($transactionStatus == 4){ // :D
        $transactionStatus = 'Disponível';
    } elseif($transactionStatus == 5){
        $transactionStatus = 'Em disputa';
    } elseif($transactionStatus == 6){
        $transactionStatus = 'Devolvida';
    } elseif($transactionStatus == 7){
        $transactionStatus = 'Cancelada';
    }
}



?>