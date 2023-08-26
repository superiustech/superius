<?php 

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $img = Painel::retornaImagem($id);
        $produto = Painel::retornaProdutoPorId($id);

        echo $produto['sDsProdutoDetalhada'];

?>
<div class="slider-wrapper" id="slider">
  <ul class="slider-img">
    <?php foreach($img as $prodImagem){?>
    <li>
      <img
        
        src="<?php echo INCLUDE_PATH_PAINEL.'uploads/'.$prodImagem['sDsImagem'];?>" alt=""/>
    </li>
    <?php }?>
  </ul>
</div>
<?php  } ?>