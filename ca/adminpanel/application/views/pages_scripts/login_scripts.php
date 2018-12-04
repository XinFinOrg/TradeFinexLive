<script type="text/javascript">
	
	$(document).ready(function() {		
		
		$("#loginForm").validate({
			rules: {
				user_name: {
					required: true
				},
				user_password: {
					required: true,
					minlength: 8
				}
			},
			messages: {
				user_password: {
					required: "Please provide a valid password",
					minlength: "Your password must be at least 8 characters long"
				},
				user_name: {
					required: "Please provide a valid username"
				}
			}
		});
	});
 
</script>			
		