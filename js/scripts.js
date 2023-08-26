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
	
	/*carosssel*/

	let sliderCount = $("#slider").find(".slider-img li img").length;
	let sliderImg = $("#slider").find(".slider-img");

	let sliderArrow = `<ul class="slider-arrow"><li class="arrow-left" role="button"><i class="fas fa-chevron-left"></i></li><li class="arrow-right" role="button"><i class="fas fa-chevron-right"></i></li></ul>`;
let sliderDotLi = "";
for (let i = 0; i < sliderCount; i++) {
  sliderDotLi += `<li><i class="fas fa-circle"></i></li>`;
}
let sliderDot = `<ul class="slider-dot">${sliderDotLi}</ul>`;
$("#slider").append(sliderArrow + sliderDot);
let activeDefaultCount = $(".slider-dot li.active").length;
  if (activeDefaultCount != 1) {
    $(".slider-dot li")
      .removeClass()
      .eq(0)
      .addClass("active");
  }
let sliderIndex = $(".slider-dot li.active").index();
sliderImg.css("left", -sliderIndex * 100 + "%");

function sliderPos() {
	sliderImg.css("left", -sliderIndex * 100 + "%");
	$(".slider-dot li")
	  .removeClass()
	  .eq(sliderIndex)
	  .addClass("active");
  }
  
  $(".arrow-right").click(function() {
	sliderIndex >= sliderCount - 1 ? (sliderIndex = 0) : sliderIndex++;
	sliderPos();
  });
  
  $(".arrow-left").click(function() {
	sliderIndex <= 0 ? (sliderIndex = sliderCount - 1) : sliderIndex--;
	sliderPos();
  });
  
  $(".slider-dot li").click(function() {
	sliderIndex = $(this).index();
	sliderPos();
  });

  $("#slider").on({
	mouseenter: () => {
	  clearInterval(goSlider);
	},
	mouseleave: () => {
	  goSlider = setInterval(() => {
		$(".arrow-right").click();
	  }, 3000);
	}
  });

/*PAGAMENTO*/

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


	/*FRETE*/

	$('#calcular').click(function() {
		let formSerialized = $('#formDestino').serialize();
		$.post('http://localhost/superius/ajax/calcular.php', formSerialized, function(resultado) {
			resultado = JSON.parse(resultado);
			let valorFrete = resultado.preco;
			let prazoEntrega = resultado.prazo;
			let valorTotal = resultado.valorTotal;
			$('#valorTotal').html(valorTotal);
			$('#resultado').html(`O valor do frete é <b>R$ ${valorFrete}</b> e o prazo de entrega é <b>${prazoEntrega} dias úteis</b>.`);
		});

	});
})