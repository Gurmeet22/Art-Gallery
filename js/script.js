
$(document).ready(function(e){
   
	$('#dashboard').show().fadeIn(500);
	
    $('#home').hide();
	$('.left-menu li:first-child a').addClass('active');
		$('.left-menu li a').click(function(e){
		var tabDivId = this.hash;                              
		$('.left-menu li a').removeClass('active');
		$(this).addClass('active');
		$('.switchgroup').hide();
		$(tabDivId).fadeIn(500);
		e.preventDefault();
	});
					
	$('.btn-add-cart').click(function(e){
        
        e.preventDefault();
    }
    );

});