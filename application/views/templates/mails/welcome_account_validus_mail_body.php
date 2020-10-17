<!DOCTYPE html>
<html>
	<head>
		<title>TradeFinex</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<?php $this->load->view('templates/mails/common_inline_css');?>
	</head>
	<body>
		<div class="mail_template welcome_mail">
			<div class="main_content">
				<div class="mail_template_header">
					<div class="mail_template_header_logo"> <img src="<?=base_url()?>assets/images/icon/logo.png" alt="logo"> </div>
				</div>
				<div class="mail_template_banner"> <img src="<?=base_url()?>assets/images/img/welcome_mail.jpg" alt="img"> </div>
				<div class="mail_template_body">
					<p>Hi <?=ucwords($uname);?>,</p>
					<p>Thank you for registering and acknowledging TERMS at TradeFinex. Your account was created and must be activated before you can use it. </p>
					<!-- This activation link will only valid for the next 3 hours.</p> -->
					<p>To upload your KYC documents <a href="<?php echo base_url().'/publicv/investorDoc?investor='.$generator?>">Click hear</a></p>
					<!-- <p>To activate the account click on the following link or copy-paste it in your browser:</p>
					<p><a href="<?=base_url('verify/validus_account/?').$encoded_uri;?>"><?=base_url('verify/validus_account/?').$encoded_uri;?></a></p> -->
					<!-- <p>After activation you may login to <?=base_url();?> using the following email:</p> -->
					<p>
						Email: <?=$uemail?><br/>
					</p>
				</div>
				<div class="mail_template_footer">
					<div class="mail_template_footer_content">
						<h5>&copy;2020 TradeFinex.org All rights reserved. </h5>
						<p>TradeFinex </br> Enter Address Below</p>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>