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
					<p>Hi,</p>
					<p>Your request with Email <?php echo $email ?> and Mobile No. <?php echo $mmob ?> has been received by us. Please sign the NDA and revert back to us on <a href="info@tradefinex.org">info@tradefinex.org</a>.After signing NDA, the user will be able to access the case study document over mail. </p>
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