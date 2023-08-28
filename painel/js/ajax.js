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
      
function atualizarListaMensagens() {
        var ide = $('#id').val();
        $.ajax({
            url: 'http://localhost/superius/painel/ajax/chat-admin.php',
            data: { id: ide, tipo_acao: 'atualizar_mensagens' },
            method: 'post',
            dataType: 'json' // Indicar que estamos esperando um JSON como resposta
        }).done(function(chat) {
            // Limpar a lista de mensagens existente
            
            $('.box-texts').empty();
            // Adicionar as novas mensagens à lista
            for (var i = 0; i < chat.length; i++) {
                var message = chat[i];
                var html = '<div class="text-value">' +
                           '<label>' + message.sNmUsuario + '</label>' +
                           '<p>' + message.sDsMensagem + '</p>' +
                           '</div>';
                $('.box-texts').append(html);
            }
        });
    } 
    
$('#btn-chat').click(function(e) {
    e.preventDefault();
    var ide = $('#id').val();
    var texto_enviado = $('#texto').val();
    $.ajax({
        url: 'http://localhost/superius/painel/ajax/chat-admin.php',
        data: { id: ide, texto: texto_enviado, tipo_acao: 'enviar_mensagem' },
        method: 'post'
    }).done(function() {
       atualizarListaMensagens();
    });
});



setInterval(() => {
    atualizarListaMensagens();
}, 2000);

    
});



