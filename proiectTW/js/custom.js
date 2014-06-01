function validateEmail(email) {
  var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
  var valid = emailRegex.test(email);
  if (!valid) {
    return false;
  } else
    return true;
}

$(document).ready(function() {
    $("#submit_btn").click(function() { 
        //get input field values
      
        var user_email      = $('#email').val();
       var ok =0;
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;
      
         if(validateEmail($('#email').val()) == false){
            	console.log('false');
    			$('#email').css({'border-color':'#f00'});
                if($('#error_email').length==0){
                	//$('#email').before( "<p id='error_email' class='alert alert-warning'>Va rugam sa introduceti o adresa de email valida.</p>" );
                }
    		} 
      

        //everything looks good! proceed...
        if(proceed) 
        {
            //data to be sent to server
            post_data = { 'userEmail':user_email};
            
            //Ajax post data to server
            $.post('newsletter.php', post_data, function(response){  
                
                //load json data from server and output message     
                if(response.type == 'error')
                {
                   // output = '<div class="error">'+response.text+'</div>';
				  output = "<p class='alert alert-warning'>Scuze. Ceva nu a mers bine.</p>";
				  // document.getElementById('succes-email').style.display='none';
				   ok=1;
				
                }else{
                
                    output = '<p class="alert alert-success" id="succes-email"> E-mailul a fost trimis cu succes.</p>';
									
					setTimeout(function() { 
					$('#succes-email').fadeOut('fast');
				}, 5000); // <-- time in milliseconds

	
				//	
				if (ok==1){
					document.getElementById('error_email').style.display='none';
				}
					// $('#newsletter_form').remove();
                    
                    //reset values in all input fields
                    $('#newsletter_form input').val(''); 
                    $('#newsletter_form textarea').val(''); 
                }
                
                $("#result").hide().html(output).slideDown();
            }, 'json');
            
        }
    });
    
    //reset previously set border colors and hide all message on .keyup()
    $("#newsletter_form input, #newsletter_form textarea").keyup(function() { 
        $("#newsletter_form input, #newsletter_form textarea").css('border-color',''); 
        $("#result").slideUp();
    });
    
});

