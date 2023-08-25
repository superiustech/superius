<div class="tabela-pedidos">
    <div class="container table-container">
    <h3><i class="fa fa-shopping-cart" style="color: #00f;"></i>Carrinho:</h3>
    <table>
        <tr>
            <td>Nome do Produto:</td>
            <td>Quantidade:</td>
            <td>Valor:</td>
        </tr>
        <?php
            $total =0;  
            $itens = $_SESSION['carrinho']; 
            foreach($itens as $prod => $values){
            $id_produto = $prod;;
            $produto = Loja::retornaProdutoPorId($id_produto);
            $preco = $values * $produto['dVlPrecoDesconto'];
            $total += $preco;
        ?>

        <tr>
            <td><?php echo $produto['sNmProduto'];?></td>
            <td><?php echo $values?></td>
            <td>R$ <?php echo Loja::convertMoney($preco);?></td>
        </tr>
        
        <?php }?>

    </table>
</div>
</div>
<div class="finalizar-pedidos">
    <div class="container pagar table-container">
        <h2>Total: <?php echo Loja::convertMoney($total); ?></h2>
        <a href="" class="btn-pagamento">Pagar agora!</a>
        <div class="clear"></div>
    </div>
</div>

<script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/zebra_datepicker@latest/dist/zebra_datepicker.min.js"></script>