<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Tradefinex Admin | Login</title>
		<!-- FAVICON -->
		<link rel="icon" href="<?php echo base_url() ?>public/images/favicon.png" />

		<!-- Bootstrap -->
		<link type="text/css" href="<?php echo base_url() ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font Awesome -->
		<link type="text/css" href="<?php echo base_url() ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<!-- NProgress -->
		<link type="text/css" href="<?php echo base_url() ?>vendors/nprogress/nprogress.css" rel="stylesheet">
		<!-- bootstrap-daterangepicker -->
		<link href="<?php echo base_url() ?>vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
		<!-- Animate.css -->
		<link type="text/css" href="<?php echo base_url() ?>vendors/animate.css/animate.min.css" rel="stylesheet">

		<!-- Custom Theme Style -->
		<link type="text/css" href="<?php echo base_url() ?>build/css/custom.min.css" rel="stylesheet">
		<link type="text/css" href="<?php echo base_url() ?>build/css/custom.style.css" rel="stylesheet">
	</head>

	<body class="login">
		<div class="login_wrapper">
			<div class="animate form login_form">
				<section class="login_content">
					<div>
						<a class="" href="javascript:void(0)">
						   <img style="width: 200px;" src="<?php echo base_url() ?>public/images/logo.png" alt="Tradefinex Logo">
						</a>
					</div>
					<div class="clearfix"></div>
					<?php 
						$attributes = array('id' => 'loginForm', 'class' => 'cmxform', 'method' => 'post', 'role' => 'form');
						echo form_open_multipart(base_url().'log/in/', $attributes); 
					?>						
						<h1>Login Form</h1>
						<div>
							<input class="form-control" name="user_name" id="user_name" type="text" placeholder="Username" required />
						</div>
						<div>
							<input class="form-control" name="user_password" id="user_password" type="password" placeholder="Password" required />
						</div>
						
						<input type="hidden" name="action" value="login" />
						<div>
							<a class="reset_pass" href="javascript:void(0)">Lost password?</a>
							<button type="submit" class="btn btn-default submit">Log in</button>
						</div>
						<div class="clearfix"></div>
						<div class="separator">
							<div class="col-xs-12 col-sm-6 col-md-12 error alertm error-msg <?php if(isset($page) && $page == 'login' && isset($msg) && $msg == 'error'){ echo ''; }else{ echo 'hide'; } ?>">
								Username/Password Not Valid ! Try again.
							</div>
							<div>    
								<p>&copy;2017 All Rights Reserved. Tradefinex Adminpanel</p>
								<p><a class="" href="javascript:void(0)">Privacy and Terms</a></p>
							</div>
						</div>
					</form>
				</section>
			</div>
		</div>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="<?php echo base_url() ?>public/js/jquery-1.11.1.js"></script>
		<script src="<?php echo base_url() ?>public/js/jquery.validate.min.js"></script>
	
		<script type="text/javascript">
			
			setTimeout(function(){ $('.alertm').slideUp(); }, 7000);
			
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
	</body>
</html>
