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
						<div class="col-md-3 col-xs-12 col-sm-3 hidden-sm footer_sec_logo">
							<div class="widget widget-logo">
								<div class="logo-ft"> <a href="<?=base_url();?>" title=""><img src="<?=base_url();?>assets/images/img/footer-logo.png" alt="logo"> </a> </div>
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
								<h3 class="widget-title">Explore</h3>
								<ul class="one-half">
									<li> <a href="<?=base_url();?>publicv/partnership" title="">Consortium </a> </li>
									<li> <a href="<?=base_url();?>publicv/media_center" title="">Media Center </a> </li>
									<li> <a href="<?=base_url();?>publicv/case_study" title="">Case Study </a> </li>
									<li> <a href="https://xinfinorg.github.io/TradeFinex_API/" title="">API</a> </li>
								</ul>
							</div>
							<!-- /.widget-categories --> 
						</div>
						<!-- /.col-md-3 -->
						<!--<div class="col-md-2 col-xs-12 col-sm-2 footer_sec_res">-->
						<!--	<div class="widget widget-categories">-->
						<!--		<h3 class="widget-title">Resources</h3>-->
						<!--		<ul class="one-half">-->
						<!--			<li> <a href="<?=base_url();?>publicv/media_center" title="">Media Center </a> </li>-->
						<!--			<li> <a href="<?=base_url();?>publicv/case_study" title="">Case Study </a> </li>-->
						<!--			<li> <a href="javascript:void(0)" title="">Mobile Apps (<span style="font-size: 10px;">Coming Soon</span>)</a> </li>-->
						<!--		</ul>-->
						<!--	</div>-->
							<!-- /.widget-categories --> 
						<!--</div>-->
						<!-- /.col-md-3 -->
						<a class="jump_to" href="#footer_subscrip"></a>
						<div class="col-md-3 col-sm-4 footer_sec_stay">
							<div class="widget widget-contact">
								<!--<h3 class="widget-title">Stay Connected</h3>-->
								<div id="footer_subscrip" class="col-md-12 col-xs-12 sub_box">
									
								</div>
								<input type="hidden" id="log_user_id" value="<?=(isset($user_id) ? $user_id : 0);?>" />
								<input type="hidden" id="log_user_type" value="<?=(isset($user_type_ref) ? $user_type_ref : 0);?>" />
								<h3 class="widget-title keep_in_touch">KEEP IN TOUCH</h3>
								<ul class="social-ft">
									<li> <a href="https://www.linkedin.com/in/tradefinex/"> <img src="<?=base_url('assets/images/icon/lkdn.png');?>" alt="icon"></a> </li>
									<li> <a href="https://twitter.com/TradeFinex"> <img src="<?=base_url('assets/images/icon/twr.png');?>" alt="icon"></a> </li>
									<li> <a href="https://www.youtube.com/channel/UCKzL0MI7gS_vlEKsUfiWuvA?view_as=subscriber"> <img src="<?=base_url('assets/images/icon/youtube.png');?>" alt="icon"></a> </li>
									<li> <a href="https://www.instagram.com/tradefinex/"> <img src="<?=base_url('assets/images/icon/ins.png');?>" alt="icon"></a> </li>
									<li> <a href="https://t.me/tradefinex"> <img src="<?=base_url('assets/images/icon/tel.png');?>" alt="icon"></a> </li>
								</ul>
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
			
		<script src="<?=base_url('assets/js/page_js/footer_common.js');?>"></script>
	