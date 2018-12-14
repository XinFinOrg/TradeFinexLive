	
		<section class="footer_sec">
			<footer>
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-xs-12 col-sm-3 hidden-sm footer_sec_logo">
							<div class="widget widget-logo">
								<div class="logo-ft"> <a href="javascript:void(0)" title=""><img src="<?=base_url();?>assets/images/img/footer-logo.png" alt="logo"> </a> </div>
							</div>
						</div>
						<div class="col-md-2 col-xs-6 col-sm-3 footer_sec_support">
							<div class="widget widget-categories">
								<h3 class="widget-title">Support</h3>
								<ul class="one-half">
									<li> <a href="<?=base_url();?>publicv/contact" title="">Contact Us </a> </li>
									<li> <a href="<?=base_url();?>publicv/faq" title="">FAQs</a> </li>
									<li> <a href="<?=base_url();?>publicv/privacy_policy" title="">Privacy Policy </a> </li>
									<li> <a href="<?=base_url();?>publicv/terms_condition" title="">Terms & Conditions </a> </li>
								</ul>
							</div>
							<!-- /.widget-categories --> 
						</div>
						<!-- /.col-md-3 -->
						<div class="col-md-2 col-xs-6 col-sm-3 footer_sec_oppo">
							<div class="widget widget-categories">
								<h3 class="widget-title">Opportunities</h3>
								<ul class="one-half">
									<li> <a onclick="return false;" href="#<?=base_url();?>publicv/consortium" title="">Consortium </a> </li>
									<li> <a onclick="return false;" href="#<?=base_url();?>publicv/advertise" title="">Advertise With Us </a> </li>
									<li> <a onclick="return false;" href="<?=base_url();?>publicv/careers" title="">Careers </a> </li>
								</ul>
							</div>
							<!-- /.widget-categories --> 
						</div>
						<!-- /.col-md-3 -->
						<div class="col-md-2 col-xs-12 col-sm-2 footer_sec_res">
							<div class="widget widget-categories">
								<h3 class="widget-title">Resources</h3>
								<ul class="one-half">
									<li> <a href="<?=base_url();?>publicv/media_center" title="">Media Center </a> </li>
									<li> <a href="<?=base_url();?>publicv/case_study" title="">Case Study </a> </li>
									<li> <a href="javascript:void(0)" title="">Mobile Apps (Coming Soon)</a> </li>
								</ul>
							</div>
							<!-- /.widget-categories --> 
						</div>
						<!-- /.col-md-3 -->
        
						<div class="col-md-3 col-sm-4 footer_sec_stay">
							<div class="widget widget-contact">
								<h3 class="widget-title">Stay Connected</h3>
								<div class="col-md-12 col-xs-12 sub_box">
									<?php
										$request_uri = $_SERVER['REQUEST_URI'];
										
										$page = str_replace ('/tradefinex/', '', $request_uri);
									?>
									<form id="subscription" method="post" action="<?=base_url();?>publicv/subscribe">
										<div class="col-md-8 col-sm-8 col-xs-8 sub_box_left">
											<div class="input-group">
												<input class="email_sub" name="semail" id="semail" type="email" placeholder="Enter Email ID" required />
												<input type="hidden" name="action" value="send_mail" />
												<input type="hidden" name="request_page" value="<?=$page;?>" />
												<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
											</div>	
										</div>
										<div class="col-md-3 col-sm-4 col-xs-3 sub_box_right">
											<button class="btn" type="submit">Submit</button>
										</div>
									</form>
									<?=$this->session->flashdata('semail_sent');?> 
								</div>
								<h3 class="widget-title keep_in_touch">KEEP IN TOUCH</h3>
								<ul class="social-ft">
									<li> <a href="https://www.linkedin.com/in/tradefinex/"> <img src="<?=base_url();?>assets/images/icon/lkdn.png" alt="icon"></a> </li>
									<li> <a href="https://twitter.com/TradeFinex"> <img src="<?=base_url();?>assets/images/icon/twr.png" alt="icon"></a> </li>
									<li> <a href="https://www.youtube.com/channel/UCKzL0MI7gS_vlEKsUfiWuvA?view_as=subscriber"> <img src="<?=base_url();?>assets/images/icon/youtube.png" alt="icon"></a> </li>
									<!--<li> <a href="https://www.instagram.com/tradefinex/"> <img src="<?=base_url();?>assets/images/icon/ins.png" alt="icon"></a> </li>-->
									<li> <a href="https://t.me/tradefinex"> <img src="<?=base_url();?>assets/images/icon/tel.png" alt="icon"></a> </li>
								</ul>
							</div>
							<!-- /.widget-contact --> 
						</div>
						<!-- /.col-md-3 --> 
					</div>
					<!-- /.row --> 
				</div>
				<!-- /.container --> 
			</footer>
			<!-- /footer -->
  
			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<div class="col-md-12"> 
							<!-- /.social-ft -->
							<div class="copyright"> Copyright &copy; 2018 TradeFinex.org, All rights reserved. </div>
							<!-- /.copyright --> 
						</div>
						<!-- /.col-md-12 --> 
					</div>
					<!-- /.row --> 
				</div>
				<!-- /.container --> 
			</div>
			<!-- /.footer-bottom --> 
		</section>
		
        <!-- JAVASCRIPT =============================--> 
		<script type="text/javascript" src="<?=base_url();?>assets/js/jquery-core/jquery.min.js"></script> 
		
		<script type="text/javascript">
			
			$(window).load(function(){
				$('.preloader').hide();
			});
		
		</script>
      