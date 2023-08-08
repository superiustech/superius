$(function(){
$('[name=cpf]').mask('999.999.999-99');
$('[name=cnpj]').mask('99.999.999/9999-99');

$('[name=tipo]').change(function(){
    var val = $(this).val();
    if(val == "fisico")
    {
        $('[rel=cpf]').show();
        $('[rel=cnpj]').hide();
    }
    else{
        $('[rel=cpf]').hide();
        $('[rel=cnpj]').show();
    }
})

});