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
				<div class="mail_template_banner"> <img src="<?=base_url()?>assets/images/img/explore_back.jpg" alt="img"> </div>
				<div class="mail_template_body">
					<p>Hi admin,</p>
					<p>Financier with address <?php echo $address?> has requested to contact the buyer/supplier with reference to <?php echo $docRef?></p>
				</div>
				<div class="mail_template_footer">
					<div class="mail_template_footer_content">
						<h5>&copy;2020 TradeFinex.org All rights reserved. </h5>
						<!-- <p>TradeFinex </br> Enter Address Below</p> -->
					</div>
				</div>
			</div>
		</div>
	</body>
</html>