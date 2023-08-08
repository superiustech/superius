$(function(){
  
    var open = true;
    var windowSize = $(window).innerWidth();


    if(windowSize <= 768){
        open = false;
    }
    $(document).ready(function() {
        var open = false; // Definindo a variável open como false inicialmente
        
        $('.fa-solid').click(function() {
            if (open) {
                $('.menu').animate({'width': '0'}, function() {
                    open = false;
                });
               /*  $('.content, header').animate({'width':'100%'}, function() {
                    open = false;
                }); */
            } else {
                $('.menu').animate({'width': '300px'}, function() {
                    open = true;
                });
                $('.content, header').animate({'width':'calc(100% - 300px)'}, function() {
                    open = true;
                });
            }
        });
    });
    

   
    
    
});