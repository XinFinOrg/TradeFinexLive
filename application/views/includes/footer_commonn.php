<?php if($user_id > 0){ ?>
		
		<!-- Right Sidebar -->
		<div class="side-bar right-bar" style="display:none"> 
			<a href="javascript:void(0);" class="right-bar-toggle"> <i class="fa fa-close"></i> </a>
			<h4 class=""><i class="fa fa-wrench" ></i> Notification / Privacy Settings</h4>
			<div class="setting-list nicescroll">
				<?php if(isset($user_type_ref) && $user_type_ref == 3){ ?>  
				<div class="row m-t-20">
					<div class="col-xs-8">
						<p class="text-muted m-b-0"><small>Show / Hide</small> </p>
					</div>
					<div class="col-xs-4 text-right">
						<input type="checkbox" id="fin_notfic" name="fin_notfic" class="notify_check" <?=((isset($notifications['f_notification']) && $notifications['f_notification'] == 1) ? 'checked="checked"' : '');?> />
					</div>
					<div class="col-xs-12 notify_title">
						<h5 class="m-0">Financier's Notification Visibility</h5>
					</div>
				</div>
				<div class="row m-t-20">
					<div class="col-xs-8">
						<p class="text-muted m-b-0"><small>Show / Hide</small> </p>
					</div>
					<div class="col-xs-4 text-right">
						<input type="checkbox" id="supp_notfic" name="supp_notfic" class="notify_check" <?=((isset($notifications['p_notification']) && $notifications['p_notification'] == 1) ? 'checked="checked"' : '');?> />
					</div>
					<div class="col-xs-12 notify_title">
						<h5 class="m-0">Supplier's Notification Visibility</h5>
					</div>
				</div>
				<div class="row m-t-20">
					<div class="col-xs-8">
						<p class="text-muted m-b-0"><small>Show / Hide</small> </p>
					</div>
					<div class="col-xs-4 text-right">
						<input type="checkbox" id="pp_notfic" name="pp_notfic" class="notify_check" <?=((isset($notifications['pp_notification'])&& $notifications['pp_notification'] == 1) ? 'checked="checked"' : '');?> />
					</div>
					<div class="col-xs-12">
						<h5 class="m-0 notify_title">Published Project Visibility</h5>
					</div>
				</div>
				<div class="row m-t-20">
					<div class="col-xs-8">
						<p class="text-muted m-b-0"><small>Show / Hide</small> </p>
					</div>
					<div class="col-xs-4 text-right">
						<input type="checkbox" id="ppex_notfic" name="ppex_notfic" class="notify_check" <?=((isset($notifications['ppex_notification']) && $notifications['ppex_notification'] == 1) ? 'checked="checked"' : '');?> />
					</div>
					<div class="col-xs-12">
						<h5 class="m-0 notify_title">Project Expiration Visibility</h5>
					</div>
				</div>
				<?php }if(isset($user_type_ref) && ($user_type_ref == 1 || $user_type_ref == 2)){ ?>  
				<div class="row m-t-20">
					<div class="col-xs-8">
						<p class="text-muted m-b-0"><small>Show / Hide</small> </p>
					</div>
					<div class="col-xs-4 text-right">
						<input type="checkbox" id="b_notfic" name="b_notfic" class="notify_check" <?=((isset($notifications['b_notification']) && $notifications['b_notification'] == 1) ? 'checked="checked"' : '');?> />
					</div>
					<div class="col-xs-12">
						<h5 class="m-0 notify_title">Beneficiary's Notification Visibility</h5>
					</div>
				</div>
				<div class="row m-t-20">
					<div class="col-xs-8">
						<p class="text-muted m-b-0"><small>Show / Hide</small> </p>
					</div>
					<div class="col-xs-4 text-right">
						<input type="checkbox" id="pnp_notfic" name="pnp_notfic" class="notify_check" <?=((isset($notifications['pp_notification'])&& $notifications['pp_notification'] == 1) ? 'checked="checked"' : '');?> />
					</div>
					<div class="col-xs-12">
						<h5 class="m-0 notify_title">Posted New Project Visibility</h5>
					</div>
				</div>
				<div class="row m-t-20">
					<div class="col-xs-8">
						<p class="text-muted m-b-0"><small>Show / Hide</small> </p>
					</div>
					<div class="col-xs-4 text-right">
						<input type="checkbox" id="public_visibility" name="public_visibility" class="notify_check" <?=((isset($uvisibility) && $uvisibility == 1) ? 'checked="checked"' : '');?> />
					</div>
					<div class="col-xs-12">
						<h5 class="m-0 notify_title">Public Visibility</h5>
					</div>
				</div>
				<?php } ?>  
			</div>
		</div>
		<!-- /Right-bar --> 
		<?php }?>
		<section class="footer_sec">
			<footer>
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-xs-12 col-sm-3 hidden-sm footer_sec_logo mb-20">
							<div class="widget widget-logo">
								<div class="logo-ft"> <a href="<?=base_url();?>" title=""><img src="<?=base_url();?>assets/images/img/footer-logo.png" alt="logo"> </a> </div>
							</div>
						</div>
						<div class="col-md-3 col-xs-6 col-sm-3 footer_sec_support mb-20">
							<div class="widget widget-categories">
								<h3 class="widget-title">Explore</h3>
								<ul class="one-half">
									<li> <a href="<?=base_url();?>publicv/digital_bond" title="">Digital Bond</a></li>
									<li> <a href="<?=base_url();?>publicv/invoice_factoring" title="">Invoice Factoring</a></li>	
									<li> <a href="<?=base_url();?>publicv/consortium" title="">Consortium Membership</a></li>
									<li> <a href="http://events.tradefinex.org/" title="">Consortium Event</a></li>
                                    <!--<li> <a href="<?=base_url();?>" title="">Start POC</a></li>-->
								</ul>
							</div>
							<!-- /.widget-categories --> 
						</div>
						<!-- /.col-md-3 -->
						<div class="col-md-3 col-xs-6 col-sm-3 footer_sec_oppo mb-20">
							<div class="widget widget-categories">
								<h3 class="widget-title">Others</h3>
								<ul class="one-half">
									<li> <a href="https://xinfinorg.github.io/TradeFinex_API/" title="">API</a></li>
                                	<li> <a href="<?=base_url();?>publicv/media_center" title="">Media Center</a></li>
									<li> <a href="<?=base_url();?>publicv/faq" title="">FAQs</a></li>
									<li> <a href="<?=base_url();?>publicv/contact" title="">Contact Us</a></li>
									<!--<li> <a href="<?=base_url();?>publicv/videos" title="">Videos</a></li>-->									
								</ul>
							</div>
							<!-- /.widget-categories --> 
						</div>
						<!-- /.col-md-3 -->
						<div class="col-md-3 col-sm-4 footer_sec_stay">
							<div class="widget widget-contact">
								<h3 class="widget-title">KEEP IN TOUCH</h3>
								<ul class="social-ft">
                                    <li><a href="https://www.linkedin.com/in/tradefinex/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="https://twitter.com/TradeFinex" target="_blank"><i class="fa fa-twitter"></i></a></li>                                    <li><a href="https://www.youtube.com/channel/UCKzL0MI7gS_vlEKsUfiWuvA?view_as=subscriber" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                </ul>
                                
                                <!--<ul class="social-ft">
                                    <li><a href="https://twitter.com/TradeFinex" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="https://www.linkedin.com/in/tradefinex/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="https://www.youtube.com/channel/UCKzL0MI7gS_vlEKsUfiWuvA?view_as=subscriber" target="_blank"><i class="fa fa-youtube"></i></a></li>

                                </ul>-->


							</div>
							<!-- /.widget-contact --> 
						</div>
						<!-- /.col-md-3 --> 
					</div>
					<!-- /.row --> 
					<input type="hidden" id="site_url" value="<?=base_url();?>" />
					<input type="hidden" id="uemail" value="<?=(isset($uemail) ? $uemail : '');?>" />
				</div>
				<!-- /.container --> 
			</footer>
			<!-- /footer -->
  
			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<!--<div class="col-md-12">
							<div class="copyright"> Copyright &copy; 2019 TradeFinex.org, All rights reserved.  <a href="<?=base_url();?>publicv/privacy_policy" title="">Privacy Policy </a> and  <a href="<?=base_url();?>publicv/terms_condition" title="">Terms & Conditions </a> </li> </div>
						</div>-->
                        
                        <div class="col-md-6 col-sm-6"> 
							<!-- /.social-ft -->
							<div class="copyright">Copyright &copy; 2019 TRADEFINEX TECH LTD (ADGM RegLab Participant), All rights reserved.</div>
							<!-- /.copyright --> 
						</div>
						<!-- /.col-md-12 -->                        
                        <div class="col-md-6 col-sm-6"> 
							<!-- /.social-ft -->
							<div class="copyright pull-right"><a href="<?=base_url();?>publicv/privacy_policy" title="">Privacy Policy</a> | <a href="<?=base_url();?>publicv/terms_condition" title="">Terms & Conditions</a></div>
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
		<script src="<?=base_url('assets/js/jquery-core/jquery.min.js');?>"></script> 
        <script src="<?=base_url('assets/js/jquery-core/jquery-ui.1.12.1.min.js');?>"></script> 
		<script src="<?=base_url('assets/js/jquery-core/jquery.ui.touch-punch.min.js');?>"></script> 
		<script src="<?=base_url('assets/js/bootstrap/bootstrap.min.js');?>"></script> 
		
		<!-- Lazy Loading -->
		<script src="<?=base_url('assets/js/slick.js');?>"></script>
		<script src="<?=base_url('assets/js/form-validator/jquery.form-validator.min.js');?>"></script>
		<script src="<?=base_url('assets/js/form-validator/jquery.validate.min.js');?>"></script>
		
		<?php if(uri_string()){ ?>
		
		<!-- Jquery Paginate -->
		<script src="<?=base_url('assets/js/jquery.easyPaginate.js');?>"></script>
				
		<!-- Text Editor -->
		<script src="<?=base_url('assets/js/text-editor/jquery-te-1.0.5.min.js');?>"></script> 
		
		<!-- Form Validations -->
		
		<script src="<?=base_url('assets/js/intlTelInput.min.js');?>"></script> 
				
		<!-- captha -->
		<script src="<?=base_url('assets/js/captcha/jquery.plugin.min.js');?>"></script>
		<script src="<?=base_url('assets/js/captcha/jquery.realperson.min.js');?>"></script>
		<script src="<?=base_url('assets/js/captcha/md5.min.js');?>"></script>
		<script src="<?=base_url('assets/js/captcha/aes.min.js');?>"></script>
		
		<script src="<?=base_url('assets/js/bootstrap/bootstrap-confirmation.min.js');?>"></script>
		<script src="<?=base_url('assets/js/bootstrap/bootstrap-multiselect.min.js');?>"></script>
		<script src="<?=base_url('assets/js/rating/jquery.ratyn.min.js');?>"></script>
		
		<?php } if($user_id > 0){ ?>
				
		<script src="<?=base_url('assets/js/bootstrap/bootstrap-switch.min.js');?>"></script>	
	
		<?php 
			if(uri_string() === 'user/edit'){
				echo '<link rel="stylesheet" type="text/css" href="'.base_url('assets/css/bootstrap-datepicker.1.5.0.css').'" />';
				echo '<script src="'.base_url('assets/js/bootstrap/bootstrap-datepicker.1.5.0.js').'"></script>';
			}
		?>
		
		<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtRmXKclfDp20TvfQnpgXSDPjut14x5wk&region=GB"></script>
		<script src="<?=base_url('assets/js/gmap3.min.js');?>"></script>  -->
				
		<!-- Datatables -->
		<script src="<?=base_url('assets/js/datatables/jquery.dataTables.min.js');?>"></script>
		<script src="<?=base_url('assets/js/datatables/dataTables.responsive.2.1.1.min.js');?>"></script>
		<script src="<?=base_url('assets/js/datatables/responsive.bootstrap.2.1.1.min.js');?>"></script>
		<script src="<?=base_url('assets/js/datatables/dataTables.bootstrap.min.js');?>"></script>
        <script src="<?=base_url('assets/js/datatables/dataTables.buttons.min.js');?>"></script>
        <script src="<?=base_url('assets/js/datatables/buttons.bootstrap.min.js');?>"></script>
        <script src="<?=base_url('assets/js/datatables/jszip.min.js');?>"></script>
        <script src="<?=base_url('assets/js/datatables/pdfmake.min.js');?>"></script>
		<script src="<?=base_url('assets/js/datatables/vfs_fonts.js');?>"></script>
        <script src="<?=base_url('assets/js/datatables/buttons.html5.min.js');?>"></script>
        <script src="<?=base_url('assets/js/datatables/buttons.print.min.js');?>"></script>
		
		<?php } ?>
					
        <!-- JAVASCRIPT OWL =============================--> 
        	
		<script type="text/javascript">
		
			<?php
				$sub_email_sent = $this->session->flashdata("sub_email_sent");
				$sub_email_action = $this->session->flashdata("sub_email_action");
				
				if($sub_email_sent && $sub_email_action && $sub_email_action == 'footer'){
			?>		
					$("html, body").animate({ scrollTop: $(document).height() }, 1000);
				
			<?php		
				}
				if(uri_string()){
			?>
			
				$('#easyPaginate').paginate({
					perPage: 6
				});
				
				$('#mmob').intlTelInput();
				
				$('#defaultReal').realperson();
				
			<?php } ?>	
									
		</script>
			<!-- bxslider Banner script js -->
        <script src="<?=base_url('assets/banner-assets/js/bxslider.min.js');?>"></script>
        <script src="<?=base_url('assets/banner-assets/js/custom.js');?>"></script>
        <script src="<?=base_url('assets/banner-assets/js/magnific-popup.min.js');?>"></script>
        
        <script src="<?=base_url('assets/banner-assets/owl-carousel/js/owl.carousel.min.js');?>"></script>
        
		<script src="<?=base_url('assets/js/page_js/footer_common.js');?>"></script>