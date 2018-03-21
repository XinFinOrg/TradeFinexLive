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
						<input type="checkbox" id="fin_notfic" name="fin_notfic" class="notify_check" <?=(($f_notification == 1) ? 'checked="checked"' : '');?> />
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
						<input type="checkbox" id="supp_notfic" name="supp_notfic" class="notify_check" <?=(($p_notification == 1) ? 'checked="checked"' : '');?> />
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
						<input type="checkbox" id="pp_notfic" name="pp_notfic" class="notify_check" <?=(($pp_notification == 1) ? 'checked="checked"' : '');?> />
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
						<input type="checkbox" id="ppex_notfic" name="ppex_notfic" class="notify_check" <?=(($ppex_notification == 1) ? 'checked="checked"' : '');?> />
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
						<input type="checkbox" id="b_notfic" name="b_notfic" class="notify_check" <?=(($b_notification == 1) ? 'checked="checked"' : '');?> />
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
						<input type="checkbox" id="pnp_notfic" name="pnp_notfic" class="notify_check" <?=(($pp_notification == 1) ? 'checked="checked"' : '');?> />
					</div>
					<div class="col-xs-12">
						<h5 class="m-0 notify_title">Posted New Project Visibility</h5>
					</div>
				</div>
				<?php } ?>  
			</div>
		</div>
		<!-- /Right-bar --> 
		
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
								<h3 class="widget-title">Opportunities</h3>
								<ul class="one-half">
									<li> <a href="<?=base_url();?>publicv/partnership" title="">Partnership </a> </li>
									<li> <a href="<?=base_url();?>publicv/advertise" title="">Advertise With Us </a> </li>
									<li> <a href="<?=base_url();?>publicv/careers" title="">Careers </a> </li>
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
									<li> <a href="javascript:void(0)" title="">Mobile Apps (<span style="font-size: 10px;">Coming Soon</span>)</a> </li>
								</ul>
							</div>
							<!-- /.widget-categories --> 
						</div>
						<!-- /.col-md-3 -->
						<a class="jump_to" href="#footer_subscrip"></a>
						<div class="col-md-3 col-sm-4 footer_sec_stay">
							<div class="widget widget-contact">
								<h3 class="widget-title">Stay Connected</h3>
								<div id="footer_subscrip" class="col-md-12 col-xs-12 sub_box">
									<?php
										$request_uri = $_SERVER['REQUEST_URI'];
										$page = str_replace (base_url(), '', $request_uri);
										$page = ltrim($page, '/');
									?>
									<form id="subscription" method="post" action="<?=base_url();?>publicv/subscribe">
										<div class="col-md-8 col-sm-8 col-xs-8 sub_box_left">
											<div class="input-group">
												<input class="email_sub" name="semail" id="semail" type="email" placeholder="Enter Email ID" required />
												<input type="hidden" name="action" value="send_mail" />
												<input type="hidden" name="action_area" value="footer" />
												<input type="hidden" name="request_page" value="<?=$page;?>" />
												<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
											</div>	
										</div>
										<div class="col-md-3 col-sm-4 col-xs-3 sub_box_right">
											<button class="btn" type="submit">Submit</button>
										</div>
									</form>
									<?=$this->session->flashdata('sub_email_sent');?>
								</div>
								<h3 class="widget-title keep_in_touch">KEEP IN TOUCH</h3>
								<ul class="social-ft">
									<li> <a href="https://www.linkedin.com/in/tradefinex/"> <img src="<?=base_url();?>assets/images/icon/lkdn.png" alt="icon"></a> </li>
									<li> <a href="https://twitter.com/TradeFinex"> <img src="<?=base_url();?>assets/images/icon/twr.png" alt="icon"></a> </li>
									<li> <a href="https://www.youtube.com/channel/UCKzL0MI7gS_vlEKsUfiWuvA?view_as=subscriber"> <img src="<?=base_url();?>assets/images/icon/youtube.png" alt="icon"></a> </li>
									<li> <a href="https://www.instagram.com/tradefinex/"> <img src="<?=base_url();?>assets/images/icon/ins.png" alt="icon"></a> </li>
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
		<script src="<?=base_url();?>assets/js/jquery-core/jquery.min.js"></script> 
        <script src="<?=base_url();?>assets/js/jquery-core/jquery-ui.1.12.1.min.js"></script> 
		<script src="<?=base_url();?>assets/js/jquery-core/jquery.ui.touch-punch.min.js"></script> 
		<script src="<?=base_url();?>assets/js/intlTelInput.min.js"></script> 
		<script src="<?=base_url();?>assets/js/form-validator/jquery.form-validator.min.js"></script>
		<script src="<?=base_url();?>assets/js/form-validator/jquery.validate.min.js"></script>
		<script src="<?=base_url();?>assets/js/bootstrap/bootstrap.min.js"></script>
		
		<!-- Latest compiled and minified JavaScript -->
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		-->
		<script src="<?=base_url();?>assets/js/bootstrap/bootstrap-switch.min.js"></script>	
		<script src="<?=base_url();?>assets/js/bootstrap/bootstrap-confirmation.min.js"></script>
		
		<?php 
			if(uri_string() === 'user/edit'){
				echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>';
			}
		?>
		<script src="<?=base_url();?>assets/js/bootstrap/bootstrap-multiselect.min.js"></script>
		<script src="<?=base_url();?>assets/js/text-editor/jquery-te-1.0.5.min.js"></script> 
		<script src="<?=base_url();?>assets/js/rating/jquery.ratyn.min.js"></script>
		
		<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtRmXKclfDp20TvfQnpgXSDPjut14x5wk&region=GB"></script>
		<script src="<?=base_url();?>assets/js/gmap3.min.js"></script>  -->
		
		<script src="<?=base_url();?>assets/js/owl.carousel.min.js"></script> 
		<!-- <script src="<?=base_url();?>assets/js/main.js"></script> -->
		
		<!-- Jquery Paginate -->
		<script src="<?=base_url();?>assets/js/jquery.easyPaginate.js"></script>
		
		<!-- Datatables -->
		<script src="<?=base_url();?>assets/js/datatables/jquery.dataTables.min.js"></script>
		<script src="<?=base_url();?>assets/js/datatables/dataTables.responsive.2.1.1.min.js"></script>
		<script src="<?=base_url();?>assets/js/datatables/responsive.bootstrap.2.1.1.min.js"></script>
		<script src="<?=base_url();?>assets/js/datatables/dataTables.bootstrap.min.js"></script>
        <script src="<?=base_url();?>assets/js/datatables/dataTables.buttons.min.js"></script>
        <script src="<?=base_url();?>assets/js/datatables/buttons.bootstrap.min.js"></script>
        <script src="<?=base_url();?>assets/js/datatables/jszip.min.js"></script>
        <script src="<?=base_url();?>assets/js/datatables/pdfmake.min.js"></script>
		<script src="<?=base_url();?>assets/js/datatables/vfs_fonts.js"></script>
        <script src="<?=base_url();?>assets/js/datatables/buttons.html5.min.js"></script>
        <script src="<?=base_url();?>assets/js/datatables/buttons.print.min.js"></script>
        
        <!-- Lazy Loading -->
		<script src="<?=base_url();?>assets/js/slick.js"></script>
		
		<!-- captha -->
		<script src="<?=base_url();?>assets/js/captcha/jquery.plugin.min.js"></script>
		<script src="<?=base_url();?>assets/js/captcha/jquery.realperson.min.js"></script>
		<script src="<?=base_url();?>assets/js/captcha/md5.min.js"></script>
		<script src="<?=base_url();?>assets/js/captcha/aes.min.js"></script>
		                
        <!-- JAVASCRIPT OWL =============================--> 
        
        <?php
        
			$sub_email_sent = $this->session->flashdata("sub_email_sent");
			$sub_email_action = $this->session->flashdata("sub_email_action");
			
		    if($sub_email_sent && $sub_email_action && $sub_email_action == 'footer'){
			    
		    }	    
		
		?>
        	
		<script type="text/javascript">
		
			<?php
				if($sub_email_sent && $sub_email_action && $sub_email_action == 'footer'){
			?>		
					// $('.jump_to').trigger('click');
					
					$("html, body").animate({ scrollTop: $(document).height() }, 1000);
				
			<?php		
				}
			?>
			
			$(".jump_to").on("click", function( e ) {
    
				e.preventDefault();

				$("body, html").animate({ 
					scrollTop: $( $(this).attr('href') ).offset().top 
				}, 600);
				
			});
					
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
			
			if($user_id <> 0 && $user_type_ref > 0){ 
			
			?>
					
			$.ajax({
										
				type : 'POST',
				url : '<?=base_url();?>notify/listing_count',
				data : { <?=$csrf['name'];?> : '<?=$csrf['hash'];?>' },
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
				url : '<?=base_url();?>notify/listing_ui',
				data : { <?=$csrf['name'];?> : '<?=$csrf['hash'];?>' },
				success : function(data){
											
					$('#notify_list').html('<li><h5><span><i class="fa fa-exclamation-circle"></i></span> &nbsp; Your Notifications</h5></li>'+data);
					
					click_handler();
				}		
			}); 
			
			$.ajax({
										
				type : 'POST',
				url : '<?=base_url();?>notify/mlisting_count',
				data : { <?=$csrf['name'];?> : '<?=$csrf['hash'];?>' },
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
				url : '<?=base_url();?>notify/mlisting_ui',
				data : { <?=$csrf['name'];?> : '<?=$csrf['hash'];?>' },
				success : function(data){
									
					$('#mnotify_list').html('<li><h5><a onclick="return false;" href="<?=base_url();?>project/message_board"><span><i class="fa fa-comments" ></i></span> &nbsp; Message Board</a></h5></li>'+data);
					
					click_handler();
				}		
			}); 
						
			$('.nnotify').mouseover(function(){
				
				$.ajax({
										
					type : 'POST',
					url : '<?=base_url();?>notify/update_notifyc',
					data : { <?=$csrf['name'];?> : '<?=$csrf['hash'];?>' },
					success : function(data){
						
						$('#notify_c').hide();
						click_handler();
					}		
				});
			}); 

			$('.mnotify').mouseover(function(){
				
				$.ajax({
										
					type : 'POST',
					url : '<?=base_url();?>notify/update_notifyc',
					data : { <?=$csrf['name'];?> : '<?=$csrf['hash'];?>' },
					success : function(data){
						
						$('#mnotify_c').hide();
						click_handler();
					}		
				});
			});
						
			setInterval( function(){
				
				$.ajax({
					type: "GET",
					dataType: 'json',
					url: "<?=base_url();?>auth/get_csrf", 
					success: function (data) {
						
						var name = data.name; 
							hash = data.hash; 
							 
						$.ajax({
												
							type : 'POST',
							url : '<?=base_url();?>user/update_log',
							data : { name : hash },
							success : function(data){
							   
								click_handler();
							}		
						}); 
				
						$.ajax({
												
							type : 'POST',
							url : '<?=base_url();?>notify/listing_count',
							data : { name : hash },
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
							url : '<?=base_url();?>notify/listing_ui',
							data : { name : hash },
							success : function(data){
														
								$('#notify_list').html('<li><h5><span><i class="fa fa-exclamation-circle"></i></span> &nbsp; Your Notifications</h5></li>'+data);
								
								click_handler();
							}		
						});
						
						$.ajax({
												
							type : 'POST',
							url : '<?=base_url();?>notify/mlisting_count',
							data : { name : hash },
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
							url : '<?=base_url();?>notify/mlisting_ui',
							data : { name : hash },
							success : function(data){
														
								$('#mnotify_list').html('<li><h5><a onclick="return false;" href="<?=base_url();?>project/message_board"><span><i class="fa fa-comments" ></i></span> &nbsp; Message Board</a></h5></li>'+data);
								
								click_handler();
							}		
						}); 
					}
				});	

			}, 5000);
			
			<?php } ?>
			
			var isMobile={Android:function(){return navigator.userAgent.match(/Android/i);},BlackBerry:function(){return navigator.userAgent.match(/BlackBerry/i);},iOS:function(){return navigator.userAgent.match(/iPhone|iPad|iPod/i);},Opera:function(){return navigator.userAgent.match(/Opera Mini/i);},Windows:function(){return navigator.userAgent.match(/IEMobile/i);},any:function(){return(isMobile.Android()||isMobile.BlackBerry()||isMobile.iOS()||isMobile.Opera()||isMobile.Windows());}};var responsiveMenu=function(){var menuType='desktop';$(window).on('load resize',function(){var currMenuType='desktop';if(matchMedia('only screen and (max-width: 991px)').matches){currMenuType='mobile';}if(currMenuType!==menuType){menuType=currMenuType;if(currMenuType==='mobile'){var $mobileMenu=$('#mainnav').attr('id','mainnav-mobi').hide();var hasChildMenu=$('#mainnav-mobi').find('li:has(ul)');$('.header').after($mobileMenu);hasChildMenu.children('ul').hide();hasChildMenu.children('a').after('<span class="btn-submenu"></span>');$('.btn-menu').removeClass('active');}else{var $desktopMenu=$('#mainnav-mobi').attr('id','mainnav').removeAttr('style');$desktopMenu.find('.submenu').removeAttr('style');$('.header').find('.button-header').before($desktopMenu);$('.btn-submenu').remove();}}});$('.btn-menu').on('click',function(){$('#mainnav-mobi').slideToggle(300);$(this).toggleClass('active');return false;});$(document).on('click','#mainnav-mobi li .btn-submenu',function(e){$(this).toggleClass('active').next('ul').slideToggle(300);e.stopImmediatePropagation();return false;});};
			
			var slideTeam = function() {
                $(".owl-carousel").owlCarousel({
                    autoplay:true,
                    dots:false,
                    nav: true,
                    margin: 15,
                    loop:true,
                    items:5,
                    responsive:{
                        0:{
                            items: 1
                        },
    
                        479:{
                            items: 2
                        },
                        768:{
                            items: 3
                        },
                        991:{
                            items: 4
                        },
                        1200: {
                            items: 5
                        }
                    }
                });
            }; // Slide Team
			
			var searchButton=function(){var showsearch=$('.show-search button');showsearch.on('click',function(){$('.show-search .top-search').toggleClass('active');showsearch.toggleClass('active');if(showsearch.hasClass('active')){$(this).children('span').removeClass('ti-search');showsearch.children('span').addClass('ti-close');}else{showsearch.removeClass('active');$(this).children('span').addClass('ti-search');$(this).children('span').removeClass('ti-close');}});};
			var goTop=function(){var gotop=$('.go-top');$(window).scroll(function(){if($(this).scrollTop()>500){gotop.addClass('show');}else{gotop.removeClass('show');}});gotop.on('click',function(){$('html, body').animate({scrollTop:0},800,'easeInOutExpo');return false;});};
			var removePreloader=function(){$(window).load(function(){setTimeout(function(){$('.preloader').hide();},500);});};
			
			$(document).ready(function(){
			    
			    searchButton();goTop();removePreloader();responsiveMenu(); /* slideTeam(); */
			    
			    $('.lazy').slick({
				
    				lazyLoad: 'ondemand', // ondemand progressive anticipated
    				infinite: true,
    				slidesToShow: 5,
    				centerMode: true,
    				centerPadding: '0px',
    				responsive: [
    					{
    					  breakpoint: 768,
    					  settings: {
    						arrows: true,
    						centerMode: true,
    						centerPadding: '20px',
    						slidesToShow: 3
    					  }
    					},
    					{
    					  breakpoint: 480,
    					  settings: {
    						arrows: true,
    						centerMode: true,
    						centerPadding: '40px',
    						slidesToShow: 1
    					  }
    					}
    				]
    			});
			    
			    
				$('.user_info').bind('click', function(){
					
					var user_id = $(this).attr('nurow_id');
					var user_type = $(this).attr('nurow_type');
					
					$('<form id="search_form" action="<?=base_url();?>user/profile" method="post"><input type="hidden" name="ruser_id" value="'+user_id+'" ><input type="hidden" name="ruser_type" value="'+user_type+'" ><input type="hidden" name="action" value="user_info" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
				});
				
				<?php 
			
				if($user_id <> 0 && $user_type_ref > 0){ 
				
				?>
				
				$('input.notify_check').bootstrapSwitch({
					 size: 'xs',
					 on: 'Y',
					 off: 'N'
				});
				
				/* right side-bar toggle */
				$('.right-bar-toggle').on('click', function(e){

					$('body').toggleClass('right-bar-enabled');
					click_handler();
				});
				
					$('input[name="fin_notfic"]').change(function(e) {
					
					var checkval = 0;
					
					if($(this).is(':checked')){
						checkval = 1;
					}
					
					$.ajax({
						url : '<?=base_url();?>user/update_notification',
						method: 'POST',
						data: {
							checkedv: checkval,
							action: 'financier_notification',
							<?=$csrf['name'];?> : '<?=$csrf['hash'];?>'
						},
						success: function( data ) {
							/* var arr = $.parseJSON(data);	*/
											
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
						url : '<?=base_url();?>user/update_notification',
						method: 'POST',
						data: {
							checkedv: checkval,
							action: 'provider_notification',
							<?=$csrf['name'];?> : '<?=$csrf['hash'];?>'
						},
						success: function( data ) {
							/* var arr = $.parseJSON(data);	*/
											
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
						url : '<?=base_url();?>user/update_notification',
						method: 'POST',
						data: {
							checkedv: checkval,
							action: 'project_visibility',
							<?=$csrf['name'];?> : '<?=$csrf['hash'];?>'
						},
						success: function( data ) {
							/* var arr = $.parseJSON(data);	*/
											
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
						url : '<?=base_url();?>user/update_notification',
						method: 'POST',
						data: {
							checkedv: checkval,
							action: 'project_expire_visibility',
							<?=$csrf['name'];?> : '<?=$csrf['hash'];?>'
						},
						success: function( data ) {
							/* var arr = $.parseJSON(data);	*/
											
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
						url : '<?=base_url();?>user/update_notification',
						method: 'POST',
						data: {
							checkedv: checkval,
							action: 'beneficiaries_notification',
							<?=$csrf['name'];?> : '<?=$csrf['hash'];?>'
						},
						success: function( data ) {
							/* var arr = $.parseJSON(data);	*/
											
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
						url : '<?=base_url();?>user/update_notification',
						method: 'POST',
						data: {
							checkedv: checkval,
							action: 'new_project_notification',
							<?=$csrf['name'];?> : '<?=$csrf['hash'];?>'
						},
						success: function( data ) {
							/* var arr = $.parseJSON(data);	*/
											
							click_handler();
						}
					});	
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
				
				$('#search').on("click", function(e){
					/* $(".form-group").addClass("sb-search-open"); */
					$(this).addClass("sb-search-open");
					$(this).find('input[type="text"]').addClass('toggle_search');
					e.stopPropagation();
				});
				
				$(document).on("click", function(e) {
					if ($(e.target).is("#search") === false && $(".form-control").val().length == 0) {
						$("#search").removeClass("sb-search-open");
						$("#search").find('input[type="text"]').removeClass('toggle_search');
						/* $(".form-group").removeClass("sb-search-open"); */
					}
				});
				
				$(".form-control-submit").click(function(e){
					$(".form-control").each(function(){
						if($(".form-control").val().length == 0){
							e.preventDefault();
						}
					});
				});
				
				$('.input-focus-notr').each( function(){
				
					if($.trim($(this).val()) !== ''){
						$(this).addClass('input-focus');
					}else{
						$(this).removeClass('input-focus');
					}
				
				});
				
				$('.input-focus-notr').bind('keyup change', function(){
				
					if($.trim($(this).val()) !== ''){
						$(this).addClass('input-focus');
					}else{
						$(this).removeClass('input-focus');
					}
				
				});
				
				$('.rsp_btn').unbind('click').bind('click', function(){
					$('#login').find('.close').trigger('click');
				});
				
				$('.open_login').unbind('click').bind('click', function(){
					$('#reset_password').find('.close').trigger('click');
				});
				
				click_handler();
			});	
			
			function click_handler(){
													
				$('#message_board_area').on('scroll', function(){
				
					var scroll_plus_height = $(this).scrollTop() + $('#message_board_view').height();
					
					if(parseInt(scroll_plus_height) >= parseInt(message_boardh)) {
						/* console.log("bottom position"); */
						$('#mdiv_scroll').val(0);
					}else{
						/* console.log("top position"); */
						$('#mdiv_scroll').val(1);
					}
				});
				
				$('.jqte_Content').bind('keyup', function( event ) {
					
					$('.jqte_Content').find('span').removeAttr('style');
					
				});	
					
				$('.jqte_Content').keyup(function( event ) {
					/* Enter pressed? // event.which = 10 */
					if(event.which == 13 && !event.shiftKey) {
						/* this.form.submit(); */
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
					
						$('<form id="search_form" action="<?=base_url();?>project/proposalv" method="post"><input type="hidden" name="row_id" value="'+row_id+'" ><input type="hidden" name="prow_id" value="'+prow_id+'" ><input type="hidden" name="user_id" value="'+user_id+'" ><input type="hidden" name="user_type" value="'+user_type+'" ><input type="hidden" name="action" value="proposal_view" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
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
						url : '<?=base_url();?>user/add_viewer',
						data : {
							proj_user: puser, 
							proj_id: row_id,
							<?=$csrf['name'];?> : '<?=$csrf['hash'];?>'
						},
						success : function(data){
							   
							$('<form id="search_form" action="<?=base_url();?>listing/project_info" method="post"><input type="hidden" name="row_id" value="'+row_id+'" ><input type="hidden" name="action" value="project_info" /><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
						}		
					});
						
				});
				
				$('.send_message').bind('click', function(){
					
					var send_user = $(this).attr('send_user');
					var send_user_type = $(this).attr('send_user_type');
					
					if(parseInt(send_user_type) > 0 && parseInt(send_user) > 0){
					
						$('<form id="search_form" action="<?=base_url();?>project/message_board" method="post"><input type="hidden" name="send_user" value="'+send_user+'" ><input type="hidden" name="send_user_type" value="'+send_user_type+'" ><input type="hidden" name="action" value="send_message" ><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
					}
				});
				
				$('.by_user_type').bind('change', function(){
					
					var user_type = $(this).val();
					var proj_info_id = $('#proj_info_id').val();
					
					if(user_type !== ''){	
						$('<form id="search_form" action="<?=base_url();?>project/invitation" method="post"><input type="hidden" name="row_id" value="'+proj_info_id+'" ><input type="hidden" name="action" value="project_info" ><input type="hidden" name="user_type" value="'+user_type+'" ><input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" /></form>').appendTo('body').submit();
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
						url : '<?=base_url();?>project/send_invite',
						method: 'POST',
						data: {
							pid: proj_id,
							uid: user_id,
							utype: user_type,
							<?=$csrf['name'];?> : '<?=$csrf['hash'];?>'
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
						url : '<?=base_url();?>project/cancel_invite',
						method: 'POST',
						data: {
							pid: proj_id,
							uid: user_id,
							utype: user_type,
							<?=$csrf['name'];?> : '<?=$csrf['hash'];?>'
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
			
			/* Loader */
			/*
			
			$(window).load(function() {
				$('#preloader').delay(350).fadeOut('slow');
				$('body').delay(350).css({
					'overflow': 'visible'
				});
			}); */
						
		</script>
	