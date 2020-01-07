<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>TradeFinex</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<?php $this->load->view('templates/mails/common_inline_css');?>
	</head>
	<body>
		<div class="mail_template reset_password">
			<div class="main_content">
				<div class="mail_template_header">
					<div class="mail_template_header_logo"> <img src="<?=base_url()?>assets/images/icon/logo.png" alt="logo"> </div>
				</div>
				<div class="mail_template_banner"> <img src="<?=base_url()?>assets/images/img/mail_reset_password.jpg" alt="img"> </div>
				<div class="mail_template_body">
					<p>Hi <?=$name;?>,</p>
					<p>You recently requested to reset your password for your TradeFinex account. Click the button below to reset it. </p>
					<div class="mail_body_button">
						<div class="mail_btn"> <a href="<?=base_url('reset/account_password/?').$encoded_uri;?>" title="Reset Password">Reset Password</a> </div>
					</div>
					<p>If you did not request a password reset, please ignore this email or reply to let us know. This password reset link will only valid for the next 3 hours.</p>
					<p>Thanks, </br>
					<span class="first_name">Trade</span><span class="last_name">Finex</span> Team</p>
					<p>If you're having trouble clicking the password reset button, copy and paste the URL below into your web browser.</p>
					<p><a href="<?=base_url('reset/account_password/?').$encoded_uri;?>"><?=base_url('reset/account_password/?').$encoded_uri;?></a></p>
				</div>
				<div class="mail_template_footer">
					<div class="mail_template_footer_content">
						<h5>&copy;2019 TradeFinex.org All rights reserved. </h5>
						<p>TradeFinex </br> Enter Address Below</p>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>