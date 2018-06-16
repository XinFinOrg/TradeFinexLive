<script type="text/javascript">
	
	$(function(){
		
		// validate signup form on keyup and submit
		$("#signupForm").validate({
			rules: {
				first_name: "required",
				last_name: "required",
				password: {
					required: true,
					minlength: 8
				},
				password_confirmation: {
					required: true,
					minlength: 8,
					equalTo: "#password"
				},
				email: {
					required: true,
					email: true
				},
				agree: "required"
			},
			messages: {
				firstname: "Please enter your firstname",
				lastname: "Please enter your lastname",
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 8 characters long"
				},
				confirm_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 8 characters long",
					equalTo: "Please enter the same password as above"
				},
				email: "Please enter a valid email address",
				agree: "Please accept our policy"
			}
		});
		
		$('.login_click').unbind('click').bind('click', function(){
			
			$('#sign_up').hide();
			$('#log_in').slideDown();
			$('#log_in').addClass('in');
			$('#sign_up').removeClass('in');
			// $('#log_in').fadeIn();
			
		});
		
		$('.signup_click').unbind('click').bind('click', function(){
			
			$('#log_in').hide();
			$('#sign_up').slideDown();
			$('#sign_up').addClass('in');
			$('#log_in').removeClass('in');
			// $('#sign_up').fadeIn();
			
		});
		
		$('.close_modal').unbind('click').bind('click', function(){
			$('.modal').removeClass('in');
			$('.modal').hide();
			$('.modal-backdrop').removeClass('in');
			$('.modal-backdrop').hide();
		});
		
		$('header').addClass("sticky_header"); 
		$('.jumbotron').css('padding-top', '100px');
		
		$(window).scroll(function() {
			if ($(this).scrollTop() > 4){  
				$('header').addClass("sticky_header"); 
			}
			else{
				$('header').removeClass("sticky_header");
			}
		});
		
		<?php
			$email_sent_common = $this->session->flashdata('email_sent_common');
			if($email_sent_common){
		?>
			$('#email_sent_msg').fadeIn();
			$('#fade').fadeIn();
			$('#submitp_btn').trigger('click');
			
		<?php
			}
		?>	
		
		$('.close').unbind('click').bind('click', function(){
			window.location.href = '<?=base_url();?>';
		});
	});
	
</script>	