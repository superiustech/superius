<div class="tabela-pedidos">
    <div class="container table-container">
    <h3><i class="fa fa-shopping-cart"><span><?php echo homeModel::retornaTotalCarrinho() ?></span></i> Carrinho</h3>
    <table>
        <tr>
            <td>Produto</td>
            <td>Descrição</td>
            <td>Preço unitário</td>
            <td>Quantidade</td>
            <td>SubTotal</td>
            <td>Excluir</td>
        </tr>
        <?php
            $total =0;  
            $itens = $_SESSION['carrinho']; 
            foreach($itens as $prod => $values){
            $id_produto = $prod;;
            $produto = Loja::retornaProdutoPorId($id_produto);
            $imagem = Loja::retornaUmaImagem($id_produto);
            $comprimento = $produto['sDsComprimento']; 
            $preco = $values * $produto['dVlPrecoDesconto'];
            $total += $preco;
        ?>

        <tr>
            <td><img src="<?php echo INCLUDE_PATH_PAINEL .'uploads/'.  $imagem['sDsImagem'];?>" alt=""></td>
            <td class="descricao"><a href="<?php echo INCLUDE_PATH ?>visualizar-produto?id=<?php echo $produto['nCdProduto'];?>"><?php echo $produto['sDsProduto'];?></a></td>
            <td>
                <div class="boxes-tipo desconto"><h5>R$ <?php echo Loja::convertMoney($produto['dVlPreco']);?></h5></div>
                <div class="boxes-tipo oficial"><h5>R$ <?php echo Loja::convertMoney($produto['dVlPrecoDesconto']);?></h5></div>
            </td>
            <td><?php echo $values?></td>
            <td><div class="boxes-tipo oficial"><h5>R$ <?php echo Loja::convertMoney($preco);?></h5></div></td>
            <td>X</td>
            
        </tr>
        
        <?php }?>

    </table>
</div>
</div>

<div class="calcular-frete">
<div class="container frete table-container">
        <form id="formDestino" action="">
                <label>Calcule o frete:</label>
                <input type="text" name="sCepDestino" placeholder="CEP">
                <label for="">Serviço</label>
                <select name="nCdServico" id="">
                <option value="04014">Sedex</option>
                <option value="04510">PAC</option>
                </select>
                <input name="nVlLargura" type="hidden" value="<?php echo $produto['sDsLargura']; ?>">
                <input name="nVlAltura" type="hidden" value="<?php echo $produto['sDsAltura']; ?>">
                <input name="nVlComprimento" type="hidden" value="<?php echo $comprimento?>">
                <input name="nVlPeso" type="hidden" value="0,04">
                <input name="valorTotal" type="hidden" value="<?php echo $total ?>">
                <input name="sCepOrigem" type="hidden" value="22031000">
                <p><button type="button" id="calcular">Calcular</button></p>
                <a target="blank" href="https://buscacepinter.correios.com.br/app/endereco/index.php">Não sei meu CEP.</a>
            </form>
        <div class="clear"></div>
        <p id="resultado"></p>
    </div>
</div>

<div class="finalizar-pedidos">
    <div class="container pagar table-container">
        <h2>Total: R$ <span id="valorTotal"><?php echo Loja::convertMoney($total); ?></span></h2>
        <a href="" class="btn-pagamento">Pagar agora!</a>
        <div class="clear"></div>
    </div>
</div>


<script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/zebra_datepicker@latest/dist/zebra_datepicker.min.js"></script>