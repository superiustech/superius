$(function(){
    $('.ajax').ajaxForm({
        dataType:'json',
        beforeSend: function(){ 
            $('.ajax').animate({'opacity':'0.7'});
            $('.ajax').find('input[type=submit]').attr('disabled','true');
         },        
        success: function(data){
            $('.ajax').animate({'opacity':'1'});
            $('.ajax').find('input[type=submit]').removeAttr('disabled');
            $('.box-alert').remove();
            if (data.sucesso){
                $('.ajax').prepend('<div class="box-alert sucesso"><i class="fa fa-check"></i>'+data.mensagens+'</div>');
                // if$($('ajax').hasAttr('atualizar') == undefined)
                //     $('ajax')[0].reset();
            } else {
                $('.ajax').prepend('<div class="box-alert erro"><i class="fa fa-check"></i> Ocorreram os seguintes erros: <b>'+ data.mensagens + ' </b></div>');
            }
          }
    });

    // TO DO: FICAR DE OLHO NESSE EVENTO DEVIDO AO NOVO MÓDULO DE CONTROLE FINANCEIRO.

    $('.delete').click(function(e) {

        
        e.preventDefault(e);
        var item_id = $(this).attr('item_id');
        var el = $(this).parent().parent().fadeOut();
        $.ajax({
            url: include_path+'/ajax/forms.php',
            data: {id:item_id,tipo_acao:'deletar_cliente'},
            method:'post'
        }).done(function(){
            el.fadeOut();
          })
          
          
      });
});