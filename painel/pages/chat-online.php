<div class="box-content w100">

<div class="title-content">
    <i class="fa-solid fa-comment" style="color: #1f71ff;"></i>
    <h3>Chat Online - <?php echo NOME_EMPRESA ?></h3> 
</div>

    <div class="box-texts">
        <div class="text-value">
            <label></label>
            <p></p>
        </div>
    </div>
    <form method="post" id="chat-msg">
        <input type="text" name="texto" id="texto" placeholder="Digite sua mensagem">
        <input type="submit" name="acao" id="btn-chat" value="Enviar!">
        <input type="hidden" name="id" id="id" value="<?php echo $_SESSION['nCdUsuario'];?>">
    </form> 
</div>