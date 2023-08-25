$(function(){

		
	var hoverTimeout;

	$('.boxes').hover(
		function (e) {
			var _this = this;
	
			hoverTimeout = setTimeout(function () {
				$(_this).find('.parcelamento').slideUp();
				$(_this).find('.box-adicionar').slideDown();
				e.preventDefault();
			},100);
		},
		function () {
			clearTimeout(hoverTimeout);
	
			$(this).find('.box-adicionar').slideUp();
			$(this).find('.parcelamento').slideDown();
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