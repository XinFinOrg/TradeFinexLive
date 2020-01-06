<!DOCTYPE html>
<html>
	<head>
		<title>TradeFinex</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<?php $this->load->view('templates/mails/common_inline_css');?>
	</head>
	<body>
		<div class="mail_template consortium_mail">
			<div class="main_content">
				<div class="mail_template_header">
					<div class="mail_template_header_logo"> <img src="<?=base_url()?>assets/images/icon/logo.jpg" alt="logo"> </div>
				</div>
				<div class="mail_template_banner"> <img src="<?=base_url()?>assets/images/img/welcome_mail.jpg" alt="img"> </div>
				<div class="mail_template_body">
					<p>Hi <?=$full_name?>,</p>
					<p>Thank you for joining Consortium at TradeFinex.</p>
					<p> As a member you will be part of the ecosystem and will contribute to evolution of TradeFinex platform. </p>
					<? if($mmsg!="") { 
					echo"Your Comments: $mmsg";
					 } ?>
				</div>
				<div class="mail_template_footer">
					<div class="mail_template_footer_content">
						<h5>&copy;2019 TradeFinex.org All rights reserved. </h5>
						<!--<p>TradeFinex </br> Enter Address Below</p>-->
					</div>
				</div>
			</div>
		</div>
	</body>
</html>