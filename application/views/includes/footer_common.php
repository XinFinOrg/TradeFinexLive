		<!-- Right Sidebar -->
		<div class="side-bar right-bar"> 
			<a href="javascript:void(0);" class="right-bar-toggle"> <i class="mdi mdi-close-circle-outline"></i> </a>
			<h4 class=""><i class="fa fa-wrench" ></i> Notification / Privacy Settings</h4>
			<div class="setting-list nicescroll">
				<?php if(isset($user_type_ref) && $user_type_ref == 3){ ?>  
				<div class="row m-t-20">
					<div class="col-xs-8">
						<p class="text-muted m-b-0"><small>Show / Hide</small> </p>
					</div>
					<div class="col-xs-4 text-right">
						<input type="checkbox" id="fin_notfic" name="fin_notfic" class="notify_check" <?php echo (($f_notification == 1) ? 'checked="checked"' : '') ?> />
					</div>
					<div class="col-xs-12">
						<h5 class="m-0">Financier's Notification Visibility</h5>
					</div>
				</div>
				<div class="row m-t-20">
					<div class="col-xs-8">
						<p class="text-muted m-b-0"><small>Show / Hide</small> </p>
					</div>
					<div class="col-xs-4 text-right">
						<input type="checkbox" id="supp_notfic" name="supp_notfic" class="notify_check" <?php echo (($p_notification == 1) ? 'checked="checked"' : '') ?> />
					</div>
					<div class="col-xs-12">
						<h5 class="m-0">Supplier's Notification Visibility</h5>
					</div>
				</div>
				<div class="row m-t-20">
					<div class="col-xs-8">
						<p class="text-muted m-b-0"><small>Show / Hide</small> </p>
					</div>
					<div class="col-xs-4 text-right">
						<input type="checkbox" id="pp_notfic" name="pp_notfic" class="notify_check" <?php echo (($pp_notification == 1) ? 'checked="checked"' : '') ?> />
					</div>
					<div class="col-xs-12">
						<h5 class="m-0">Published Project Visibility</h5>
					</div>
				</div>
				<div class="row m-t-20">
					<div class="col-xs-8">
						<p class="text-muted m-b-0"><small>Show / Hide</small> </p>
					</div>
					<div class="col-xs-4 text-right">
						<input type="checkbox" id="ppex_notfic" name="ppex_notfic" class="notify_check" <?php echo (($ppex_notification == 1) ? 'checked="checked"' : '') ?> />
					</div>
					<div class="col-xs-12">
						<h5 class="m-0">Project Expiration Visibility</h5>
					</div>
				</div>
				<?php }if(isset($user_type_ref) && ($user_type_ref == 1 || $user_type_ref == 2)){ ?>  
				<div class="row m-t-20">
					<div class="col-xs-8">
						<p class="text-muted m-b-0"><small>Show / Hide</small> </p>
					</div>
					<div class="col-xs-4 text-right">
						<input type="checkbox" id="b_notfic" name="b_notfic" class="notify_check" <?php echo (($b_notification == 1) ? 'checked="checked"' : '') ?> />
					</div>
					<div class="col-xs-12">
						<h5 class="m-0">Beneficiary's Notification Visibility</h5>
					</div>
				</div>
				<div class="row m-t-20">
					<div class="col-xs-8">
						<p class="text-muted m-b-0"><small>Show / Hide</small> </p>
					</div>
					<div class="col-xs-4 text-right">
						<input type="checkbox" id="pnp_notfic" name="pnp_notfic" class="notify_check" <?php echo (($pp_notification == 1) ? 'checked="checked"' : '') ?> />
					</div>
					<div class="col-xs-12">
						<h5 class="m-0">Posted New Project Visibility</h5>
					</div>
				</div>
				<?php } ?>  
			</div>
		</div>
		<!-- /Right-bar --> 
		<footer>
			<section class="footer_top">
				<div class="container">
						<div class="col-md-2 site-item"> <img class="img-resposiive" src="<?php echo base_url() ?>public/images/globe.png" alt="Los Angeles">
							<h3>Global connectivity</h3>
							<p>Our aim is to connect 1000+ global beneficiaries, suppliers and financiers</p>
						</div>
						<div class="col-md-2 site-item"> <img class="img-resposiive" src="<?php echo base_url() ?>public/images/trade.png" alt="Los Angeles">
							<h3>Trade Recognition</h3>
							<p>A platform that will be recognized by 100+ global trade associations</p>
						</div>
						<div class="col-md-2 site-item"> <img class="img-resposiive" src="<?php echo base_url() ?>public/images/Integrated.png" alt="Los Angeles">
							<h3>Smart Contracting</h3>
							<p>Create legally binding digital smart contracts for Trade and Financing</p>
						</div>
						<div class="col-md-2 site-item"> <img class="img-resposiive" src="<?php echo base_url() ?>public/images/wallet.png" alt="Los Angeles">
							<h3>Integrated Wallets</h3>
							<p>Integrated wallets for real time global payment and settlement</p>
						</div>
						<div class="col-md-2 site-item"> <img class="img-resposiive" src="<?php echo base_url() ?>public/images/Network.png" alt="Los Angeles">
							<h3>Trusted Network</h3>
							<p>Select your trusted partner based on the ratings provided by participants</p>
						</div>
						<div class="col-md-2 site-item"> <img class="img-resposiive" src="<?php echo base_url() ?>public/images/24support.png" alt="Los Angeles">
							<h3>Business Performance</h3>
							<p>Optimize cost of capital, hedge risks and earn participation incentives</p>
						</div>
				</div>
			</section>
			<section class="footer_middle">
				<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-3 col-xs-12 footer-widget">
						<h5>Support</h5>
						<p> 
							<a href="<?php echo base_url() ?>publicv/aboutus">About TradeFinex</a><br>
							<a href="<?php echo base_url() ?>publicv/contact">Contact Us</a> <br>
							<a href="<?php echo base_url() ?>publicv/faq">FAQs</a> <br>
						</p>
					</div>
					<div class="col-md-3 col-sm-2 col-xs-12 footer-widget">
						<h5>Opportunities</h5>
						<p> 
							<a href="<?php echo base_url() ?>publicv/partnership">Partnership</a> <br>
							<a href="<?php echo base_url() ?>publicv/advertise">Advertise With Us</a> <br>
							<a href="<?php echo base_url() ?>publicv/careers">Careers</a> <br>
						</p>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 footer-widget">
						<h5>Resources</h5>
						<p> 
							<a href="<?php echo base_url() ?>publicv/media_center">Media Center</a> <br>
							<a href="<?php echo base_url() ?>publicv/case_study">Case Study</a> <br>
							<a href="javascript:void(0)">Mobile Apps (Coming Soon)</a> 
						</p>
					</div>
					<?php
						$request_uri = $_SERVER['REQUEST_URI'];
						// $pagea = explode('/', $request_uri);
						
						$page = str_replace ('/tradefinex/', '', $request_uri);
					?>
					<div class="col-md-3 col-sm-4 col-xs-12 footer-widget last">
						<h5>Stay Connected</h5>
						<form id="subscription" method="post" action="<?php echo base_url() ?>publicv/subscribe">
							 <div class="col-md-12 col-xs-12 sub-text">
								<div class="col-md-9 no-padding-left no-padding-right">
									<div class="input-group col-md-12">
										<input class="email_sub" name="semail" id="semail" type="email" placeholder="Enter Email ID" required />
										<input type="hidden" name="action" value="send_mail" />
										<input type="hidden" name="request_page" value="<?php echo $page ?>" />
									</div>
								</div>
								<div class="col-md-3 no-padding-left no-padding-right">
									<button class="btn btn-info btn-lg alert-subscribe-submit" type="submit">Submit</button>
								</div>
							 </div>
					    </form>
                        <?php echo $this->session->flashdata('semail_sent'); ?>                      
                        <ul class="stay_connected">
							<li><a href="https://t.me/tradefinex"><i class="fa fa-telegram" aria-hidden="true"></i></a></li>
							<li><a href="https://www.linkedin.com/in/tradefinex/"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
							<li><a href="https://www.youtube.com/channel/UCKzL0MI7gS_vlEKsUfiWuvA?view_as=subscriber"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
							<li><a href="https://twitter.com/TradeFinex"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="https://www.instagram.com/tradefinex/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                       		
                        </ul>
					 </div>
				</div>
			</div>
			</section>
			<section class="bottom_footer">
           		<div class="container">
           			<div class="text-center">
                    
                    	<ul>	
                        	<li>
                            	<a href="<?php echo base_url() ?>publicv/aboutus">Overview &nbsp; |  &nbsp;</a> 
                            </li>
                            <li>
                            	<a href="<?php echo base_url() ?>publicv/news">News &nbsp; |  &nbsp;</a>
                            </li>
                            <li>
                            	<a href="<?php echo base_url() ?>publicv/partnership">Partnership &nbsp; |  &nbsp;</a> 
                            </li>
                            <li>
                            	<a href="<?php echo base_url() ?>publicv/advertise">Advertise With Us &nbsp; |  &nbsp;</a> 
                            </li>
                            <li>
                            	<a href="<?php echo base_url() ?>publicv/careers">Careers &nbsp; |  &nbsp;</a> 
                            </li>
                            <li>
                            	<a href="<?php echo base_url() ?>publicv/contact">Contact Us &nbsp; |  &nbsp;</a> 
                            </li>
                            <li>
                            	<a href="<?php echo base_url() ?>publicv/privacy_policy">Privacy Policy &nbsp; |  &nbsp;</a>
                            </li>
                            <li>
                            	<a href="<?php echo base_url() ?>publicv/terms_condition">Terms &amp; Conditions  </a>
                            </li>
                        
                        </ul>
                                    
           				<p class="copyright">
						 	Copyright &copy; 2017 TradeFinex.org &nbsp; All rights reserved
						</p>
          				
           			</div>
           		</div>
            </section>
		</footer>
		
		<!--modal_video-->
		
		<div class="modal fade" id="open_video" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div class="video_part">
						<!-- <iframe src="https://www.youtube.com/embed/jLaqms1IHWE?feature=oembed" allowfullscreen="" width="100%" height="400" frameborder="0"></iframe> -->
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- JAVASCRIPT =============================--> 
		<script type="text/javascript" src="<?php echo base_url() ?>public/js/jquery.js"></script> 
        <script type="text/javascript" src="<?php echo base_url() ?>public/js/jquery-ui.1.12.1.js"></script> 
		<script type="text/javascript" src="<?php echo base_url() ?>public/js/intlTelInput.js"></script> 
		<script type="text/javascript" src="<?php echo base_url() ?>public/js/jquery.fakecrop.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>public/js/jquery.form-validator.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>public/assets/js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>public/js/bootstrap.min.js"></script> 
		<script type="text/javascript" src="<?php echo base_url() ?>public/js/bootstrap-switch.js"></script>	
        <script type="text/javascript" src="<?php echo base_url() ?>public/js/bootstrap-confirmation.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>public/js/bootstrap-multiselect.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>public/js/jquery-te-1.0.5.min.js"></script> 
		<script type="text/javascript" src="<?php echo base_url() ?>public/js/jquery.ratyn.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>public/js/fastselect.standalone.js"></script>
		
		<!-- JAVASCRIPT OWL =============================--> 
        <script type="text/javascript" src="<?php echo base_url() ?>public/js/owl.carousel.js"></script>
	    <script type="text/javascript" src="<?php echo base_url() ?>public/js/main_owl.js"></script>
        		
		<script type="text/javascript" src="<?php echo base_url() ?>public/js/vendors/slick/slick.min.js"></script> 
		<script type="text/javascript" src="<?php echo base_url() ?>public/js/vendors/jquery.easing.min.js"></script> 
		<script type="text/javascript" src="<?php echo base_url() ?>public/js/vendors/stellar.js"></script> 
		<script type="text/javascript" src="<?php echo base_url() ?>public/js/vendors/animsition.min.js"></script>
		
		<script type="text/javascript" src="<?php echo base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>public/js/dataTables.fixedHeader.3.1.2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>public/js/dataTables.responsive.2.1.1.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>public/js/responsive.bootstrap.2.1.1.min.js"></script>
		
        <script type="text/javascript" src="<?php echo base_url() ?>public/plugins/datatables/dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>public/plugins/datatables/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>public/plugins/datatables/buttons.bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>public/plugins/datatables/jszip.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>public/plugins/datatables/pdfmake.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>public/plugins/datatables/vfs_fonts.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>public/plugins/datatables/buttons.html5.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>public/plugins/datatables/buttons.print.min.js"></script>
		
		<!-- captha -->
		<script type="text/javascript" src="<?php echo base_url() ?>public/plugins/captcha/js/jquery.plugin.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>public/plugins/captcha/js/jquery.realperson.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>public/plugins/captcha/js/md5.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>public/plugins/captcha/js/aes.js"></script>
			
		<script type="text/javascript" src="<?php echo base_url() ?>public/js/main.js"></script>	
		
		<!-- mobile_js -->
		<!--<script type="text/javascript" src="<?php echo base_url() ?>public/js/jquery_m.js"></script> -->
		<!--<script type="text/javascript" src="<?php echo base_url() ?>public/js/jquery.flexnav.min.js"></script> 
		<script type="text/javascript">$(".flexnav").flexNav();</script>-->
		
		<!-- App js --> 
		<script type="text/javascript" src="<?php echo base_url() ?>public/assets/js/jquery.core.js"></script> 
                
        <!-- JAVASCRIPT OWL =============================--> 
        	
		<script type="text/javascript">
		
			// $(".img_cropper").responsiveImageCropper();
			
			// $('.img_cropper_square_uprofile img').fakecrop({ fill : false, wrapperWidth: 180, wrapperHeight: 180 });
			// $('.img_cropper_dashp img').fakecrop({ wrapperWidth: 290, wrapperHeight: 162 });
			// $('.img_cropper_dashs img').fakecrop({ wrapperWidth: 397, wrapperHeight: 218 });
		
			$('.dropdown_nav_hover').mouseenter(function(){
				$('.open').removeClass('open');
				$(this).find('.fa-plus').addClass('fa-minus');
				$(this).find('.fa-plus').removeClass('fa-plus');
				$(this).addClass('open');
			}).mouseleave(function(){
				$('.open').removeClass('open');
				$(this).find('.fa-minus').addClass('fa-plus');
				$(this).find('.fa-minus').removeClass('fa-minus');
			});
					
			<?php 
			
			if($user_id <> 0 && $user_type_ref != -1){ 
			
			?>
					
			$.ajax({
										
				type : 'POST',
				url : '<?php echo base_url() ?>notify/listing_count',
				data : {},
				success : function(data){
										
					var narr = $.parseJSON(data);
											
					if(parseInt(narr['notification_count']) > 0){
						$('#notify_c').show();
						$('#notify_c').text(narr['notification_count']);
					}else{
						$('#notify_c').hide();
						$('#notify_c').text(narr['notification_count']);
					}
					
					click_handler();
				}		
			});
			
			$.ajax({
										
				type : 'POST',
				url : '<?php echo base_url() ?>notify/listing_ui',
				data : {},
				success : function(data){
											
					$('#notify_list').html('<li><h5><span><i class="mdi mdi-bell"></i></span> &nbsp; Your Notifications</h5></li>'+data);
					
					click_handler();
				}		
			});
			
			$.ajax({
										
				type : 'POST',
				url : '<?php echo base_url() ?>notify/mlisting_count',
				data : {},
				success : function(data){
										
					var narr = $.parseJSON(data);
					
					if(parseInt(narr['notification_count']) > 0){
						$('#mnotify_c').show();
						$('#mnotify_c').text(narr['notification_count']);
					}else{
						$('#mnotify_c').hide();
						$('#mnotify_c').text(narr['notification_count']);
					}					
									
					click_handler();
				}		
			});
			
			$.ajax({
									
				type : 'POST',
				url : '<?php echo base_url() ?>notify/mlisting_ui',
				data : {},
				success : function(data){
											
					$('#mnotify_list').html('<li><h5><a style="color: #ec484b;" href="<?php echo base_url() ?>project/message_board"><span><i class="fa fa-comments" ></i></span> &nbsp; Message Board</a></h5></li>'+data);
					
					click_handler();
				}		
			});
						
			$('.nnotify').mouseover(function(){
				
				$.ajax({
										
					type : 'POST',
					url : '<?php echo base_url() ?>notify/update_notifyc',
					data : {},
					success : function(data){
						
						$('#notify_c').hide();
						click_handler();
					}		
				});
			});

			$('.mnotify').mouseover(function(){
				
				$.ajax({
										
					type : 'POST',
					url : '<?php echo base_url() ?>notify/update_notifyc',
					data : {},
					success : function(data){
						
						$('#mnotify_c').hide();
						click_handler();
					}		
				});
			});
						
			setInterval( function(){ 
		
				$.ajax({
										
					type : 'POST',
					url : '<?php echo base_url() ?>user/update_log',
					data : {},
					success : function(data){
					   
						click_handler();
					}		
				});

			}, 5000);
			
			setInterval( function(){ 
		
				$.ajax({
										
					type : 'POST',
					url : '<?php echo base_url() ?>notify/listing_count',
					data : {},
					success : function(data){
											
						var narr = $.parseJSON(data);
						
						if(parseInt(narr['notification_count']) > 0){
							$('#notify_c').show();
							$('#notify_c').text(narr['notification_count']);
						}else{
							$('#notify_c').hide();
							$('#notify_c').text(narr['notification_count']);
						}					
										
						click_handler();
					}		
				});
				
				$.ajax({
										
					type : 'POST',
					url : '<?php echo base_url() ?>notify/listing_ui',
					data : {},
					success : function(data){
												
						$('#notify_list').html('<li><h5><span><i class="mdi mdi-bell"></i></span> &nbsp; Your Notifications</h5></li>'+data);
						
						click_handler();
					}		
				});
				
				$.ajax({
										
					type : 'POST',
					url : '<?php echo base_url() ?>notify/mlisting_count',
					data : {},
					success : function(data){
											
						var narr = $.parseJSON(data);
						
						if(parseInt(narr['notification_count']) > 0){
							$('#mnotify_c').show();
							$('#mnotify_c').text(narr['notification_count']);
						}else{
							$('#mnotify_c').hide();
							$('#mnotify_c').text(narr['notification_count']);
						}					
										
						click_handler();
					}		
				});
				
				$.ajax({
										
					type : 'POST',
					url : '<?php echo base_url() ?>notify/mlisting_ui',
					data : {},
					success : function(data){
												
						$('#mnotify_list').html('<li><h5><a style="color: #ec484b;" href="<?php echo base_url() ?>project/message_board"><span><i class="fa fa-comments" ></i></span> &nbsp; Message Board</a></h5></li>'+data);
						
						click_handler();
					}		
				});

			}, 5000);
			
			<?php } ?>
			
			$(document).ready(function(){
				
				$('.user_info').bind('click', function(){
					
					var user_id = $(this).attr('nurow_id');
					var user_type = $(this).attr('nurow_type');
					
					$('<form id="search_form" action="<?php echo base_url() ?>user/profile" method="post"><input type="hidden" name="ruser_id" value="'+user_id+'" ><input type="hidden" name="ruser_type" value="'+user_type+'" ><input type="hidden" name="action" value="user_info" ></form>').appendTo('body').submit();
				});
				
				<?php 
			
				if($user_id <> 0 && $user_type_ref != -1){ 
				
				?>
				
				$('input.notify_check').bootstrapSwitch({
					 size: 'xs',
					 on: 'Y',
					 off: 'N'
				});
				
				// right side-bar toggle
				$('.right-bar-toggle').on('click', function(e){

					$('body').toggleClass('right-bar-enabled');
					click_handler();
				});
				
				<?php } ?>
				
				setTimeout( function(){ $('.alert').slideUp(); }, 5000 );
			
				$("#subscription").validate({
					rules: {
						semail: "required",
					},
					messages: {
						semail: "Please enter a valid email",
					},
					onkeyup: function(elem) {
						
						var element_id = $(elem).attr('id');
						
					}
				}); 
				
				$('input[name="fin_notfic"]').change(function(e) {
					
					var checkval = 0;
					
					if($(this).is(':checked')){
						checkval = 1;
					}
					
					$.ajax({
						url : '<?php echo base_url() ?>user/update_notification',
						method: 'POST',
						data: {
						   checkedv: checkval,
						   action: 'financier_notification'
						},
						success: function( data ) {
							// var arr = $.parseJSON(data);	
											
							click_handler();
						}
					});	
				});
				
				$('input[name="supp_notfic"]').change(function(e) {	
					
					var checkval = 0;
					
					if($(this).is(':checked')){
						checkval = 1;
					}
					
					$.ajax({
						url : '<?php echo base_url() ?>user/update_notification',
						method: 'POST',
						data: {
						   checkedv: checkval,
						   action: 'provider_notification'
						},
						success: function( data ) {
							// var arr = $.parseJSON(data);	
											
							click_handler();
						}
					});	
				});
				
				$('input[name="pp_notfic"]').change(function(e) {	
					
					var checkval = 0;
					
					if($(this).is(':checked')){
						checkval = 1;
					}
					
					$.ajax({
						url : '<?php echo base_url() ?>user/update_notification',
						method: 'POST',
						data: {
						   checkedv: checkval,
						   action: 'project_visibility'
						},
						success: function( data ) {
							// var arr = $.parseJSON(data);	
											
							click_handler();
						}
					});	
				});
								
				$('input[name="ppex_notfic"]').change(function(e) {	
					
					var checkval = 0;
					
					if($(this).is(':checked')){
						checkval = 1;
					}
					
					$.ajax({
						url : '<?php echo base_url() ?>user/update_notification',
						method: 'POST',
						data: {
						   checkedv: checkval,
						   action: 'project_expire_visibility'
						},
						success: function( data ) {
							// var arr = $.parseJSON(data);	
											
							click_handler();
						}
					});	
				});
				
				$('input[name="b_notfic"]').change(function(e) {	
					
					var checkval = 0;
					
					if($(this).is(':checked')){
						checkval = 1;
					}
					
					$.ajax({
						url : '<?php echo base_url() ?>user/update_notification',
						method: 'POST',
						data: {
						   checkedv: checkval,
						   action: 'beneficiaries_notification'
						},
						success: function( data ) {
							// var arr = $.parseJSON(data);	
											
							click_handler();
						}
					});	
				});
				
				$('input[name="pnp_notfic"]').change(function(e) {	
					
					var checkval = 0;
					
					if($(this).is(':checked')){
						checkval = 1;
					}
					
					$.ajax({
						url : '<?php echo base_url() ?>user/update_notification',
						method: 'POST',
						data: {
						   checkedv: checkval,
						   action: 'new_project_notification'
						},
						success: function( data ) {
							// var arr = $.parseJSON(data);	
											
							click_handler();
						}
					});	
				});
							
				click_handler();
			});	
			
			function click_handler(){
									
				$('#message_board_area').on('scroll', function(){
					// console.log($(this).scrollTop());
					var scroll_plus_height = $(this).scrollTop() + $('#message_board_view').height();
					
					if(parseInt(scroll_plus_height) >= parseInt(message_boardh)) {
						// console.log("bottom position");
						$('#mdiv_scroll').val(0);
					}else{
						// console.log("top position");
						$('#mdiv_scroll').val(1);
					}
				});
				
				$('.jqte_Content').bind('keyup', function( event ) {
					
					$('.jqte_Content').find('span').removeAttr('style');
					
				});	
					
				$('.jqte_Content').keyup(function( event ) {
					// Enter pressed? // event.which = 10
					if(event.which == 13 && !event.shiftKey) {
						// this.form.submit();
						var mdesc = $('#mdesc').val();
						
						if($.trim(mdesc) !== '' || document.getElementById("mdoc").files.length !== 0){
							$('#send_message').trigger('click');
						}
					}
				});
				
				$('.view_propose').bind('click', function(){
					
					var row_id = $(this).attr('row_id');
					var prow_id = $(this).attr('prow_id');
					var user_id = $(this).attr('user_id');
					var user_type = $(this).attr('user_type_ref');
					
					if(parseInt(prow_id) > 0 && parseInt(row_id) > 0 && parseInt(user_id) > 0){
					
						$('<form id="search_form" action="<?php echo base_url() ?>project/proposalv" method="post"><input type="hidden" name="row_id" value="'+row_id+'" ><input type="hidden" name="prow_id" value="'+prow_id+'" ><input type="hidden" name="user_id" value="'+user_id+'" ><input type="hidden" name="user_type" value="'+user_type+'" ><input type="hidden" name="action" value="proposal_view" ></form>').appendTo('body').submit();
					}
					
				});
				
				$('#send_message').bind('click', function(){
					
					var send_user = $(this).attr('send_user');
					var send_user_type = $(this).attr('send_user_type');
					var mdesc = $('#mdesc').val();
							
					if(parseInt(send_user) > 0 && parseInt(send_user_type) > 0){
						$('#send_user').val(send_user);
						$('#send_user_type').val(send_user_type);
						
						if($.trim(mdesc) !== '' || document.getElementById("mdoc").files.length !== 0){
							$('#form_project_message').submit();
						}
					}else{
						$('.error-msg').show();
						setTimeout( function(){ $('.error-msg').slideUp(); }, 6000);
					}	
					
				});
				
				$('.proj_info').bind('click', function(){
					
					var row_id = $(this).attr('row_id');
					var puser = $(this).attr('puser');
					
					$.ajax({
												
						type : 'POST',
						url : '<?php echo base_url() ?>user/add_viewer',
						data : {proj_user: puser, proj_id: row_id},
						success : function(data){
							   
							$('<form id="search_form" action="<?php echo base_url() ?>listing/project_info" method="post"><input type="hidden" name="row_id" value="'+row_id+'" ><input type="hidden" name="action" value="project_info" ></form>').appendTo('body').submit();
						}		
					});
						
				});
				
				$('.send_message').bind('click', function(){
					
					// var row_id = $(this).attr('proj_id');
					var send_user = $(this).attr('send_user');
					var send_user_type = $(this).attr('send_user_type');
					
					if(parseInt(send_user_type) > 0 && parseInt(send_user) > 0){
					
						$('<form id="search_form" action="<?php echo base_url() ?>project/message_board" method="post"><input type="hidden" name="send_user" value="'+send_user+'" ><input type="hidden" name="send_user_type" value="'+send_user_type+'" ><input type="hidden" name="action" value="send_message" ></form>').appendTo('body').submit();
					}
				});
				
				$('.by_user_type').bind('change', function(){
					
					var user_type = $(this).val();
					var proj_info_id = $('#proj_info_id').val();
					
					if(user_type !== ''){	
						$('<form id="search_form" action="<?php echo base_url() ?>project/invitation" method="post"><input type="hidden" name="row_id" value="'+proj_info_id+'" ><input type="hidden" name="action" value="project_info" ><input type="hidden" name="user_type" value="'+user_type+'" ></form>').appendTo('body').submit();
					}	
				});
				
				$('.compose').bind('click', function(){
					
					if($(this).hasClass('active')){
						
						
					}else{
						$('.msgbox_title').html('<i class="fa fa-pencil"></i> New Message');			
						$('.filter_msg').hide();	
						$('#message_board_area').slideUp();	
						$('#search_muser').slideDown();
						$('#msgbox_area').css({
							'padding-bottom' : '0px',
							'margin-bottom' : '-20px'
						});
					}
								
				});	
						
				$('.proj_invite').bind('click', function(){
					
					var proj_id = $(this).attr('proj_id');
					var user_id = $(this).attr('user_id');
					var user_type = $(this).attr('user_typei');
					
					var obj = $(this).parent();
					obj.find('.loader').removeClass('hide');
					
					$.ajax({
						url : '<?php echo base_url() ?>project/send_invite',
						method: 'POST',
						data: {
						   pid: proj_id,
						   uid: user_id,
						   utype: user_type
						},
						success: function( data ) {
							var arr = $.parseJSON(data);	
							
							if(arr['status'] == 1){
								obj.find('.proj_invite_cancel').removeClass('hide');
								obj.find('.proj_invite').addClass('hide');
								obj.find('.loader').addClass('hide');
							}
							
							click_handler();
						}
					});	
				});
				
				$('.proj_invite_cancel').bind('click', function(){
					
					var proj_id = $(this).attr('proj_id');
					var user_id = $(this).attr('user_id');
					var user_type = $(this).attr('user_typei');
					
					var obj = $(this).parent();
					obj.find('.loader').removeClass('hide');
					
					$.ajax({
						url : '<?php echo base_url() ?>project/cancel_invite',
						method: 'POST',
						data: {
						   pid: proj_id,
						   uid: user_id,
						   utype: user_type
						},
						success: function( data ) {
							var arr = $.parseJSON(data);	
							
							if(arr['status'] == 1){
								obj.find('.proj_invite_cancel').addClass('hide');
								obj.find('.proj_invite').removeClass('hide');
								obj.find('.loader').addClass('hide');
							}
							
							click_handler();
						}
					});	
				});
			}
			
			// Loader
			$(window).load(function() {
				$('#preloader').delay(350).fadeOut('slow');
				$('body').delay(350).css({
					'overflow': 'visible'
				});
			});
			
			/* $(document).ready(function() {
				$('#search-container .trigger').click(function() {
					// Hide the trigger image:
					$(this).animate({width:0},'100%');
					// At the same time slide the div open
					$('.search-bar').animate({width: 'toggle'},'100%', function(){
						// This function/ code will be executed on complete:
						$(this).find('input')[0].focus(); // For bonus, the input will now get autofocus
					});
				});
			}); */
			
		</script>
	