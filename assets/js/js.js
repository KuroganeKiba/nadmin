$( document ).ready(function() {
    $('.diferent input').click(function(){
    	if($(this).parents('.item').hasClass('soysoy')){$('.item').removeClass('soysoy');}
    	else{
    		$('.item').removeClass('soysoy');

    		$(this).parents('.item').addClass('soysoy');
    	};

    	
    });

    $('.botonista input').click(function(){
    	if($(this).parents('.item').hasClass('botoniable')){$('.item').removeClass('botoniable');}
    	else{
    		$('.item').removeClass('botoniable');

    		$(this).parents('.item').addClass('botoniable');
    	};

    	
    });
});