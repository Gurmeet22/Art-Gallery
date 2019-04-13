
$(document).ready(function(e){
   
	$('#dashboard').show().fadeIn(500);
	
    $('#home').hide();
    $('#about').hide();
    $('#reach_us').hide();
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
	$('.form-control').blur(function(){
		
		$value=$(this).val();
		$radioValue = $("input[name='gender']:checked"). val();
		
		if($value=="")
		{
			$(this).parents('.form-group').find('.val_err').css({"color": "red", "display": "block"});
		}
		else
		{
			$(this).parents('.form-group').find('.val_err').css({"display": "none"});
		}
	});
	
	$("input[name='gender']").change(function(){
		
		$(this).parents('.form-group').find('.val_err').css({"display": "none"});
		
	});
	$("#registerClick").click(function(e){
		
		$cnt=0;
		$radioValue = $("input[name='gender']:checked"). val();
		$("input").each(function(){
			
			$val=$(this).val();
			if($val=="")
			{
				$(this).parents('.form-horizontal').find('.val_err').css({"color": "red", "display": "block"});
				$cnt=1;
			}
			else{
				$cnt=0;
			}
		});
		
		if($radioValue!="Male" && $radioValue!="Female")
		{
			$cnt=1;
		}
		else
		{
			$cnt=0;
		}
		$pwd=$("input[name=pwd]").val();
		$cpwd=$("input[name=confirmpwd]").val();
		
		if($pwd!=$cpwd)
		{
			$(this).parents('.form-horizontal').find('.pass_err').css({"color": "red", "display": "block"});	
			$cnt=1;
		}
		else{
			$(this).parents('.form-horizontal').find('.pass_err').css({"display": "none"});	
			
		}
		
		if($cnt==1)
		{
			
			e.preventDefault();
		}
		else if($cnt==0){
			
		}
		
	});

	
	
	
});