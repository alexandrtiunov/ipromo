$(document).ready(function(){


	$('#email').blur(function() {
		
		var pattern = /^([a-z0-9_\.-]{2,10})+@[a-z0-9-]+\.([a-z]{2,6}\.)?[a-z]{2,6}$/i;
	  	
	  		if(($('#email').val() != 0)&&(!pattern.test($('#email').val()))) {
	    		$('.email_val').css('display', 'block');
	    		$('#email').focus();

	    		$('form').submit(function(event){
	    			event.preventDefault();
	    		});
	  		}

	  		$('#email').select(function(){
				$('#email').unbind('blur');
				$('form').unbind('submit');
				$('.email_val').css('display', 'none');
			});
	});

});// end ready