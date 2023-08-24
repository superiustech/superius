$(function(){

		
	$('.boxes').hover(
		
		function (e) { 
			$(this).find('.parcelamento').slideUp(); // Mostra o botão quando passa o mouse
			$(this).find('.box-adicionar').slideDown();
			e.preventDefault();

		},
		function (e) {
			$(this).find('.box-adicionar').slideUp(); // Oculta o botão quando o mouse sai
			$(this).find('.parcelamento').slideDown(); // Mostra o botão quando passa o mouse
			e.preventDefault();

		}
	);
	
	

	$('a.btn-pagamento').click(function(e){
		var include_path = 'http://localhost/superius/';
		e.preventDefault();
		$.ajax({
			url:'http://localhost/superius/ajax/finalizarPagamento.php'
		}).done(function(data){
				console.log(data);
				var isOpenLightBox = PagSeguroLightbox({
					code:data
				},{
					success: function(transactionCode){
						location.href=include_path;
					},
					abort:function(){
						location.href=include_path;
					}
				});

				console.log(isOpenLightBox);
				
		})

		
	})
	
})