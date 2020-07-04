$(document).ready(main);
 
var contador = 1;
 
function main(){
    $('.navegador').click(function(){
        if(contador == 1){
			$('nav').animate({
				left: '0%'
			});
			contador = 0;
		} else {
			contador = 1;
			$('nav').animate({
				left: '-100%'
			});
		}
    });
	$('.menu-toggle').click(function(){
		// $('nav').toggle(); 
		if(contador == 1){
			$('nav').animate({
				left: '0%'
			});
			contador = 0;
		} else {
			contador = 1;
			$('nav').animate({
				left: '-100%'
			});
		}
	});
    
};